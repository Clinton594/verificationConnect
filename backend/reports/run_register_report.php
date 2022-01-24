<?php //die("here");
$datacol=array();$count=0; $filter_text=""; $dir="";$_total=0;
$extra["col"]=array("_debit","_credit","_bal"); $text=array();$prev=array(); $itext='';$iprev='';

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
		if (!empty($filter_text)) $filter_text = "and {$filter_text}";
		// Date Query
		if(!empty($selectDate))		{
			$dateQuery=getDateQuery($selectDate,$datecol);
			if(empty($dateQuery)) $dateQuery="{$param->primary_key} like '%%'";
		} else  $dateQuery="{$param->primary_key} like '%%'"	;


		// check if param fields exists
		if(empty($extracted["column"]))		{
			$msg="No column selected. Please select column to display report";
			die($msg);
		}

		//
		$xparam=explode("|",$post->cols);
		for($i=0;$i<count($xparam);$i++)
		{
			$sparam=explode(",",$xparam[$i]);
			$column_name=trim($sparam[0]);
			$columns[$i]=	$column_name;
			if(isset($sparam[4]))$stitle[$column_name]=trim($sparam[4]);
			if(isset($sparam[5]))$cbreak[$column_name]=trim($sparam[5]); else $cbreak[$column_name] = "k";
		}

		if(empty($param->retrieve_filter))$icondition=""; else $icondition="and $param->retrieve_filter";
		foreach ($columns as $k=>$v)
		{
				$realCol[]=$extracted["column"][$v] ." AS ". $v;
				$coldesc[]=$extracted["description"][$v];
				$order[]=$extracted["type"][$v];
				// $extra["coldesc"][$k] = $extracted["description"][$v];
		}

		if(!empty($combine))
		{
			foreach ($combine as $k => $v)
			{
					if($dcombine !="") $dcombine .=",";
					$dcombine .="$v";
			}
		}
		if(!empty($itext)) $itext =" and $itext";
		if(!empty($iprev)) $iprev =" and $iprev";
		$colstr=implode(",",$realCol);

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
		$form_action = $param->report_setup->action_col;
		$q="select sum({$form_action}) from {$param->table} where $dateQuery $filter_text $icondition $iprev order by $param->sort";
		$r=$db->query($q) or die($db->error.$q);
		list($obal)=$r->fetch_row();
		$trans='trans_type'; $_total= $obal;
		$q="select {$param->primary_key}, $trans, $colstr, {$form_action} from {$param->table} where $dateQuery $filter_text $icondition $itext group by {$param->primary_key} order by {$param->sort}";
		//see($q);
		$r=$db->query($q) or die($db->error.$q);
		while($row=$r->fetch_assoc())
		{
			  $id[$count]=$row["{$param->primary_key}"];
			  $trans_type[$count]=$row["$trans"];
			  for($i=0;$i<count($columns);$i++)
			  {
				  ${$columns[$i]}[]=$row["{$columns[$i]}"];
			  }
			  if(isset($row["{$form_action}"]))
			  {
				  if($row["{$form_action}"] < 0) $row[$extra["col"][0]]=abs($row["{$form_action}"]); else $row[$extra["col"][0]]="";
				  if($row["{$form_action}"] >= 0) $row[$extra["col"][1]]=$row["{$form_action}"]; else $row[$extra["col"][0]]="";
				  $_total +=$row["{$form_action}"];
				  $row[$extra["col"][2]]= $_total;
			  }
			  $result_rows[]=$row;
		}
		$columns=array_merge($columns,$extra["col"]);
		$order=array_merge($order,array('n','n','n'));
		$cbreak=array_merge($cbreak,array('k','k','k'));
?>
<div>
<div class="graphpanel">
   <?php if(!empty($data) && !empty($graph)) { ?>
  <div class="graph-div" id="addpanel">
       <div class="graph-left" ><div class="graph-text" id="display-div"></div></div>
     <div class="graph-right">
     </div>
    </div> <?php } ?>

</div>
  <div class="clear">
      <table width="100%" cellpadding="0" cellspacing="0" class="striped bordered highlight capitalize">
	  <thead>
      <tr class="graph-title" id="title-row">
        <th> <?php for($j=0;$j<count($coldesc);$j++) { if(!isset($columns[$j]))continue;?>
		<a href="javascript:;" onclick=<?php if(!isset($_GET["saved_report"])) { ?>"runSort('<?php echo $columns[$j]; ?>')" <?php } else { ?> "runSaveSort('<?php echo $columns[$j]; ?>','<?php echo $_GET["saved_report"]; ?>')"<?php } ?>><?php echo $coldesc[$j]; ?></a><?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?></th><th> <?php } ?>
<?php } ?></th>
      </tr></thead>
	  <tbody>
	  <tr>
      	<td colspan="<?php echo count($columns)-1 ?>" align="center">OPENING BALANCE</td><td><?php echo number_format($obal,2,".",",")?></td>

      </tr>
<?php if (!isset($count) || $count==0) { ?>
<tr> <td colspan="<?php echo count($coldesc) +1 ?>"><div id="Header">
  <div class="no-result" id="top-div">No result found to display</div>
</div></td></tr>
<?php } else { ?>


	<?php foreach($result_rows as $k=> $row){ ?>

		<tr class="hoverable graph_row" id="<?php echo $id[$i] ?>" type="<?php echo $trans_type[$i] ?>">
			<td class="gr-sn-col">
				<?php $source_count=0; $dummy_count=0;$details_count=0;
				foreach($columns as $k1 => $column_name) {
					if(!isset($columns[$k1]))continue;
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
					}?>
					<?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?>
				</td>
				<td class="gr-sn-col">
				<?php } ?>
			<?php  } ?>
		</td>
	</tr>
<?php } ?>
<?php $rf=array_intersect($columns,$datacol);
if (!empty($count) && count($rf) !=0) { ?>
							<tr class="graph_row"  >
								<td class="gr-sn-coltiny"></td><?php for($j=0;$j<count($columns);$j++) { ?><td class="gr-sn-col" style="font-weight:bold"><a href="javascript:;"><?php if(array_search($columns[$j],$datacol) !==false) echo number_format(array_sum(${$columns[$j]}),2,".",","); else if($j==0)echo "TOTAL"; ?>&nbsp;</a></td> <?php } ?></tr>
									<tr class="graph_row"  >
										<td class="gr-sn-coltiny"></td><?php for($j=0;$j<count($columns);$j++) { ?><td class="gr-sn-col"  style="font-weight:bold"><a href="javascript:;"><?php if(array_search($columns[$j],$datacol) !==false) echo number_format(array_sum(${$columns[$j]})/count(${$columns[$j]}),2,".",","); else if($j==0)echo "AVERAGE"; ?>&nbsp;</a></td> <?php } ?></tr><?php } ?>


											<tr>
												<td colspan="<?php echo count($columns)-1 ?>" align="center">CURRENT BALANCE</td><td class="bold"><h4><?php echo number_format($_total ,2,".",",")?></h4></td>

											</tr>
										</tbody>  <?php } ?>
									</table>
								</div>
							</div>
<script language="javascript" type="text/javascript">
	var pageId='_<?php echo str_replace(' ','_',$page_title) ?>';

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
