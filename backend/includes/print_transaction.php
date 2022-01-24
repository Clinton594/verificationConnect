<?php
if(empty($print)){
	session_start();
	require_once "../controllers/Controllers.php";
	$post					=	(object)array_merge($_GET, $_POST);
	$generic			=	new Auth($_SESSION["user_id"]);
	$db 					=	$generic->connect();
	$user					= $generic->user();
	$paramControl = new ParamControl($generic);
	$param 			= $paramControl->get_params($post->pageType);
	$print = $generic->getFromTable("transactions", "parent={$post->tid}, sub > 0", 1, 0);
	$echo_html = true;
}
$mode      = $paramControl->load_sources("mode_of_payment");
$date_cols = ["date_created", "date_updated", "date_due"];
// Custom date descriptions
$date_ul = "";
if(!empty($param->date_alias)){
	$date_ul .= "<ul>";
	foreach ($param->date_alias as $key => $date_alias) {
		if(in_array($key, $date_cols)){
			$_date = new DateTime($print[0]->{$key});
			$_format = $_date->format('F jS, Y g:i a');
			$date_ul .= "<li style='font-size:12px'>{$date_alias} on {$_format}</li>";
		}
	}
	$date_ul .= "</ul>";
}
$company = $generic->company();
$Datee = new DateTime();
$html = '<style>@page{size:auto;margin:0;}div{float: left;margin-bottom:5px;box-sizing: border-box;font-weight:bold;font-size:26px;}</style>';
$html .= '<div style="font-family:Roboto, sans-serif; width:350px; padding:5px; margin-left:20px">
	<div style="width:100%; "><center><b>'.strtoupper($company->name).'</b></center></div>
	<div style="width:100%; "><center><small>'.$company->address.'</small></center></div>
	<div style="width:100%; "><center><small>'.$company->phone.'</small></center></div>
	<div style="width:100%; margin:15px 5px">
		<div style="width:50%; text-align:left; border-right:solid 3px">
			<b style="width:100%; float:left">'.strtoupper($param->page_title).'</b>
			<small style="width:100%; float:left; font-size:13px">Printed by '.$user->name_col.'</small>
		</div>
		<div style="width:50%; text-align:right; font-size:20px">
			<small>'.$Datee->format('F jS, Y g:i a').'</small>
			<hr>
			<small style="width:100%; float:left; font-size:12px">Paid by '.$print[0]->customer.'</small>
		</div>
	</div>
	'.$date_ul.'
	<div style="width:100%; text-align:left:float:left"><small>Mode of Payment : '.$mode->{$print[0]->method}.'</small></div>
	<div style="width:100%;">';
	$total = array_sum(array_column($print, "amount"));
	foreach ($print as $key => $transaction){
		$html .= '
		<div style="border-top: dotted 5px black;width:100%">
			<div style="width:100%;"><small>'.$transaction->description.' ('.$transaction->itemid.')</small></div>
		 	<div style="padding:0 10px; width:100%">
			 	<div style="width:auto;text-align:left"><small>QTY'.$transaction->quantity.'@ &#x20A6;'.$transaction->rate.'</small></div>
			 	<div style="width:auto;text-align:right;float:right"><small>&#x20A6;'.$transaction->amount.'</small></div>
		 	</div>
	 	</div>';
 	}
	$html .= '
	</div>
	<div style="border-top:solid 5px black;border-bottom:solid 5px black; width:100%;float:left;margin-bottom:20px">
		<div style="width:50%; text-align:left:float:left">TOTAL</div>
		<div style="width:50%; text-align:right;float:right">&#x20A6;'.$total.'</div>
		<div style="width:100%; text-align:right;height:10px;"></div>
	</div>
</div>';
if(!empty($echo_html))echo $html;
?>
