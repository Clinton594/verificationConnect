<?php
require_once 'generic_functions.php';
require_once 'DBCred.php';

class Generic extends DBCred
{
  public $has_db = true;
  public $domain = "";
  protected $isConnected = false;
  public static $mydb;


  public function __construct()
  {
    global $_SERVER;
    $this::$server  =  $_SERVER['SERVER_NAME'];
  }

  public function closeDB()
  {
    if (!$this->isConnected) {
      $this::$mydb->close();
    }
  }

  //Connects to database if not connected
  public function connect()
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
      }
    }
    return ($this::$mydb);
  }

  public function getLocalServers()
  {
    return ($this->local_servers);
  }

  public function getServer()
  {
    return ($this->server);
  }

  public function getURIdata($str = false)
  {
    global $_SERVER;
    $server = $this->getServer();
    if (gettype($str) === "string") $_SERVER['REQUEST_URI'] = $str;
    $request_uri = str_replace('https://', '', $_SERVER['REQUEST_URI']);
    $request_uri = explode('/', str_replace('http://', '', $request_uri));
    if ((array_search($this->getServer(), $this->getLocalServers()) !== false)) {
      $site_name = !empty($request_uri[1]) ? $request_uri[1] : 'admindb';
      $page_source = !empty($request_uri[2]) ? $request_uri[2] : '';
      $content_id = !empty($request_uri[3]) ? $request_uri[3] : null;
      $event = !empty($request_uri[4]) ? $request_uri[4] : null;
      $parent_page = !empty($request_uri[5]) ? $request_uri[5] : null;
      $other = !empty($request_uri[6]) ? $request_uri[6] : null;
      $this->domain = "http://{$server}/{$site_name}/";
    } else {
      $site = str_replace("www.", "", $server);
      $this->domain = "https://" . str_replace("https://", "", $server) . "/";
      $site_name = str_replace("https://", "", $server);
      $page_source = !empty($request_uri[1]) ? $request_uri[1] : '';
      $content_id = !empty($request_uri[2]) ? $request_uri[2] : null;
      $event = !empty($request_uri[3]) ? $request_uri[3] : null;
      $parent_page = !empty($request_uri[4]) ? $request_uri[4] : null;
      $other = !empty($request_uri[5]) ? $request_uri[5] : null;
    }
    $strict = ['expires' => time() + 36000, 'path' => "/", 'samesite' => 'lax'];
    // setcookie("siteData", "{$this->domain},{$this->backend},".absolute_filepath("{$this->domain}"), $strict);
    setcookie("siteData", "{$this->domain}," . absolute_filepath("{$this->domain}"), time() + 36000, "/");
    return ((object)[
      "page_source" => explode("?", $page_source)[0],
      "content_id" => explode("?", $content_id)[0],
      "event" => $event,
      "other" => $other,
      "parent_page" => $parent_page,
      "site" => $this->domain,
      "domain" => $this->domain,
    ]);
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
}
