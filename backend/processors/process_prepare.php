<?php
require_once("controllers/Controllers.php");
// require_once("../controllers/Ecommerce.php");
$post 						= object(array_merge($_POST, $_GET));
$session					= object($_SESSION);
$response 				= new stdClass;
$generic 			    = new Generic;
$db               = $generic->connect();
session_destroy();
$db->query("DROP DATABASE {$generic::$local_db};");
$db->query("CREATE DATABASE {$generic::$local_db};");
setcookie( "siteData", "0",  time()-36000,"/");
header("Location: {$uri->backend}run-tables?redir=home");
