<?php

$datacol=array();$count=0; $filter_text=""; $dimF=array();

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
	$column_name=trim($sparam[0]);
	$columns[$i]=	$column_name;
	if(isset($sparam[1]))$stitle[$column_name]=trim($sparam[1]);
	if(isset($sparam[2]))$cbreak[$column_name]=trim($sparam[2]);
}

$xparam=explode("|",$post->igroup);
foreach($xparam as $k=>$v)
{
	$columns[]=$v;
	$stitle[$v]='s';
	$cbreak[]='k';
}

if(empty($param->retrieve_filter))$icondition=""; else $icondition="and $param->retrieve_filter";
foreach ($columns as $k=>$v)
{
		$realCol[$k] = $extracted["column"][$v] ." AS ". $v;
		$coldesc[$k] = $extracted["description"][$v];
		$order[$k]   = $extracted["type"][$v];
}

$priCol=$extracted["column"][$post->pri];
$colstr=implode(",",$realCol);
$post->igroup=str_replace('|', ',', $post->igroup);
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
$q="select {$param->primary_key}, $colstr from {$param->table} where $dateQuery $filter_text $icondition group by $priCol order by  {$param->sort}";
//print_r($_GET);
// die($q);
$r=$db->query($q) or die($db->error.$q.'is a boy');
$rows=[];
while($row=$r->fetch_assoc())
{
	// see($row, false);
	  $id[$count]=$row["$param->primary_key"];
	  foreach($columns as $i => $v)
	  {
		  // ${$columns[$i]}[]=$row["{$v}"];
			$rows[$count][$v]=$row["{$v}"];
	  }
	  $count++;
}

if(!empty($post->graph) && !empty($post->plotdata)){
	$graphdata = ["labels"=>array_column($rows, $post->pri), "datasets"=>[]];
	$cols = reset($rows);
	unset($cols[$post->pri]);
	$cols = array_keys($cols);
	foreach ($cols as $col) {
		$graphdata["datasets"][] = [
		 "label" => strtoupper($extracted["description"][$col]),
		 "data" => array_column($rows, $col)
	 ];
	}
	die(Json_encode($graphdata));
}
?>
<!DOCTYPE html PUBLIC >
<html >
	<body>
		<div id="report_display">
			<div class="container">
				<div class="graphpanel">
					<?php if(!empty($post->graph)) { ?>
						<div class="graph-div" id="addpanel<?=$post->pageid?>">
							<div class="graph-left" >
								<canvas id="myChart<?=$post->pageid?>" style="width:100%; height: 400px !important"></canvas>
							</div>
							<div class="graph-right"> </div>
						</div>
					<?php } ?>
				</div>
				<div class="clear">
					<table width="100%" cellpadding="0" cellspacing="0" class="striped bordered highlight capitalize">
						<thead>
							<tr class="graph-title" id="title-row">
								<th>S/N</th>
								<?php
									foreach($columns as $i => $column) {
									?>
									<th>
											<a href="javascript:;" onclick=<?php if(!isset($_GET["saved_report"])) { ?>"runSort('<?php echo $columns[$i]; ?>')" <?php } else { ?> "runSaveSort('<?php echo $columns[$i]; ?>','<?php echo $_GET["saved_report"]; ?>')"<?php } ?>>
												<?php echo $coldesc[$i]; ?>
											</a>
										</th>
									<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($count) || $count==0) { ?>
								<tr>
									<td colspan="<?php echo count($coldesc) +1 ?>">
										<div id="Header">
											<div class="no-result" id="top-div">No result found to display</div>
										</div>
									</td>
								</tr>
							<?php } ?>
							<?php foreach($rows as $i => $row_column){ ?>
								<tr class="graph_row"  >
									<td><?=$i +1?></td>
										<?php
										  $source_count = $dummy_count = $details_count = 0;
											$fmt = numfmt_create("en", NumberFormatter::DECIMAL );
											foreach ($columns as $k => $column_name){?>
												<td class="gr-sn-col-<?=$i?>">
												<?php $v1 = $row_column[$column_name];
												if(in_array($extracted["type"][$column_name], ["date", "datetime", "time"]))$date = new DateTime($row_column[$column_name]);
												switch ($extracted["type"][$column_name]) {
													case 'text':
														echo $v1;
													break;
													case 'number':
														echo $fmt->format($v1);
													break;
													case 'select':
														$v = $extracted["source_data"][$column_name];
													  echo isset($v[$v1]) ? $v[$v1] : "-";
													break;
													case 'combo':
														$v = $extracted["source_data"][$column_name];
													  echo isset($v[$v1]) ? $v[$v1] : "-";
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
												</td>
										  <?php }
										?>
								  </td>
							  </tr>
							<?php }
							$rf=array_intersect($columns,$datacol);
							if (!empty($count) && count($rf) !=0) { ?>
							  <tr class="graph_row"  >
									<!-- </td> -->
									<td class="gr-sn-col" style="font-weight:bold">
										<?php for($j=0;$j<count($columns);$j++) { ?>
											<a href="javascript:;">
												<?php
													if(array_search($columns[$j], $datacol) !==false)
														echo number_format(array_sum(${$columns[$j]}),2,".",",");
													else if($j==0)echo "TOTAL"; ?>&nbsp;
												</a>
												<?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?>
											</td>
											<td class="gr-sn-col" style="font-weight:bold">
										<?php } ?>
									<?php  } ?>
								</td>
							</tr>
							<tr class="graph_row"  >
						</td>
						<td class="gr-sn-col" style="font-weight:bold">
							<?php for($j=0;$j<count($columns);$j++) { ?>
								<a href="javascript:;">
									<?php if(array_search($columns[$j],$datacol) !==false)
										echo number_format(array_sum(${$columns[$j]})/count(${$columns[$j]}),2,".",",");
										else if($j==0)echo "AVERAGE"; ?>&nbsp;
									</a>
									<?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?>
								</td>
								<td class="gr-sn-col"  style="font-weight:bold"> <?php } ?> <?php  } ?></td>
							</tr>
						<?php } ?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</body>
</html>
