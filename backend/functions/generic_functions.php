<?php
require_once("get_browser.php");
//Adds htt protocol to a URL string
function ADMIN_SESSION()
{
	$session = object($_SESSION);
	if (isset($session->admin)) {
		$session  = $session->admin;
	} else $session = new stdClass;
	return $session;
}
function addHttp($url)
{
	if (isset($url) && !empty($url) && $url != "") {
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
	}
	return $url;
}
// Converts any array to an object
function object(array $array = []): object
{
	if (empty($array)) $array = new stdClass;
	return json_decode(json_encode($array));
}
// Converts any array to an object
function arrray(object $array): array
{
	if (empty($array)) $array = new stdClass;
	return json_decode(json_encode($array), true);
}

// Filters an array with one or multiple values
function filter_array(array $array, array $filter_values)
{
	$return = [];
	foreach ($array as $key => $value) {
		$validrow = 0;
		foreach ($filter_values as $filter_key => $filter_value) {
			if (isset($value->{$filter_key}) && $value->{$filter_key} == $filter_value) $validrow++;
		}
		if ($validrow == count($filter_values)) $return[$key] = $value;
	}
	return $return;
}

// Groups an array by value
function array_group($array = array(), $value = "")
{
	$response = [];
	foreach ($array as $k => $v) {
		$cat = !isset($v->{$value}) ? "" : strtolower($v->{$value});
		$response[$cat][] = $v;
	}
	return $response;
}

//Get a range of array indexes
function array_range($array = array(), $range = 1, $offset = 0)
{
	$result = array();
	$count = 1;
	$array = (array)$array;
	$range = $range === 1 ? count($array) : $range;
	foreach ($array as $key => $value) {
		if ($count >= $offset && $count <= $range) {
			$result[$key] = $value;
		}
		$count++;
	}
	return $result;
}

//Converts an array back to http GET (array_to_GET)
function array_serialize($array = array())
{
	$build = [];
	if (!empty($array)) {
		foreach ($array as $key => $val) {
			$key = trim($key);
			$val = trim(urlencode($val));
			$build[] = "$key=$val";
		}
	}
	return implode("&", $build);
}

//Converts GET-like string to an Array exploded by a given delimiter
function explodeToKey($delimiter, $array)
{
	$response = [];
	if (gettype($array) == 'array' && !empty($delimiter)) {
		foreach ($array as $key => $value) {
			$hold = explode($delimiter, $value);
			$hold = array_map("trim", $hold);
			if (isset($hold[1])) $response[$hold[0]] = $hold[1];
		}
	} else $response = "second argument not an array";
	return ($response);
}

//Searches a multidimentional array for a value and returns the parent key
function getdataType($array, $value)
{
	foreach ($array as $k => $v) {
		$key = array_search($value, $v);
		if ($key !== false) {
			return ($k);
		}
	}
	return (false);
}

//Alternative to core PHP array_column function
function array_columnn(array $input, $columnKey, $indexKey = null)
{
	$array = array();
	foreach ($input as $value) {
		$value = (array)$value;
		if (!array_key_exists($columnKey, $value)) {
			trigger_error("Key \"$columnKey\" does not exist in array");
			return false;
		}
		if (is_null($indexKey)) {
			$array[] = $value[$columnKey];
		} else {
			if (!array_key_exists($indexKey, $value)) {
				trigger_error("Key \"$indexKey\" does not exist in array");
				return false;
			}
			if (!is_scalar($value[$indexKey])) {
				trigger_error("Key \"$indexKey\" does not contain scalar value");
				return false;
			}
			$array[$value[$indexKey]] = $value[$columnKey];
		}
	}
	return $array;
}

//Extract values of specific keys from an array
function array_extract($main_array, $extr_keys, $associate_keys = false)
{
	$return = [];
	foreach ($main_array as $key => $value) {
		$search = array_search($key, $extr_keys);
		if ($search !== false) {
			if ($associate_keys)
				$return[$key] = $value;
			else $return[] = $value;
		}
	}
	return $return;
}

//Rename the keys in an array to the values in another array where both keys match
function array_remap($main_array, $match_keys)
{
	$return = [];
	$main_array = (array)$main_array;
	$match_cols = array_keys((array)$match_keys);
	$match_vals = array_values((array)$match_keys);
	foreach ($main_array as $key => $value) {
		$index  = array_search($key, $match_cols);
		if ($index !== false) {
			$newkey = $match_vals[$index];
			$return[$newkey] = $value;
		}
	}
	return $return;
}
//Checks if a sring is json
function isJson($string)
{
	$json_val = json_decode($string);
	$bool_val = (json_last_error() == JSON_ERROR_NONE);
	return $json_val;
}

//Turns a string to a filename format
function strToFilename($str)
{
	$str = strtolower(str_replace(' ', '_', trim($str)));
	$str = preg_replace('/[^A-Za-z0-9\-_\/]/', '', $str);
	$str = str_replace('/', '-', $str);
	$str = str_replace('_-', '_', $str);
	$str = str_replace('-_', '_', $str);
	$str = str_replace('__', '_', $str);
	$str = str_replace('-', '_', $str);
	$str = str_replace('-', '_', $str);
	return (trim($str));
}

//Turns a string to a url format
function strToUrl($str)
{
	$str = str_replace('--', '-', str_replace('_', '-', strToFilename($str)));
	return $str;
}

// Appends more get variables to url
function add_get_to_url($url_string, $array)
{
	if (!empty($array)) {
		$get = [];
		$url_part = explode("?", $url_string);
		if (is_object($array)) $array = arrray($array);
		if (!empty($url_part[1])) {
			$get = explodeToKey("=", explode("&", $url_part[1]));
		}
		$url_part[1] = array_merge($get, $array);
		$url_part[1] = array_serialize($url_part[1]);
		$url_string = implode("?", $url_part);
	}
	return $url_string;
}

function _writeFile($file, $data, $returnData = false)
{
	$dir = dirname($file);
	if (!is_dir($dir)) {
		mkdir($dir, 0777, true);
	}
	if (gettype($data) == 'array' || gettype($data) == 'object') {
		if (empty($data)) return (false);
		$data = utf8ize($data);
		$data = json_encode($data);
	}
	if (!empty($data)) {
		if ($handle = fopen($file, "w+")) {
			if (fwrite($handle, $data)) {
				if (file_exists($file) && !filesize($file)) unlink($file);
				if ($returnData === true) {
					return ($data);
				} else {
					return (true);
				}
			} else return (false);
			fclose($handle);
		}
	} else return (false);
}


//Reads a file
function _readFile($file)
{
	$data = null;
	if (file_exists($file)) {
		$handle = fopen($file, 'r');
		$filesize = filesize($file);
		$data = ($filesize) ? fread($handle, filesize($file)) : json_encode([]);
		fclose($handle);
		if (!$filesize) unlink($file);
	}
	return ($data);
}

//Reads a directory
function _readDir($dir, $nested = false)
{
	if (!is_dir($dir)) {
		mkdir($dir, 0777, true);
	}
	$files = scandir($dir);
	$files = array_filter($files, function ($file) {
		return ($file == "." || $file == "..") ? false : true;
	});
	return ($files);
}

//Best function to handle utf8 encoding of multi-dimensional array data
function utf8ize($d)
{
	if (is_array($d)) {
		foreach ($d as $k => $v) {
			$d[$k] = utf8ize($v);
		}
	} else if (is_string($d)) {
		// Remove all non-printable charachters
		$d = preg_replace('/[^[:print:]]/', '', $d);
		return  trim(utf8_encode($d));
	} else if (is_object($d)) {
		foreach ($d as $k => $v) {
			$d->{$k} = utf8ize($v);
		}
	}
	return $d;
}

//Removes all special characters from a sting excluding;
function cleanUp($string = "", $excludes = [])
{
	$excludes = empty($excludes) ? "" : implode(",", $excludes);
	if (!empty($string)) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-_' . $excludes . ']/', '', $string); // Removes special chars.
	}
	return $string;
}

//Deletes all files and folders in a given Directory
function delete_files($dir)
{
	foreach (glob($dir . '/*') as $file) {
		if (is_dir($file)) delete_files($file);
		else {
			$dir = dirname($file);
			$tbn = "{$dir}/tbn";
			$tbn = str_replace($dir, $tbn, $file);
			if (file_exists($tbn)) unlink($tbn);
			unlink($file);
		};
	}
	rmdir($dir);
}

//Deletes files that have stayed longer than a given period
function clear_files_longer_than($days = 30, $dir = "")
{
	if (is_dir($dir)) {
		$today = strtotime(date('Y-m-d h:i:s'));
		$handle = opendir($dir);
		while (false !== ($file = readdir($handle))) {
			if ($file == '.' || $file == '..') continue;
			$thisfile = $dir . $file;
			$filetime = filectime($thisfile);
			$diff = round(($today - $filetime) / (3600 * 24));
			if ($diff > $days && !is_dir($thisfile)) {
				unlink($thisfile);
				continue;
			}
		}
	}
	clearstatcache();
}

// Generates token string
function random($l = 8)
{
	return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

//PHP version of AJAX
function curl_post($url = null, $fields = [], $headers = null)
{
	if (gettype($fields) == "object") $fields = arrray($fields);
	$postvars = http_build_query($fields);
	$ch = curl_init();
	if (empty($url) || gettype($url) !== "string") return "Parameter 1 should be a url string";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if (!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function curl_get($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$head = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $head;
}

function curl_get_content($url = null, $generic = null)
{
	if ($generic->islocalhost()) {
		$options = array(
			'ssl' => array(
				'cafile'            => "{$_SERVER['DOCUMENT_ROOT']}/cacert.pem",
				'verify_peer'       => true,
				'verify_peer_name'  => true,
			),
		);
		$context = stream_context_create($options);
		$res = file_get_contents($url, FALSE, $context);
	} else {
		$res = file_get_contents($url);
	}
	return $res;
}

//Advanced printer for all kinds of data
function see($arr, $stop = true)
{
	if (gettype($arr) == 'array' || gettype($arr) == 'object') {
		echo "<pre>";
		print_r($arr);
		if ($stop === true) {
			die();
		}
	} else {
		if ($stop !== true) {
			print("$arr");
		} else {
			die("$arr");
		}
	}
}

function getWorkingDir($file)
{
	$file = str_replace('http://', '', $file);
	$file = str_replace('https://', '', $file);
	$sitename = basename($site);
}

//Checks if http file path of any file within the server exists
function file_exist($url)
{
	$ret = file_exists(absolute_filepath($url)) ? true : false;
	return $ret;
}

function mymd5Verify($passw, $verify)
{
	$response = md5(trim($passw)) === trim($verify) ? true : false;
	return $response;
}

//Smart way to format file paths
function file_path($file, $default, $ouput_http = true)
{
	//if file is empty or (file is not a http file &&  it doesnt exist ): switch to default
	if (empty($file) || (!is_http_url($file) && (!file_exists($file) && !is_file($file)))) {
		$file = $default;
	} else {
		// But if it's a http file, convert it to an absolute path an run check again;
		if (is_http_url($file)) {
			$file = file_path(absolute_filepath($file), $default);
		} else {
			// if it exists and not a http file, turn it to http or absolute file path.(depending on your choice)
			$file = $ouput_http ? http_filepath($file) : absolute_filepath($file);
		}
	}
	return ($file);
}

//Get the full file path of any path whether existing or not.
function absolute_filepath($file = "", $only_existing_files = true)
{
	$root = $_SERVER["DOCUMENT_ROOT"];
	$cleanedFile = str_replace("../", "", $file);
	$thisScriptDir = dirname($_SERVER["SCRIPT_FILENAME"]);
	$file_exists = file_exists($file);
	$file_exists = $only_existing_files === false ? true : $file_exists;
	if ($file_exists || is_dir(dirname($file))) {
		$dirs = explode("/", $file);
		foreach ($dirs as $key => $value) {
			if ($value == "..") {
				$xpld = explode("/", $thisScriptDir);
				array_pop($xpld);
				$thisScriptDir = implode("/", $xpld);
			}
		}
		$file = "$thisScriptDir/$cleanedFile";
	} else if (stripos($file, "http") !== false) {
		if (!empty(parse_url($file)["path"])) {
			$file = $root . parse_url($file)["path"];
		}
	}
	return ($file);
}

//Get the full http path of any file within the server for files that exist.
function http_filepath($file = "")
{
	$site =  new Generic();
	$uri =  $site->getURIdata();
	$root = $_SERVER["DOCUMENT_ROOT"];
	if (file_exists($file)) {
		if (!is_absolute_filepath($file)) $file = absolute_filepath($file);
		if (in_array($site->getServer(), $site->getLocalServers())) {
			$split = basename($uri->site);
			$file = $uri->site . explode("$split/", $file)[1];
		} else {
			$file = $uri->site . str_replace("$root/", "", $file);
		}
	}
	return $file;
}

//Checks if a url or file_path contains http
function is_http_url($url = "")
{
	$response = false;
	if (!empty($url) && stripos($url, "http") === 0) $response = true;
	return $response;
}

//Checks if a filepath is absolute
function is_absolute_filepath($file = "")
{
	$response = false;
	$root = $_SERVER["DOCUMENT_ROOT"];
	if (!empty($file) && stripos($file, $root) === 0) $response = true;
	return $response;
}

function grider($case)
{
	switch ($case) {
		case 1:
			$grid = ['col s12' => [1, 'col s12 m5 p-0 grid-100 float-left', 'default_card_v']];
			break;
		case 2:
			$grid = ['col s12' => [2, 'col s12 m6 no-pad-mobile grid-50 float-left', 'card_list']];
			break;
		case 3:
			$grid = [
				'col l5 m12' => [1, 'grid-100 dc', 'default_card_v'],
				'col l7 m12' => [2, "grid-50 cl", 'card_list'],
			];
			break;
		case 4:
			$grid = [
				'col l5 m12 s12' => [1, 'grid-50', 'default_card_v'],
				'col l4 m12 s12' => [2, 'grid-25', 'card_list'],
				'col l3 m12 s12' => [1, 'grid-50', 'default_card_v'],
			];
			break;
		case 5:
			$grid = [
				'col l3 m12 s12' => [2, 'grid-50', 'default_card_v'],
				'col l6 m12 s12' => [1, 'grid-100', 'default_card_v'],
				'col l3 m12 s12 2' => [2, 'grid-50', 'default_card_v']
			];
			break;
		case 6:
			$grid = [
				'col l5 m12 s12' => [3, 'grid-25', 'card_list'],
				'col l4 m12 s12' => [2, 'grid-25', 'card_list'],
				'col l3 m12 s12' => [2, 'grid-50', 'default_card_v'],
			];
			break;
		case 7:
			$grid = [
				'col l5 m12 s12' => [1, 'grid-100', 'default_card_v'],
				'col l3 m12 s12' => [2, 'grid-50', 'default_card_v'],
				'col l4 m12 s12' => [4, 'grid-25', 'card_list']
			];
			break;
		case 8:
			$grid = [
				'col l5 m12 s12' => [2, 'grid-50', 'default_card_v'],
				'col l4 m12 s12' => [4, 'grid-25', 'card_list'],
				'col l3 m12 s12' => [2, 'grid-50', 'default_card_v'],
			];
			break;
		default:
			$grid = [
				'col l4 m12 s12 1' => [2, 'grid-50', 'default_card_v'],
				'col l3 m12 s12' => [3, 'grid-25', 'default_card_v'],
				'col l4 m12 s12' => [4, 'grid-25', 'card_list']
			];
			break;
	}
	return $grid;
}

//Used by controller's filterQuery to extract WHERE IN clause
function get_in_clause($string = '', $position = "")
{
	if (!empty($string)) {
		$string  = trim(explode("),", $string)[$position] . ")");
		preg_match('#\((.*?)\)#', $string, $bracket);
		$bracket = implode("','", explode(',', str_replace("'", "", $bracket[1])));
		$bracket = "('{$bracket}')";
		$firstwd = strtok($string, " ");
		$string	 = "{$firstwd} in {$bracket}";
	}
	return $string;
}

function filterQuery($filter, $fields)
{
	$_flt = [];
	$filter =  str_replace(" and ", ",", strtolower($filter));
	$arr = explode(',', $filter);
	$explosives = ["<>", "!=", "<", ">", "="];
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
					$_flt[] = "{$_a[0]} IS NULL";
				} else {
					$_flt[] = "{$_a[0]}$explode_key'{$_a[1]}'";
				}
			}
		} else if (gettype(stripos($fltr, ' in ')) !== 'boolean') {
			$_flt[] = get_in_clause($filter, $fltr);
		}
	}
	return implode(" and ", $_flt);
}

//Format number of view ranges
function number($int = 0)
{
	$int = intval($int);
	if ($int > 999) {
		$int = round($int / 1000, 1);
		$int = "{$int}k";
	}
	return $int;
}

function simple_encode($value)
{
	if (is_numeric($value)) {
		$value = "$value";
	}
	$value = str_replace(" ", "+", $value);
	// return substr(base64_encode(str_rot13($value)), 0, -1);
	return base64_encode(str_rot13($value));
}

function simple_decode($value)
{
	$value = str_rot13(base64_decode($value));
	return str_replace("+", " ", $value);
}

function mysubstr($string = '', $length = 0)
{
	$return = substr($string, 0, $length);
	if (strlen($string) > $length) $return .= "...";
	return $return;
}

function remove_tbn($string = '')
{
	return str_replace("tbn/", "", $string);
}
