<?php
require_once 'generic_functions.php';
class Generic
{
  public $name = "Smart DApp | Multi DApp Wallet";
  public $project = "Smart DApp";
  public $email = "notification@smartdapps.site";
  public $favicon = "defiant";
  public $has_db = true;
  public $domain = "";
  protected $isConnected = false;
  public static $mydb;
  public $local_server = "localhost";
  public $server = "localhost";
  public $backend = "master/";
  public $local_servers = ['localhost', 'localhost:8080', "127.0.0.1"];
  public $admins = ["b" => "Bobbycourtice80@gmail.com", "s" => "ucmodulus@gmail.com", "j" => "Josesmithabrams@gmail.com", "localhost" => "ucmodulus@gmail.com"];


  public function __construct()
  {
    global $_SERVER;
    $this->server  =  $_SERVER['SERVER_NAME'];
  }

  //Connects to database if not connected

  public function getLocalServers()
  {
    return ($this->local_servers);
  }

  public function getServer()
  {
    return ($this->server);
  }
  public function isLocalhost()
  {
    return in_array($this->getServer(), $this->getLocalServers());
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
    setcookie("siteData", "{$this->domain},{$this->backend}", time() + 36000, "/");
    return ((object)[
      "page_source" => explode("?", $page_source)[0],
      "content_id" => explode("?", $content_id)[0],
      "event" => $event,
      "other" => $other,
      "parent_page" => $parent_page,
      "site" => $this->domain,
      "backend" => "{$this->domain}{$this->backend}",
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
}
