<?php
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
$_color   = array("green", "red", "blue", "cyan darken-3", "teal darken-4", "orange", "light-green darken-3", "lime darken-1", "pink darken-4", "purple darken-4", "purple accent-4");
shuffle($_color);
//Intstantiate the Generic class
$generic 			= new Generic();
$get    			= (object)$_GET;
$uri					= $generic->getURIdata();
$db					  = $generic->connect();
$is_dashboard = true;
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$params    		= $paramControl->get_params();
$param 				= $params->{$get->pageType};
$formdata			= $paramControl->extract_form($param->form);
$fmt 					= numfmt_create("en", NumberFormatter::DECIMAL);
$formControl	= new FormControl($uri);
$pageId				= strToFilename($get->pageType);
$default_list_actions = [];
$param->default_view = $param->form->form_view = "swipe";

// Display Fields
$display_fields = [];
$extracted = $paramControl->extract_display_fields($param->display_fields);
$extracted = object($extracted);

// Get database values for the display fields, Theseare the colourful cards in the first row of a dashboard
if (!empty($param->display_fields)) {
	$queries = array();
	foreach ($param->display_fields as $key => $value) {
		$filter = empty($value->filter) ? "" : "WHERE $value->filter";
		$value->table = empty($value->table) ? $param->table : $value->table;
		$queries[] = "SELECT {$value->column} AS {$value->name} FROM {$value->table} {$filter}";
		$display_fields[$value->name] = object(["desc" => $value->description, "color" => $_color[$key], "class" => $value->class, "icon" => $value->icon ?? ""]);
	}
	$queries = implode(";", $queries);
	$query = $db->multi_query($queries) or die($db->error);
	if ($query) {
		do {
			if ($result = $db->store_result()) {
				while ($row = $result->fetch_assoc()) {
					$key = array_keys($row);
					$key = reset($key);
					if (!empty($extracted->action->{$key})) $row[$key] = call_user_func_array($extracted->action->{$key}, [$row[$key]]);
					$display_fields[$key]->result = $row[$key];
				}
				$result->free();
			}
		} while ($db->more_results() && $db->next_result());
	}
}
// Charts
//Filter elements with graph type
$elements =	$paramControl->extractFormElements($param->form);
$elements = array_filter($elements, function ($value) {
	return in_array($value->type, ["pie-chart", "line-graph", "bar-graph"]);
});
$chart_data = [];
$colors = ["red", "blue", "green", "violet", "orange", "teal", "orangered", "black", "#880e4f"];
if (count($elements)) {
	foreach ($elements as $key => $value) {
		shuffle($colors);
		$labels = $paramControl->load_data_from_param($value->source);
		$value->table = empty($value->table) ? $param->table : $value->table;
		$value->filter = empty($value->filter) ? "" : "WHERE {$value->filter}";
		// Extract grouping parameter
		$group = explode("group by", strtolower(str_replace("  ", " ", trim($value->filter))));
		if (empty($group[1])) die("{$value->name} must have a grouping data in the filter field to be able to run a graph");
		$groupedby = "k";
		$sql = "SELECT {$value->column} AS {$value->name}, $group[1] AS $groupedby FROM {$value->table} {$value->filter}";
		$query = $db->query($sql) or die($db->error . "($sql)");
		if ($query->num_rows) {
			$collection = [];
			while ($row = $query->fetch_object()) {
				$row->{$groupedby} = empty($labels[$row->{$groupedby}]) ? "Undefined" : $labels[$row->{$groupedby}];
				$collection[] = $row;
			}
			$graphdata = ["labels" => array_column($collection, $groupedby), "datasets" => []];
			$graphdata["datasets"][] = [
				"label" => "",
				"backgroundColor" => array_range($colors, count($collection)),
				"data" => array_column($collection, $value->name),
				// "borderColor "=> array_range($colors, count($collection))
			];
			$chart_data[$value->name] = $graphdata;
		}
	}
}
// see($chart_data);
?>
<div class="house content" id="_<?= $pageId ?>">
	<div class="container-fluid">
		<div class="row" id="open_form">
			<!--Closed inside the list_container-->
			<div id="flash" class="hide"><?= json_encode($chart_data) ?></div>
			<div class="row">
				<?php foreach ($display_fields as $key => $item) { ?>
					<div class="<?= $item->class ?>">
						<div class="counter-box text-center white">
							<div class="text font-17 m-b-5"><?= $item->desc ?></div>
							<h3 class="m-b-10 m-t-0" style="font-size: 1rem;"><?= $item->result ?>
								<i class="material-icons tiny col-<?= $item->color ?>"><?= $item->icon ?></i>
							</h3>
							<div class="icon">
								<i class="material-icons col-<?= $item->color ?>" style="font-size: xx-large;"> <?= $item->icon ?></i>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php if (!empty($formdata)) { ?>
				<!--Build other dashboard widgets-->
				<div class="row">
					<?php $formControl->build_form($formdata, "dashboard_elements") ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php $db->close();  ?>
	<script language="javascript" type="text/javascript">
		var pageId = '_<?= $pageId ?>';
		// Normal Initialize form without loadOpen(display_fields)
		formInitialize(pageId, 1);

		let flash = $("#flash" + pageId).text();
		flash = isJson(flash);
		$("#flash" + pageId).remove();
		if (flash) {
			for (var canvas in flash) {
				if (flash.hasOwnProperty(canvas)) {
					let thiscanvas = $("#" + canvas + pageId);
					let type = thiscanvas.data("type");
					let data = flash[canvas];
					// console.log(data);
					thiscanvas.plotGraph(type, data);
					thiscanvas.css({
						height: thiscanvas.data("height")
					})
				}
			}
		}
	</script>