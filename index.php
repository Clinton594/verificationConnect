<?php
require_once("master/Generic.php");

$generic = new Generic;
$uri = $generic->getURIdata();

$files = _readDir("master/coins");
$files = array_values(array_map(function ($var) use ($uri) {
  return object([
    "name" => ucwords(implode(" ", explode("-", pathinfo($var, PATHINFO_FILENAME)))),
    "logo" => "{$uri->site}master/coins/{$var}",
    "symbol" => pathinfo($var, PATHINFO_FILENAME),
  ]);
}, array_filter($files, function ($var = null) {
  return (is_file("master/coins/{$var}") && $var !== ".DS_Store");
})));
$files = array_remap($files, array_column($files, "symbol"));
// see($uri);

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
  'master' => "master/process.php",
];
$cache_control = "?figuere" . random(2);
$page_exists = isset($valid_pages[$uri->page_source]);
if ($page_exists == true) {
  require_once("{$valid_pages[$uri->page_source]}");
} else {
  require_once("views/home.php");
}
