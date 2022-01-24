<?php

$datacol=array();$count=0; $filter_text="";

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
				return implode(" ", array_values($v));
			}, $value);
		}
		$extracted["source_data"][$key]  = $value;
	}
}
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

if(empty($param->retrieve_filter))$icondition=""; else $icondition="and $param->retrieve_filter";
foreach ($columns as $k=>$v)
{
		$realCol[]=$extracted["column"][$v] ." AS ". $v;
		$coldesc[]=$extracted["description"][$v];
		$order[]=$extracted["type"][$v];
}

$colstr=implode(", ",$realCol);
if(empty($param->group_trans)){
	$group_by = $param->primary_key;
}else{
	$group_by = "trans_no";
}
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

// Query
$q="SELECT {$param->primary_key}, $colstr FROM {$param->table} WHERE $dateQuery  $filter_text $icondition GROUP BY {$group_by} ORDER BY {$param->sort}";
$result_rows=[];
$r=$db->query($q) or die($db->error.$q.'is a boy');
while($row=$r->fetch_assoc()){
  $id=$row["{$param->primary_key}"];
	$result_rows[]=$row;
}
$count=count($result_rows);
?>
 <div id="report_display_<?=$post->pageType ?>"><?php //require_once "../report_header.php"; ?>
<div class="graphpanel">
   <?php if(!empty($data) && !empty($graph)) { ?>
  <div class="graph-div" id="addpanel">
       <div class="graph-left" ><div class="graph-text" id="display-div"></div></div>
     <div class="graph-right">
     </div>
    </div> <?php } ?>

</div>
  <div class="clear">
      <table width="100%" cellpadding="0" cellspacing="0" class="highlight capitalize">
	  <thead>
      <tr class="graph-title" id="title-row">
				<th>S/N</th>
        <th> <?php for($j=0;$j<count($coldesc);$j++) { if(!isset($columns[$j]) )continue; $column_name=$columns[$j]; ?>
		<?php if($stitle[$column_name]=='s') { ?>
		<a href="javascript:;" onclick=<?php if(!isset($_GET["saved_report"])) { ?>"runSort('<?php echo $columns[$j]; ?>')" <?php } else { ?> "runSaveSort('<?php echo $columns[$j]; ?>','<?php echo $_GET["saved_report"]; ?>')"<?php } ?>>
			<?php echo $coldesc[$j]; ?></a><?php } if(isset($cbreak[$column_name]) && $cbreak[$column_name]=="k"  && $j<count($coldesc)-1){ ?></th><th> <?php } ?>
<?php } ?></th>
      </tr></thead>
<?php if (!isset($count) || $count==0) { ?>
<tr> <td colspan="<?php echo count($coldesc) +1 ?>"><div id="Header">
  <div class="no-result" id="top-div">No result found to display</div>
</div></td></tr>
<?php } ?>
<tbody>
	<?php foreach($result_rows as $k=> $row){ ?>
     <tr class="" id="<?php echo $row[$param->primary_key] ?>" type="<?php //echo $trans_type[$i] ?>" >
			 <td><?=$k +1?></td>
        <td class="gr-sn-col"><?php  $source_count=0; $dummy_count=0;$details_count=0;
				$fmt = numfmt_create("en", NumberFormatter::DECIMAL );
				foreach ($columns as $k1 => $column_name){
					if(in_array($extracted["type"][$column_name], ["date", "datetime", "time"]))$date = new DateTime($row[$column_name]);
					switch ($extracted["type"][$column_name]) {
						case 'text':
							echo $row[$column_name];
						break;
						case 'number':
							echo $fmt->format($row[$column_name]);
						break;
						case 'select':
						  $v = $extracted["source_data"][$column_name];
							echo isset($v[$row[$column_name]]) ? $v[$row[$column_name]] : "-";
						break;
						case 'combo':
						  $v = $extracted["source_data"][$column_name];
							echo isset($v[$row[$column_name]]) ? $v[$row[$column_name]] : "-";
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
				  if(isset($cbreak[$column_name]) && $cbreak[$column_name]=="k"  ){ ?>
						</td>
						<td class="gr-sn-col">
					<?php } ?>
				<?php  } ?>
				</td>
      </tr>
	  <?php } ?>
		<?php $rf=array_intersect($columns,$datacol); if (!empty($count) && count($rf) !=0) { ?>
	  <tr class="graph_row"  >
       </td><td class="gr-sn-col" style="font-weight:bold"><?php for($j=0;$j<count($columns);$j++) { ?><a href="javascript:;"><?php if(array_search($columns[$j],$datacol) !==false) echo number_format(array_sum(${$columns[$j]}),2,".",","); else if($j==0)echo "TOTAL"; ?>&nbsp;</a><?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?></td><td class="gr-sn-col" style="font-weight:bold"> <?php } ?> <?php  } ?></td></tr>
		<?php } ?>
      </tbody>
    </table>
</div>
</div>
<script language="javascript" type="text/javascript">
	var pageId='_<?=$post->pageType?>';
<?php if(empty($noTrans)) { ?>
	$('#report_display'+pageId +' tr').click(function()
	{
		var ths=$(this);
		var type=$(ths).attr("type");
		var pnt =getTransType(type);
		if(!pnt) return 0;
		loadModule('task/generic_transaction.php?pageType='+pnt[0]+'&ajax=1',pnt[1],function()
		{

			a='_'+pnt[1].replace(' ','_');
			resetForm(a)
			newForm(a);
			loadTransaction(ths,a);
		})

	})
<?php } ?>
</script>
