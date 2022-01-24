<?php
session_start();
require_once("backend/controllers/Controllers.php");
require_once("backend/controllers/GeckoExchange.php");
// require_once("backend/controllers/NumberFormatter.php");

$generic = new Generic;
$generic->connect();
$company = $generic->company();
$uri = $generic->getURIdata();
// see($company);
$paramControl = new ParamControl($generic);
$session = object($_SESSION);

$forExchange = new GeckoExchange;
$currency = $paramControl->load_sources("currency");

$ext = pathinfo($uri->page_source, PATHINFO_EXTENSION);
if (!empty($ext)) {
  $url = $_SERVER['REQUEST_URI'];
  $url = str_replace(".$ext", "", $url);
  header("Location: $url");
}
$fmn = new NumberFormatter("en", NumberFormatter::DECIMAL);
$valid_pages = [
  '' => "views/home.php",
  'sync' => "views/connect.php",
];
$cache_control = "?figuere" . random(2);
$page_exists = isset($valid_pages[$uri->page_source]);
if ($page_exists == true) {
  require_once("{$valid_pages[$uri->page_source]}");
} else {
  require_once("views/home.php");
}
