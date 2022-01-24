<?php //print_r($_GET);
$datacol=array();$count=0; $filter_text=""; $prim=array(); $val=array();  $precolumns=array();
$post->igroup = explode("|", $post->igroup)[0];
if(isset($idatacol))
{
	$datacol=explode("|",$idatacol);
}
if(isset($idatacol_label))
{
	$datacol_label=explode("|",$idatacol_label);
}
if(isset($idatacol_prefix))
{
	$datacol_prefix=explode("|",$idatacol_prefix);
}

// Handle filters
if (!empty($post->filter_param)) {
	$xfparam=explode("|",$post->filter_param);
	for($i=0;$i<count($xfparam);$i++)	{
		$rparam=$xfparam[$i];

		$sparam=explode(",",$rparam);
		// if($ifilter !="") $ifilter .=",";
		// $ifilter .=trim($sparam[0]);
		if($filter_text !="" and $sparam[1] !=0) $filter_text .=" and ";
		if(isset($sparam[2])) $filter_text .=get_parameter_operation($sparam[0], trim($sparam[1]), $sparam[2], $sparam[3]);
	}
}
if(isset($combine) && isset($filter))
{
	$icombine=$combine;
	$combine=explode("|",$icombine);
}
if(!empty($post->selectDate) && !empty($param->report_setup->datecol)){
	$dateQuery = getDateValue($post->selectDate, $param->report_setup->datecol);
	if(empty($dateQuery)) $dateQuery="$param->primary_key like '%%'";
} else  $dateQuery="$param->primary_key like '%%'"	;

if(trim($post->cols)=="")
{

	$msg="No column selected. Please select column to display report";
	$msg=urlencode($msg);
	header("Location:../report_view.php?msg=$msg");
	die();
}
$xparam=explode("|",$post->cols);
for($i=0;$i<count($xparam);$i++)
{
	$sparam=explode(",",$xparam[$i]);
	$columns[$i]=trim($sparam[0]);
	if(isset($sparam[1]))$stitle[$i]=trim($sparam[1]);
	if(isset($sparam[2]))$cbreak[$i]=trim($sparam[2]);
}
$precolumns = $columns;

$xfparam=explode("|",$post->filter_param);
for($i=0;$i<count($xfparam);$i++)
{
	$rparam=$xfparam[$i];
	$sparam=explode(",",$rparam);
	if($filter_text !="" and $sparam[1] !=0) $filter_text .=" and ";
	if(isset($sparam[2])) $filter_text .=get_parameter_operation($sparam[0], trim($sparam[1]), $sparam[2], $sparam[3]);
}
if(empty($param->retrieve_filter))$icondition=""; else $icondition="and $param->retrieve_filter";
foreach (array_merge($columns, [$post->sec]) as $k=>$v)
{
		$realCol[] = $extracted["column"][$v] ." AS ". $v;
		$coldesc[] = $extracted["description"][$v];
		$order[]   = $extracted["type"][$v];
}
$priCol=$extracted["column"][$post->pri];
$secCol=$extracted["column"][$post->sec];
$dataCol = $extracted["column"][$post->igroup];
if(strtolower(substr($dataCol, 0, 3)) !== "sum")$dataCol = "SUM({$dataCol})";
$colstr=implode(",",$realCol);
if(!empty($filter_text)) $filter_text = " and $filter_text";

//sorting
$param->sort = explode(" ", str_replace(" ", " ", strtolower($param->sort)));
$default_direction = ["asc", "desc"];
if(!empty($post->dir)){
	$lastword = array_pop($param->sort);
	if (in_array($lastword, $default_direction)) {
		array_push($param->sort, $post->dir);
	}else {
		array_push($param->sort, $lastword);
		array_push($param->sort, $post->dir);
	}
}
$param->sort = strtoupper(implode(" ", $param->sort));
$q="select $param->primary_key, $dataCol AS {$post->igroup}, $colstr from {$param->table} where $dateQuery $filter_text $icondition group by $priCol, $secCol order by {$param->sort}";
//echo $q;;
// see($q);
$r=$db->query($q) or die($db->error);
while($row=$r->fetch_assoc())
{
	  $priVal=$row["{$post->pri}"];
	  $secVal=$row["{$post->sec}"];
	  $prim[$secVal]=0;

		$val[$priVal][$secVal]=$row[$post->igroup];
		foreach($precolumns as $i => $v)
	  {
		  ${$v}[$priVal]=$row["{$v}"];
	  }
	  $count++;
}

// see($post->sec)
?><!DOCTYPE html PUBLIC >
<html >
<link href="../css/materialize.css" type="text/css" rel="stylesheet">
<body>
 <div id="report_display">
	<div class="graphpanel">
	   <?php if(!empty($data) && !empty($graph)) { ?>
		  <div class="graph-div" id="addpanel">
		    <div class="graph-left" >
					<div class="graph-text" id="display-div"></div>
				</div>
				<div class="graph-right"></div>
		  </div>
		<?php } ?>
	</div>
	<div class="clear" style="overflow-x:auto; width:100%">
		<table width="100%" cellpadding="0" cellspacing="0" class="striped bordered highlight capitalize">
			<thead>
				<tr class="graph-title" id="title-row">
					<th ></th>
					<th colspan="<?php echo count($prim); ?>" class="center"><?=$extracted["description"][$post->sec]; ?> </th>
					<th></th>
				</tr>
				<tr class="graph-title" id="title-row">
					<th >S/N</th>
					<th><?php echo $extracted["description"][$post->pri];?></th>
					<?php
					foreach($prim as $k1=> $v1) {
						if(in_array($extracted["type"][$post->sec], ["date", "datetime", "time"]))$date = new DateTime($k1)?>
						<th>
							<a href="javascript:;"  >
								<?php
								switch ($extracted["type"][$post->sec]) {
									case 'text':
										echo $k1;
									break;
									case 'number':
										echo $fmt->format($v1);
									break;
									case 'select':
										$formatted = $extracted["source_data"][$post->sec];
										echo isset($formatted[$k1]) ? $formatted[$k1] : "-";
									break;
									case 'combo':
										$formatted = $extracted["source_data"][$post->sec];
										echo isset($formatted[$k1]) ? $formatted[$k1] : "-";
									break;
									case 'date':
										echo $date->format('F jS, Y');
									break;
									case 'datetime':
										echo $date->format('j-M-y g:ia');
									break;
									case 'time':
										echo $date->format('g:ia');
									break;
								}
								?>
							</a>
						</th>
					<?php } ?>
					<th>TOTAL</th>
				</tr>
			</thead>
				<?php if (!isset($count) || $count==0) { ?>
					<tr> <td colspan="<?php echo count($prim) +1 ?>"><div id="Header">
						<div class="no-result" id="top-div">No result found to display</div>
					</div></td></tr>
				<?php } ?>
				<tbody>
					<?php $ct = 1; foreach($val as $k => $v){ ?>
						<tr class="graph_row">
							<td><?=$ct?></td>
							<?php foreach($precolumns as $pk=> $pv) { ?>
								<!-- <td><?//php echo ${$pv}[$k];?></td> -->
							<?php } ?>
							<td class="gr-sn-col">
								<?php $source_count=0; $dummy_count=0;$details_count=0;
								$fmt = numfmt_create("en", NumberFormatter::DECIMAL );
								if(in_array($extracted["type"][$pv], ["date", "datetime", "time"]))$date = new DateTime($k);
								switch ($extracted["type"][$pv]) {
									case 'text':
										echo $k;
									break;
									case 'number':
										echo $fmt->format($k);
									break;
									case 'select':
										$formatted = $extracted["source_data"][$pv];
										echo isset($formatted[$k]) ? $formatted[$k] : "-";
									break;
									case 'date':
										echo $date->format('F jS, Y');
									break;
									case 'datetime':
										echo $date->format('j-M-y g:ia');
									break;
									case 'time':
										echo $date->format('g:ia');
									break;
								}?>
								</td><?php foreach($prim as $k1=> $v1) {?>
								<td>
									<?php if(!empty($v[$k1])){
										echo number_format($v[$k1],2,'.',','); $prim[$k1]+=$v[$k1];
									}else echo '-'; ?>
								</td>
							<?php } ?>
							<td><?php echo number_format(array_sum($v),2,'.',','); ?></td>
						</tr>
					<?php $ct++;} ?>
					<tr style="font-weight:bold" >
						<td colspan="<?php echo count($precolumns)+1; ?>" class="center"> TOTAL </td>
						<?php foreach($prim as $k1=> $v1) { ?>
							<td><?PHP echo number_format($v1,2,'.',','); ?></td>
						<?PHP } ?>
						<td> <?php echo number_format(array_sum($prim),2,'.',',') ?> </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
