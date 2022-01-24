<?php
session_start();
require_once "controllers/Controllers.php";
require_once "controllers/ParamControl.php";
$session  =  ADMIN_SESSION();
$URI      = explode("/", $_SERVER["REQUEST_URI"]);
$reset    = end($URI);
$user_id  = (isset($session->user_id)) ? $session->user_id : null;
if ($reset == "reset") {
  $auth   = new Generic;
} else {
  $auth   = new Auth($user_id);
}
$uri       = $auth->getURIdata();

$param    = new ParamControl($auth);
// see($param->load_sources("bool"));

if (!empty($auth->backend)) {
  $uri->page_source = $uri->content_id;
}

if ($uri->page_source !== "run-tables" && $uri->page_source !== "reset") {
  $db       = $auth->connect();
  $company   = $auth->company();
  $ext       = pathinfo($uri->page_source, PATHINFO_EXTENSION);
  $_color   = array("green", "red", "blue", "cyan darken-3", "teal darken-4", "orange", "light-green darken-3", "lime darken-1", "pink darken-4", "purple darken-4", "purple accent-4");
  shuffle($_color);
  if (!empty($ext)) {
    $url = $_SERVER["REQUEST_URI"];
    $url = str_replace(".${ext}", "", $url);
    header("Location: ${url}");
  }
}

$valid_pages   = [
  ""           => "views/home.php",
  "home"       => "views/home.php",
  "index"     => "views/home.php",
  "login"     => "views/login.php",
  "logout"     => "processors/process_logout.php",
  "reset"     => "processors/process_prepare.php",
  "run-tables" => "backendProject/database/process_create_tables.php",
  "cron-job"  => "backendProject/functions/cronjob.php",
  "cron-job-invoice"  => "backendProject/functions/cronjob-invoices.php",
];

$cache_control = "?v=" . random(8);
$page_exists = isset($valid_pages[$uri->page_source]);
if ($page_exists == true) {
  require_once($valid_pages[$uri->page_source]);
} else {
  die("Htaccess Caught up in admin");
}
if ($uri->page_source !== "run-tables") {
  $db->close();
}
