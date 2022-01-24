<?php

function processMasterStock($id)
{
	global $_POST;
	global $generic;
	global $param;
	$db = $generic->connect();
	$response = new stdClass;

	$master_cols = ['itemid', 'upc', 'categories', 'pcategories', 'brand', 'date_created', 'created_by', 'unit', 'subdivision', 'price2', 'sunit_value', 'sunit'];
	extract($_POST);
	$master_id = $id;
	if (!empty($master_stock_data)) {
		$tempData = str_replace("\\", "", $master_stock_data);
		$tempData = utf8ize($tempData);
		$cleanData = json_decode($tempData);
		$subs_id = [];
		if (!empty($cleanData)) {
			// loop Through the slave stocks from the form;
			foreach ($cleanData as $k => $subItemData) {
				$subItemData->price = empty($subItemData->price) ? $price1 : $subItemData->price;
				$thisid = $subItemData->id0 . $subItemData->id1;
				$thisid = "$itemid-$thisid";
				$subs_id[] = $thisid;

				//Build query
				$build = "";
				$desc = "$description ({$subItemData->desc0} {$subItemData->title0},{$subItemData->desc1} {$subItemData->title1})";
				$pic = isset($subItemData->picture) ? json_encode($subItemData->picture) : json_encode(array());
				$desc = $db->real_escape_string($desc);
				foreach ($master_cols as $key => $value) {
					if (isset(${$value})) {
						$build .= "$value='{${$value}}',";
					}
				}
				$build .= "picture='$pic',description='$desc',price1='{$subItemData->price}',primary_attrib_name='{$subItemData->title0}',substock_primary_attrib_desc='{$subItemData->desc0}',secondary_attrib_name='{$subItemData->title1}',substock_second_attrib_desc ='{$subItemData->desc1}'";

				//check if exists
				$check_slave = "SELECT tid FROM $param->table WHERE slave_stock_id='$thisid' AND master_stock_id='$master_id'";
				$check_query = $db->query($check_slave) or die($db->error);
				//If Existing slave
				if ($check_query->num_rows) {
					$sql = "UPDATE $param->table SET $build WHERE slave_stock_id='$thisid' AND master_stock_id='$master_id' ";
					$db->query($sql) or die($sql);
				} else {
					//If new slave
					$sql = "INSERT INTO $param->table SET $build, slave_stock_id='$thisid',master_stock_id='$master_id'";
					$db->query($sql) or die($db->error . " ($sql)");
				}
			}
			$subs_id = implode(',', $subs_id);
			$res = $db->query("DELETE FROM {$param->table} WHERE master_stock_id='$master_id' AND slave_stock_id NOT IN ($subs_id)");
		}
		$res = 1;
	} else if (!empty($delIds)) {
		$res = $db->query("DELETE FROM {$param->table} WHERE master_stock_id IN ($delIds)");
	}
	$response->status = $res;
	$response->message = $db->error;
	$response->primary_key = $master_id;
	return $response;
}

function verifyMasterStock($post)
{
	$tempData = str_replace("\\", "", $post->master_stock_data);
	$tempData = utf8ize($tempData);
	$cleanData = json_decode($tempData);
	$post->is_master_stock = count($cleanData) ? 1 : 0;
	return ($post);
}

function signin_log($row, $generic = null)
{
	if (empty($generic)) {
		$generic 		= new Generic();
	}
	// signin_log
	$ParamControl = new ParamControl($generic);
	$logparam 				=	$ParamControl->get_params("log");
	$param 				=	$ParamControl->get_params("admin_signin");
	if (empty($row->primary_key)) {
		$table_columns = array_keys((array)$row);
		$extrac_colmns = array_extract(array_flip(
			array_filter(
				(array)
				$param,
				function ($data) {
					return (gettype($data) == 'integer' || gettype($data) == "string");
				}
			)
		), $table_columns, true);
		$row = (object)array_remap($row, $extrac_colmns);
	}
	$_SESSION["admin"]["loggedin"] = true;
	$_SESSION["admin"]["user_id"]  =  $row->primary_key;
	$logdata = [
		"type"			=>  "admin",
		"action"		=> "login",
		"submitType"	=> "insert",
		"location"		=> $param->table,
		"user_id" 		=> $row->primary_key,
		"description" => "{$row->name_col} signed in"
	];
	$generic->connect();
	$response = $generic->insert($logdata, $logparam);
	$generic->closeDB();
	return $response;
}

function hash_password($post)
{
	if (!empty($post->password)) {
		$post->password = password_hash($post->password, PASSWORD_DEFAULT);
	} else {
		$post = password_hash($post, PASSWORD_DEFAULT);
	}
	return $post;
}

function slug($post)
{
	$post->view = strToUrl($post->title);
	return $post;
}

function displayFieldActions($colvalue = null, $row_data = null, $action = "select", $source = null, $paramControl = null, $param = null, $tab = null)
{
	$predefinedactions = ["select", "date", "datetime", "time"];
	if ($action == 'select') {
		// see($row, false);
		if (empty($colvalue)) $colvalue = intval($colvalue);
		if (!empty($colvalue) || $colvalue === 0) $colvalue = $paramControl->load_data_from_param($source, $colvalue);
		if (gettype($colvalue) == "array" || gettype($colvalue) == "object") {
			if (gettype($colvalue) == "object") $colvalue = json_decode(json_encode($colvalue), true);
			unset($colvalue[$param->primary_key]);
			$colvalue = implode(" ", array_values($colvalue));
		}
	} else if ($action == 'date') {
		$date = new DateTime($colvalue);
		$colvalue = $date->format('F jS, Y');
	} else if ($action == 'datetime') {
		$date = new DateTime($colvalue);
		$colvalue = $date->format("j-M-y g:ia");
	} else if ($action == 'time') {
		$date = new DateTime($colvalue);
		$colvalue = $date->format("g:ia");
	} else if (!empty($action) && !in_array($action, $predefinedactions) && empty($tab)) {
		$colvalue =  call_user_func_array($action, [$colvalue, $row_data]);
	}
	return $colvalue;
}
