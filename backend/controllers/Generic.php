<?php
require_once __DIR__ . "../../backendProject/database/DBCred.php";
require_once __DIR__ . "../../functions/generic_functions.php";

class Generic extends DBCred
{
  public $has_db = true;
  public $domain = "";
  protected $isConnected = false;
  public static $mydb = null;
  public static $company;
  public $db_name = null;

  public function __construct($db_name = null)
  {
    global $_SERVER;
    $this::$server  =  $_SERVER['SERVER_NAME'];
    $this->db_name = $db_name;
  }

  public function closeDB()
  {
    if (!$this->isConnected) {
      $this::$mydb->close();
    }
  }

  //Connects to database if not connected
  public function connect($buildConstants = true)
  {
    if (!$this->isConnected) {
      $connect = (array_search($this::$server, $this::$local_servers) !== false) ?
        [$this::$local_server, $this::$local_user, $this::$local_password, $this::$local_db] :
        [$this::$local_server, $this::$online_user, $this::$online_password, $this::$online_db];

      $this->db_name = empty($this->db_name) ? $connect[3] : $this->db_name;
      $db_handle = new MySQLi($connect[0], $connect[1], $connect[2], $this->db_name);

      if (empty($db_handle->connect_error)) {
        $this->isConnected = true;
        $this::$mydb = $db_handle;
        if ($buildConstants) $this->buildAllConstants();
      }
    }
    return ($this::$mydb);
  }

  public function getTableFields($table)
  {
    $result = [];
    // see($this::$mydb);
    if (!$this->isConnected) die("Connect to database first (getTableFields)");
    if ($row = $this::$mydb->query("DESCRIBE {$table}") or die($this::$mydb->error)) {
      while ($r = $row->fetch_assoc()) {
        $name = strtoupper($r['Field']);
        $result[] = trim(strtolower($name));
      }
    }
    return ($result);
  }

  function buildAllConstants($createOnly = false)
  {
    $dir  = absolute_filepath($this->domain);
    $dir  = "{$dir}cache/";
    $file = "{$dir}schema.json";
    $today = strtotime(date('Y-m-d h:i:s'));
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }
    if (file_exists($file) && $createOnly !== true &&  (round(($today - filemtime($file)) / (3600 * 24)) < 7)) {
      $json = _readFile($file);
    } else {
      $db_name = (array_search($this::$server, $this::$local_servers) !== false) ? $this::$local_db : $this::$online_db;
      $fields = [];
      $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '{$db_name}'";
      $query = $this::$mydb->query($sql) or die();
      while ($row = $query->fetch_object()) {
        $fields = array_merge($this->getTableFields($row->TABLE_NAME), $fields);
      }
      $json = _writeFile($file, array_unique($fields), true);
    }
    $fields = json_decode($json);
    $this->defineConstants($fields);
  }

  public function defineConstants($fields)
  {
    foreach ($fields as $name) {
      $CONST = strtoupper($name);
      if (!defined($CONST . "_DESC")) define($CONST . "_DESC", $name . " DESC");
      if (!defined($CONST . "_ASC")) define($CONST . "_ASC", $name . " ASC");
    }
    if (!defined("RANDOM")) define("RANDOM", "rand()");
  }

  public function getLocalServers()
  {
    return ($this::$local_servers);
  }

  public function getServer()
  {
    return ($this::$server);
  }

  public function islocalhost()
  {
    return in_array($this->getServer(), $this->getLocalServers());
  }

  public function buildQuery($post)
  {
    $post = gettype($post) == "string" ? explodeToKey("=", explode(",", $post)) : $post;
    $build = [];
    foreach ($post as $key => $value) {
      // $value = cleanUp($value, ["(", ")", " ", ":"]);//This could wipe all characters in a blog post just to allow the selected ones
      $key = cleanUp($key);
      $value = str_replace("'", "", $value);
      $excludes = ["now()"];
      $v = $this::$mydb->real_escape_string($value);
      $build[] = in_array($v, $excludes) ? "$key={$v}" : "$key='{$v}'";
    }
    return (implode(", ", $build));
  }

  public function filterQuery($filter, $table, $searchCols = "")
  {
    $search = "";
    $clause = $filter;

    $fields = gettype($table) == "string" ? $this->getTableFields($table) : $table;
    if (!empty($fields)) {
      $filter = str_replace("&", ",", $filter);
      $filter = str_replace(" AND ", " and ", $filter);
      $filter = str_replace(" and ", ",", $filter);
      if (!empty($searchCols)) {
        $search = [];
        $searchCols = gettype($searchCols) == "array" ? $searchCols : explode(",", $searchCols);
        $filter = explode(",", $filter);
        $filters = explodeToKey("=", $filter);
        $fk = array_map("trim", array_keys($filters));
        $fv = array_map("trim", array_values($filters));
        $filters = array_combine($fk, $fv);
        if (isset($filters["keyword"])) {
          $keyword = $filters["keyword"];
          foreach ($searchCols as $col) {
            if (array_search($col, $fields) !== false) {
              $search[] = "$col LIKE '%$keyword%'";
            }
          }
          $search = count($search) ? "(" . implode(" OR ", $search) . ")" : "";
        }
        $filter = implode(',', $filter);
      }
      if (!empty($filter)) {
        $_flt = $filters = [];
        $arr = explode(',', $filter);
        // Supported symbols for filtering
        $explosives = ["<>", "!=", "<", ">", "="];
        $position = 0;
        foreach ($arr as $fltr) {
          $explode_key = "=";
          foreach ($explosives as $xk => $xv) {
            if (gettype(stripos($fltr, $xv)) !== 'boolean') {
              $explode_key = $xv;
              break;
            }
          }
          if (gettype(stripos($fltr, $explode_key)) !== 'boolean') { //if contains an explosive
            $_a = explode($explode_key, str_replace("'", "", $fltr));
            $_a = array_map("trim", $_a);
            $_a[0] = cleanUp(trim($_a[0]));
            if (array_search($_a[0], $fields) !== false) { //multiple keys
              if (strtolower($_a[1]) == "null") {
                $_flt[$_a[0]][] = "{$_a[0]} IS NULL";
              } else {
                $_flt[$_a[0]][] = "{$_a[0]}$explode_key'{$_a[1]}'";
              }
            }
          } else if (gettype(stripos($fltr, ' in ')) !== 'boolean') {
            // see(get_in_clause($clause, $position));
            $filters[] = get_in_clause($clause, $position);
            $position++;
          }
        }
        foreach ($_flt as $values) {
          $filters[] = count($values) > 1 ? "(" . implode(" OR ", $values) . ")" : $values[0];
        }
        $filters = implode(" AND ", $filters);
        $filter = !empty($filters) && !empty($search) ? "{$filters} AND {$search}" : $filters . $search;
      }

      return ($filter);
    } else see(json_encode(["message" => "Table {$table} does not exist"]));
  }

  public function getFromTable($table, $filter = '', $page = 1, $pagesize = 0, $sort = "", $search = false, $cols = "*")
  {
    $content = [];
    $pagesize = empty($pagesize) ? 0 : $pagesize;
    $page = empty($page) ? 1 : $page;
    $recordstart = $pagesize == 0 ? 0 : ($page - 1) * $pagesize;
    $limit = $pagesize == 0 ? "" : "LIMIT $recordstart, $pagesize";
    $sortOrder = !empty($sort) ? "ORDER BY " . $sort : "";
    $cols = is_array($cols) ? implode(',', $cols) : $cols;
    $filter = trim($filter);
    if (!empty($filter)) {
      $filter = $this->filterQuery($filter, $table, $search);
      $filter = "WHERE $filter";
    }
    $filter = trim($filter);
    $sql = "SELECT $cols FROM $table $filter  " . $sortOrder . " $limit";
    if (!$this->isConnected) die("Connect to database first (getFromTable)");
    $query = $this::$mydb->query($sql) or die($this::$mydb->error . "($sql)");
    $content = [];
    while ($row = $query->fetch_assoc()) {
      $row = array_change_key_case(utf8ize($row));
      if ($this::$server !== "localhost" && array_search($this::$server, $this::$local_servers) !== false) {
        $row = array_map(function ($value) {
          return str_replace("localhost", $this::$server, $value);
        }, $row);
      }
      $row = (object) $row;
      $content[] = $row;
    }
    return ($content);
  }

  public function submitForm($post)
  {
    $response     = new stdClass;
    $paramControl = new ParamControl($this);
    $post = gettype($post) === 'array' ? (object)$post : $post;
    if (!empty($post->formName)) {
      $fixed_values = $extra_values = "";
      $param = $paramControl->get_params($post->formName);
      if (count((array)$param) && isset($param->table)) {
        $fields = $this->getTableFields($param->table);
        //Check for callback function before submission
        if (isset($param->pre_submit_function)) {
          if (isset($param->form_values) && gettype($param->form_values) == "object") {
            $post = (object)array_merge((array)$post, (array)$param->form_values);
          }
          $post = call_user_func_array($param->pre_submit_function, [$post]);
          $post = gettype($post) === 'array' ? (object)$post : $post;
          if (!empty($post->error)) {
            $response->status = 0;
            $response->message = $post->error;
            return $response;
          }
        }
        //If validation type is in strict mode
        /*If you don't supply 'validate_cols' table fields in params as array,
              it will validate all empty post fields value for strict validation.
          Even if not in strict mode and you supply validate_cols in param, it will handle the request with strictness
            with respect to the fields supplied in validate_cols;
        */
        if ((isset($post->validation) && $post->validation === "strict") || !empty($param->validate_cols)) {
          $validate_cols = !empty($param->validate_cols) ? $param->validate_cols : [];
          if (gettype($validate_cols) !== "array") {
            $response->status = 0;
            $response->message = "'validate_cols' must be array !!!";
            return $response;
          }
          if (count($validate_cols)) {
            $unexist_col = array_diff($validate_cols, $fields);
            $unexist_post = array_diff($validate_cols, array_keys((array)$post));
            if (count($unexist_col)) {
              $response->message = "These table columns don't exist: " . implode(',', $unexist_col);
              return $response;
            } elseif (count($unexist_post)) {
              $response->status = 0;
              $response->message = "supply values for: " . implode(',', $unexist_post);
              return $response;
            }
          }
          foreach ($post as $key => $value) {
            if (!empty($validate_cols) && array_search(strtolower($key), $validate_cols) === false) continue;
            elseif ($value === "") {
              $response->status = 0;
              $response->message = "$key can't be empty !!!";
              return $response;
            }
          }
        }
        $result = $response = $this->insert($post, $param);
        // toggle respons data after submission
        if (!empty($post->return_values)) $result = (object)array_merge((array)$response, (array)$post);
        //Check for callback function after submission
        if (isset($param->post_submit_function) && $response->status) {
          if (empty($post->return_values)) $result = $response->primary_key;
          $response = call_user_func_array($param->post_submit_function, [$result]);
        }
      } else {
        $response->status = 0;
        $response->message = "Either param, table property  or submitType is not set !!!";
        return $response;
      }
    } else {
      die("Please add the param name you want to extract details from in you init paramters or form field as 'formName'");
    }
    return $response;
  }

  public function insert($post, $param)
  {
    $post     = (object)$post;
    if (gettype($param) == "string") {
      require_once(__DIR__ . "/ParamControl.php");
      $paramControl = new ParamControl($this);
      $param    = $paramControl->get_params($param);
    }
    $param    = (object)$param;
    $response = new stdClass;
    $build    = array();
    $fields   = $this->getTableFields($param->table);
    $proceed  = 0;
    $response->status = 0;
    foreach ($post as $key => $value) {
      if (array_search(strtolower($key), $fields) !== false) {
        if (gettype($value) == "object" || gettype($value) == "array") {
          $value = json_encode($value);
        } else {
          $v = $this::$mydb->real_escape_string($value);
          $v = trim($v);
          $value = $v;
        }
        $build[] = "$key='{$value}'";
      }
    }
    $build = implode(", ", $build);
    if (empty($post->{$param->primary_key}) || (!empty($post->submitType) && $post->submitType === "insert")) {
      //Valid unique key if exists
      if (!empty($param->unique_key)) {
        if (!empty($post->{$param->unique_key})) {
          $unique_value = $post->{$param->unique_key};
          $unique_key = $param->unique_key;
          $unique = $this->getFromTable($param->table, "$unique_key=$unique_value", 1, 1, "", false, [$param->primary_key]);
          if (!empty($unique[0])) {
            $response->message = "$unique_value already exists";
          } else $proceed = 1;
        } else  $response->message = "Unique_key $param->unique_key can't be empty !!!";
      } else $proceed = 1;
      if ($proceed == 1) {
        $build = !empty($param->fixed_values) ? "$build, " . $this->buildQuery($param->fixed_values) : $build;
        $sql = "INSERT INTO $param->table SET $build";
        $action =  "created";
      }
    } else {
      // Update must use primary key
      if (!empty($param->primary_key)) {
        // form data must carry primary key value
        if (!empty($post->{$param->primary_key})) {
          if (!empty($param->unique_key)) {
            if (!empty($post->{$param->unique_key})) {
              $unique_value = $post->{$param->unique_key};
              $unique_key = $param->unique_key;
              $exepty_key = empty($param->unique_exempt_key) ? "" : ",{$param->unique_exempt_key}!={$post->{$param->primary_key}}";
              $unique = $this->getFromTable($param->table, "{$unique_key}={$unique_value}, {$param->primary_key}!={$post->{$param->primary_key}} $exepty_key", 1, 1, null, false, [$param->primary_key]);
              if (!empty($unique[0])) {
                $response->message = "$unique_value already exists";
              } else $proceed = 1;
            } else $response->message = "Unique_key $param->unique_key can't be empty !!!";
          } else $proceed = 1;
          if ($proceed === 1) {
            $build = !empty($param->extra_values) ? "$build, " . $this->buildQuery($param->extra_values) : $build;
            $primary_key = $post->{$param->primary_key};
            $sql = "UPDATE $param->table SET $build WHERE $param->primary_key='{$primary_key}'";
            $action =  "updated";
          }
        } else {
          $response->message = "Primary key '{$param->primary_key}' was not found in the post";
        }
      } else {
        $response->message = "Primary key has to be set to run Update queries";
      }
    }
    if ($proceed === 1) {
      $query = $this::$mydb->query($sql) or die($this::$mydb->error);
      $id = !empty($this::$mydb->insert_id) ? $this::$mydb->insert_id : $post->{$param->primary_key};
      $response->status = 1;
      $response->message = "Successful";
      $response->primary_key = $id;
      // Log insertion;
      // This uses a key from the param called "logging" and it's defined as an array;
      // This logging has two keys, user , title and an optional key for param (default param is admin_signin)
      // user key is key from the post that can be used to identify a user (eg, id, email, etc)
      // title key is a key from the posted values to pick information from and build the log description
      // Default param to get user table from is the "admin_signin" param,if this param does not qualify for your user's table, please define your own param and pass the key as "param" in the "logging"
      if (!empty($param->logging) && gettype($param->logging) == "object") {
        $post1  = array_map("cleanUp", explodeToKey("=", explode(",", $build)));
        $post   = (object)array_merge((array)$post, $post1);
        $pagtype = empty($param->logging->param) ? "" : $param->logging->param;
        if (empty($paramControl)) $paramControl = new ParamControl($this);
        $auth   = new Auth($post->{$param->logging->user}, $pagtype);
        $user   = $auth->user();
        $descr   = (gettype(strpos($post->{$param->logging->title}, '[{')) === 'boolean') ? "{$post->{$param->logging->title}} in" : "";
        $descr  =  "{$user->name_col} $action $descr {$param->page_title}";
        $location_id = "";
        $descr   = substr($descr, 0, 240);
        $logger = (object)[
          "user_id"   => $user->primary_key,
          "action"     => $action,
          "location"  => $param->table,
          "location_id"  => $response->primary_key,
          "submitType" => "insert",
          "type"       => empty($param->logging->type) ? "other" : $param->logging->type,
          "description" => $descr
        ];
        $this->insert($logger, $paramControl->get_params("log"));
      }
    }
    return $response;
  }

  public function getURIdata($str = false)
  {
    global $_SERVER;
    $server = $this->getServer();
    if (gettype($str) === "string") $_SERVER['REQUEST_URI'] = $str;
    $request_uri = str_replace('https://', '', $_SERVER['REQUEST_URI']);
    $request_uri = explode('/', str_replace('http://', '', $request_uri));

    if ((array_search($this->getServer(), $this->getLocalServers()) !== false)) {
      $site_name = !empty($request_uri[1]) ? $request_uri[1] : 'backend';
      $page_source = !empty($request_uri[2]) ? $request_uri[2] : '';
      $content_id = !empty($request_uri[3]) ? $request_uri[3] : null;
      $event = !empty($request_uri[4]) ? $request_uri[4] : null;
      $other = !empty($request_uri[6]) ? $request_uri[6] : null;
      $this->domain = "http://{$server}/{$site_name}/";
    } else {
      $this->domain = "https://" . str_replace("https://", "", $server) . "/";
      $site_name = str_replace("https://", "", $server);
      $page_source = !empty($request_uri[1]) ? $request_uri[1] : '';
      $content_id = !empty($request_uri[2]) ? $request_uri[2] : null;
      $event = !empty($request_uri[3]) ? $request_uri[3] : null;
      $this_page = !empty($request_uri[4]) ? $request_uri[4] : null;
      $other = !empty($request_uri[5]) ? $request_uri[5] : null;
    }
    setcookie("siteData", "{$this->domain},{$this->backend}," . absolute_filepath("{$this->domain}"), time() + 36000, "/");
    return ((object)[
      "page_source" => explode("?", $page_source)[0],
      "content_id" => explode("?", $content_id)[0],
      "event" => $event,
      "other" => $other,
      "site" => $this->domain,
      "domain" => $this->domain,
      "backend" => $this->domain . $this->backend
    ]);
  }

  public function company()
  {
    $company = new stdClass;
    if (empty($this::$company) || $this::$company == null) {
      if ($this->has_db && $this->isConnected) {
        $query = $this::$mydb->query("SELECT * FROM company_info WHERE id='1'");
        if ($row = $query->fetch_object()) {
          $row = (object)array_map(function ($value) {
            return str_replace("localhost", $this->getServer(), $value);
          }, (array)$row);
          $row->branches = json_decode($row->branches);
          $row->slider = json_decode($row->slider);
          $logo = isJson($row->logo_ref);
          if (empty($logo)) { //Not an array
            if (empty($row->logo_ref)) $row->logo_ref = "{$this->domain}{$this->backend}images/logo.png";
          }
          $row->logo_ref = empty($logo) ? $row->logo_ref : $logo[0]->src;
          $row->favicon = !empty($logo) && !empty($logo[1]) ? $logo[1]->src : $row->logo_ref;
          $row->favicon2 = !empty($logo) && !empty($logo[2]) ? $logo[2]->src : $row->favicon;
          $row->logo_ref = str_replace("tbn/", "", $row->logo_ref);
          $row->favicon = str_replace("tbn/", "", $row->favicon);
          $company = $row;
          $this->name =   $row->name;
          $this->email =  $row->email;
          $this::$company = $company;
        }
      } else {
        $company->error = "Connect to database first";
      }
    }
    return ($this::$company);
  }

  public function writeViews($folder_name, $id)
  {
    $uri = $this->getURIdata();
    $folder_name = strToFilename($folder_name);
    $rootDir = absolute_filepath($uri->site);
    $views_file = "{$rootDir}cache/{$folder_name}/views/{$id}.json";
    $read_file = "{$rootDir}cache/{$folder_name}/content-{$id}.json";
    //Increment Read File Views
    if (file_exists($read_file)) {
      $data = json_decode(_readFile($read_file));
      $boosted = intval($data->no_of_views) + 1;
      $data->no_of_views = $main_view = $boosted;
      _writeFile($read_file, $data);
    }
    if (file_exists($views_file)) {
      $boosted = _readFile($views_file);
      $boosted = intval($boosted) + 1;
    } else {
      $boosted = 1;
    }
    _writeFile($views_file, $boosted);
    $read = empty($main_view) ? $boosted : $main_view;
    $response = ["views" => $read];
    return $response;
  }
}
