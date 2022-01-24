<?php
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
//Intstantiate the Generic class
// $cookie		    = explode(",", $_COOKIE["siteData"]);
$generic 			= new Generic();
$post    			= (object)array_filter(array_merge($_POST, $_GET));
$uri					= $generic->getURIdata();
$uri->root    = absolute_filepath("{$uri->site}{$uri->backend}");
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$params    		= $paramControl->get_params();
$param 				= $params->{$post->pageType};
$db = $generic->connect();

/*
$formdata			= $paramControl->extract_form($param->form);
$formControl	= new FormControl($uri);
$pageId				= $post->pageType;
$param->form->form_view = empty($param->form->form_view) ? "swipe" : $param->form->form_view;
$param->default_view = empty($param->default_view) ? "list" : $param->default_view;
*/

if(empty($post->filter_param))$post->filter_param = "";
if(empty($param->datecol))$param->datecol = "date";

// Extract column fields
$extracted = $paramControl->extract_display_fields($param->report_setup->display_fields);
if (empty($post->cols) && !empty($param->report_setup->display_all)) {
	$post->cols = implode(",s,k|", $extracted["name"]).",s,k";
}

// Extract source data for columns with sources
foreach ($extracted["source"] as $key => $source) {
	$extracted["source_data"][$key] = [];
	if(!empty($source)){
		$value = $paramControl->load_data_from_param($source);
		$source = empty($source["pageType"]) ? $source : $source["pageType"];
		$thisparam  = $paramControl->get_params($source);
		if(!empty($thisparam->primary_key)){
			$value = array_map(function ($v)  use ($thisparam) {
				$v = (array)$v;
				unset($v[$thisparam->primary_key]);
				return implode(" - ", array_values($v));
			}, $value);
		}
		$extracted["source_data"][$key]  = $value;
	}
}
// see($extracted["source_data"]);
if(isset($param->report_type))
{
	if($param->report_type=="basics")
	{
		if(!empty($post->pri))
		{
			if(!empty($post->sec))require_once "run_distribution_report.php";
			else require_once "run_group_report.php";
		}
		else require_once "run_plain_report.php";
	}
	else if($param->report_type=="register")
	{
		require_once "run_register_report.php";
	}
	else if($param->report_type=="balance")
	{
		require_once "run_balance_report.php";
	}
}


function get_parameter_operation($column, $operation, $value, $to_value ){
	if(!empty($column) and !empty($operation)){
		$column    = trim($column);
		$operation = trim($operation);
		$value     = trim($value);
		$to_value  = trim($to_value);
		 if($operation == "range")
		 {
		    return  "{$column} >= '{$value}'  and $column <= '{$to_value}' ";
	   }  else if($operation == "equal")
		 {
		    return "{$column} = '{$value}' ";
	   }  else if($column == "less")
	   {
		    return "{$column} < '{$value}' ";
	   }  else if($column == "greater")
	   {
		    return "{$column} > '{$value}' ";
	   }  else if($column == "start")
	   {
		    return "{$column} like '{$value}%'";
	   }  else if($column == "end")
	   {
		    return "{$column} like '%{$value}'";
	   }  else if($column=="contain")
	   {
		    return "{$column} like '%{$value}%' ";
	   }  else if($column=="not")
	   {
		    return "{$column} <> '{$value}' ";
	   }
	}
}
?>
