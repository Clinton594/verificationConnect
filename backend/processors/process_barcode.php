<?php
require_once "../controllers/Controllers.php";
require_once "../functions/barcode_functions.php";
//Intstantiate the Generic class
$cookie		    = explode(",", $_COOKIE["siteData"]);
$generic 			= new Generic($cookie[1]);
$post    			= (object)$_POST;
$db						= $generic->connect();
$uri					= $generic->getURIdata();
$uri->root    = absolute_filepath("{$uri->site}{$uri->backend}");
$curdate =! isset($_COOKIE["_today"]) ? $curdate= date("Y-m-d") : $_COOKIE["_today"];


$response = new stdClass;
$response->status = 0;
$ptcount=0;
$phoneCol="telephone";

	if(empty($post->filter_checkbox))	{
		$redirection ="../report_view_transfer.php";
		$response->message = "None Selected: Please select by checking the checkbox";
	}else{
		$text='<style>@media print{@page{size:auto;margin:0;}}</style><div style="width:200px;margin:10px;">';
		$ids=str_replace("|", ",", $post->filter_checkbox);
		$query1="select name, phone from company_info where id=1";
		$rs1=$db->query($query1) or die($db->error.$query1);
		$company = $generic->company();

		$query="select tid,upc,itemid,unit,description,price1,price2,price3 from item where tid in ({$ids})";
		$rs=$db->query($query) or die($db->error.$query);
		while($rw=$rs->fetch_assoc())
		{
			extract($rw);
			if(empty($upc)){
				$upc=time();
				$query="UPDATE item SET upc='$upc' WHERE tid='$tid' OR master_stock_id='$tid'";
				$rs=$db->query($query) or die($db->error.$query);
			}
			$itemid_ = !empty($itemid ) ? $itemid : "***";
			$text .='<style>@page{size:auto;margin:0;}</style><div style="margin-left:2px; float:left; width:100%">
			    <b style="width:100%; text-align:center;float:left;font-size:17px;line-height:17px">'.$company->name.'</b>
			    <small style="width:100%; text-align:center;float:left">('.$company->phone.')</small>
			    <div style="text-align:center;margin:5px 0;line-height:13px;float:left">'.$description.'</div>
			    <div style="text-align:center;width:100%;"><b>N'.$price1.'</b><small> '.$unit.'</small></div>
			    <div style="text-align:center;width:100%"><b>N'.$price3.'</b><small> per TL</small></div>
			    <div style="text-align:center;width:100%"><b>Product ID: '.$itemid_.'</b></div>
			    <img src="'.printBarcode($upc, 68).'" style="margin:5px 15px 0 15px; float:left" />
			    <small style="width:100%;float:left;text-align:center;">'.$upc.'</small>
			</div>';

		}
		$text.="</div>";
		$response->status = 1;
		$response->data = $text;
	}
$db->close();
echo json_encode($response);
?>
