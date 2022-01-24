<?php
require_once "Generic.php";
require_once "ParamControl.php";

class TableControl
{
  public static $generic;
  public static $db;
  public static $remove = array();

  public function __construct($generic)
  {
    self::$generic = $generic;
  }

  public function run($queries, $callback)
  {
    $c = 0;
    $response = [];
    $db = self::$generic->connect(false);
    self::$db = $db;
    if (gettype($queries) === "string") {
      $nums = explode("-", $queries);
      $queries = [];
      $first = (int) filter_var($nums[0], FILTER_SANITIZE_NUMBER_INT);
      $last  = (int) filter_var($nums[1], FILTER_SANITIZE_NUMBER_INT);
      for ($i = $first; $i <= $last; $i++) {
        $queries[] = "query$i";
      }
    }

    foreach ($queries as $k => $_query) {
      $_query = trim($_query);
      global ${$_query};
      if (isset(${$_query})) {
        $fields = $this->get_all_table_fields(${$_query});
        $counter = 0;
        $tablename = $fields->query->table;
        if (isset($fields->mysql)) { //If this query already has a database table
          foreach ($fields->query->column_names as $k => $colname) { //Loop through each query columns
            $key = array_search($colname, $fields->mysql->column_names);
            $db_col_details = ($key !== false) ? $fields->mysql->row[$key] : ""; //This database column details
            $qu_col_details = $fields->query->row[$k];                          //This query column details
            if (array_search($colname, $fields->mysql->column_names) === false) { //if this query column doesnt exist in database (Add)
              $prev = "";
              if (isset($fields->query->column_names[$k - 1])) {
                $prev = $fields->query->column_names[$k - 1];
                $prev = "AFTER $prev";
              }
              $add = "ALTER TABLE $tablename ADD $colname $qu_col_details $prev";
              if ($db->query($add) or die($db->error . " ($add)")) {
                $response[] = "$colname added<br>";
                $counter++;
              };
            } else if (($qu_col_details !== $db_col_details) && !empty($db_col_details)) { //Exists but details don't match (Modify)
              $add = "ALTER TABLE $tablename MODIFY $colname $db_col_details";
              //$db->query($add) or die($db->error." ($add)");
            }
          }
          if ($counter) {
            $counter = ($counter > 1) ? "{$counter} columns" : "{$counter} column";
            $response[] = "$counter affected on $tablename table";
            $response[] = "----------------------><br>";
          }
        } else {
          $query = ${$_query};
          $db->query($query) or die($db->error . "($query)");
          $db->query("ALTER TABLE {$tablename} CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;") or die($db->error . "($tablename)");
          $response[] = "$tablename created";
          $response[] = "----------------------><br>";
        }
        $c++;
        $this::$remove[] = $fields;
      }
    }
    if (gettype($callback) == "object") {
      $response = call_user_func($callback, $response);
    }
    $response[] = self::$generic->buildAllConstants(true);
    $response[] = "Done----------------------><br>";
    $db->close();
    return $response;
  }

  function get_all_table_fields($_query)
  {
    $db = self::$db;
    $all = new stdClass;
    $query =  $this->queryToArray($_query);
    $table = $query->table;
    $all->query = $query;
    //fetch existing columns from database table and build array with tablename
    if ($sql = $db->query("SHOW CREATE TABLE $table")) {
      if ($row = $sql->fetch_assoc()) {
        $mysql =  $this->queryToArray($row['Create Table']);
        $all->mysql = $mysql;
      }
    }
    return $all;
  }

  function queryToArray($query)
  {
    //Returns tablename, column names, datatypes
    $q = str_replace('`', '', $query);
    $arr = explode('(', $q, 2);
    $arr1 = substr($arr[1], 0, -1);
    $arr0 = explode(' ', trim($arr[0]));
    //Get the table name
    $table = end($arr0);
    //split the query into columns and cleanup
    $cols = preg_split('/\r\n|\r|\n/', $arr1);
    $cols = array_map('trim', $cols);
    $cols = array_filter($cols);
    $response = new stdClass;
    $_qu = $_qus = array();
    //extract columns from query and build array with tablename
    $response->table = $table;
    foreach ($cols as $col_) {
      if (!empty($col_)) {
        $column_name = explode(' ', trim($col_))[0];
        if (strlen($column_name) > 1) {
          if (stripos($column_name, 'primary') === false && stripos($column_name, 'unique') === false) {
            $response->column_names[] = trim($column_name); //Column names only
            $response->row[] = substr($col_, -1) == ',' ?
              strtolower(trim(str_replace($column_name, '', substr($col_, 0, -1)))) :
              strtolower(trim(str_replace($column_name, '', $col_))); // Column details
          }
        }
      }
    }
    return $response;
  }

  public function drop_columns()
  {
    return $this::$remove;
  }
  public function update_generic_tables()
  {
    $clientid = 1;
    $paramControl = new ParamControl(self::$generic);
    $default_role = $paramControl->default_role();
    $db = self::$db;
    $admin = $paramControl->get_params("admin_signin");

    $query6 = "REPLACE into roles(
      id, rolename, roledesc)
      values
      ('1','Administrator', '$default_role'
    )";
    if ($db->query($query6) or die($db->error)) {
      $response[] = "Admin Role Added";
      $response[] = "----------------------><br>";
    }
    $query8 = "REPLACE into {$admin->table}({$admin->primary_key}, {$admin->username_col}, {$admin->password_col}, {$admin->name_col}, {$admin->last_name_col}, role, access_level, status, {$admin->email_col}) values ('1','administrator','password@admin','John','Doe','1','2','1','info@ugoson.com')";
    if ($db->query($query8) or die($db->error)) {
      $response[] = "Administrator Added";
      $response[] = "----------------------><br>";
    }
    $query2 = "REPLACE into company_info(id,name) values ('1','Backend')";
    if ($db->query($query2) or die($db->error)) {
      $response[] = "Default Company Added";
      $response[] = "---------------------->";
    }
    return $response;
  }
}
