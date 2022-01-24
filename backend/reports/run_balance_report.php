<?php

$datacol=array();$count=0; $filter_text=""; $dir="";$_total=0;

$extra["col"]=array("_debit","_credit","_bal");



		if(isset($idatacol))

		{

			$datacol=explode("|",$idatacol);

		}

		if(isset($idatacol_label))

		{

			$datacol_label=explode("|",   );

		}

		if(isset($idatacol_prefix))

		{

			$datacol_prefix=explode("|",$idatacol_prefix);

		}

		if(isset($combine) && isset($filter))

		{ 

			$icombine=$combine;

			$combine=explode("|",$icombine);

		}

		if(!empty($selectDate))

		{

			$dateQuery=getDateQuery($selectDate,$datecol);

			if(empty($dateQuery)) $dateQuery="$idcol like '%%'";} else  $dateQuery="$idcol like '%%'"	;

		if(trim($_form)=="")

		{



			$msg="No column selected. Please select column to display report";

			die($msg);



		}

		$xparam=explode("|",$_form);

		for($i=0;$i<count($xparam);$i++)

		{

			$sparam=superExplode(",",$xparam[$i]);

			$columns[$i]=trim($sparam[0]);

			if(isset($sparam[4]))$stitle[$i]=trim($sparam[4]);

			if(isset($sparam[5]))$cbreak[$i]=trim($sparam[5]);

		}



		if(empty($condition))$icondition=""; else $icondition="and $condition";

		foreach ($columns as $k=>$v)

		{

				$realCol[]=$dimR[$v] ." as ". $v;

				$coldesc[]=$dimD[$v];

				$order[]=$dimO[$v];

		}



		if(isset($filter))

		{

			$filter_text=" and $filter='$reportId'";

		}

		if(isset($combine))

		{

			foreach ($combine as $k => $v)

			{

					if($dcombine !="") $dcombine .=",";

					$dcombine .="$v";

			}

		}

		$dcf="";

		$colstr=implode(",",$realCol);
		$trans='trans_type';
		$q="select $idcol,$trans,$colstr,$form_debit,$form_credit from $t where $dateQuery $dcf $filter_text $icondition group by $idcol order by $form_sort_col $dir";

		//die($q);

		$r=$db->query($q) or die($db->error.$q.'is a boy');

		while($row=$r->fetch_assoc())

		{





			  $id[$count]=$row["$idcol"];
				$trans_type[$count]=$row["$trans"];
			  for($i=0;$i<count($columns);$i++)

			  {

				  ${$columns[$i]}[]=$row["{$columns[$i]}"];

			  }

			  if(isset($row["{$form_debit}"]))

			  {

				  ${$extra["col"][0]}[]=$row["{$form_debit}"];

				  $_total -=$row["{$form_debit}"];



			  } else ${$extra["col"][0]}[]="";

			  if(isset($row["{$form_credit}"]))

			  {

				  ${$extra["col"][1]}[]=$row["{$form_credit}"];

				  $_total +=$row["{$form_credit}"];



			  }else ${$extra["col"][1]}[]="";

			  ${$extra["col"][2]}[]= $sign * $_total;

			  $count++;

		}

		$coldesc=array_merge($coldesc,$extra["coldesc"]);

		$columns=array_merge($columns,$extra["col"]);

		$order=array_merge($order,array('n','n','n'));

		$cbreak=array_merge($cbreak,array('k','k','k'));



?>

 <div id="report_display_<?php echo str_replace(' ','_',$page_title) ?>"><?php require_once "../report_header.php"; ?>

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

<?php if (!isset($count) || $count==0) { ?>

<tr> <td colspan="<?php echo count($coldesc) +1 ?>"><div id="Header">

  <div class="no-result" id="top-div">No result found to display</div>

</div></td></tr>

<?php } ?>

<tbody>

	<?php for($i=0;$i<$count;$i++){ ?>

     <tr class="hoverable graph_row" id="<?php echo $id[$i] ?>" type="<?php echo $trans_type[$i] ?>" >



        <td class="gr-sn-col"><?php $source_count=0; $dummy_count=0;$details_count=0; for($j=0;$j<count($coldesc);$j++) { if(!isset($columns[$j]))continue; if($order[$j]=="a") {?>

 	   <a href="javascript:;" ><?php  if( array_search($columns[$j],$datacol) !==false){echo number_format(${$columns[$j]}[$i],2,".",",") ;} else echo ${$columns[$j]}[$i];  ?></a><?php } else if($order[$j]=="n") {?>

 	   <a href="javascript:;" ><?php   echo number_format(${$columns[$j]}[$i],2,'.',','); ?></a><?php } else if($order[$j]=="s") { ?>

<a href="javascript:;" >  <?php  echo $func[$source_count](${$columns[$j]}[$i]); ?>

</a> <?php $source_count++;}  else if($order[$j]=="d") { ?>

<a href="javascript:;" >  <?php  echo $dummy[$dummy_count]; ?>

</a> <?php $dummy_count++;} else if($order[$j]=="i") {?>

 	   <a href="javascript:;"  onClick="parent.changeParentDiv(this)"><?php   echo ${$columns[$j]}[$i]; ?></a><?php  $details_count++;}?><?php if(isset($cbreak[$j]) && $cbreak[$j]=="k"  && $j<count($coldesc)-1){ ?></td><td class="gr-sn-col"> <?php } ?> <?php  } ?></td>

      </tr>

	  <?php } ?><?php $rf=array_intersect($columns,$datacol); if (!empty($count) && count($rf) !=0) { ?>

	  <tr class="graph_row"  >

        <td class="gr-sn-coltiny"></td><?php for($j=0;$j<count($columns);$j++) { ?><td class="gr-sn-col" style="font-weight:bold"><a href="javascript:;"><?php if(array_search($columns[$j],$datacol) !==false) echo number_format(array_sum(${$columns[$j]}),2,".",","); else if($j==0)echo "TOTAL"; ?>&nbsp;</a></td> <?php } ?></tr>

		<tr class="graph_row"  >

        <td class="gr-sn-coltiny"></td><?php for($j=0;$j<count($columns);$j++) { ?><td class="gr-sn-col"  style="font-weight:bold"><a href="javascript:;"><?php if(array_search($columns[$j],$datacol) !==false) echo number_format(array_sum(${$columns[$j]})/count(${$columns[$j]}),2,".",","); else if($j==0)echo "AVERAGE"; ?>&nbsp;</a></td> <?php } ?></tr><?php } ?>

     <tr>

      	<td colspan="<?php echo count($columns) ?>" align="center"></td>



      </tr> </tbody>

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
