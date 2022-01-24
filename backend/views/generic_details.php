<?php
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
//Intstantiate the Generic class
global $_color;
$generic 			= new Generic;
$get    			= (object)$_GET;
$uri					= $generic->getURIdata();
$uri->root    = absolute_filepath("{$uri->backend}");
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$params    		= $paramControl->get_params();
$param 				= $params->{$get->pageType};
$formdata			= $paramControl->extract_form($param->form);
$formControl	= new FormControl($uri);
$pageId				= strToFilename($get->pageType);
$param->default_view = empty($param->default_view) ? "list" : $param->default_view;
$param->form->form_view = empty($param->form->form_view) ? "swipe" : $param->form->form_view;
$form_views = ["swipe", "modal", "swipe"];
//Default fixed action buttons on the list view
$default_list_actions = [
	"add" => ["Add new", "new", "green"],
	"refresh" => ["Refresh", "reloadPage", "orange"],
	"delete" => ["Delete from", "_multiDelete", "red"],
];
// Default fixed action buttons on the form view
$default_form_actions = [
	"back" => ["Go Back to", "close"],
	"clear" => ["Refresh", "formReset"],
	"submit" => ["Submit Form", ""],
	"print" => ["Print", "printForm"],
];

if (!empty($get->ajax)) { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?= $param->page_title ?></title>
		<?php $company = $generic->company(); ?>
		<!-- Include default CSS files-->
		<?php require_once("{$uri->root}includes/link_css.php") ?>
		<!-- Include custom CSS files-->
		<?php require_once("{$uri->root}backendProject/link_css.php") ?>
	</head>

	<body>
		<div style="height:2rem;display:block">
			<div class="progress hide">
				<div class="indeterminate"></div>
			</div>
		</div>
	<?php } ?>
	<?php if (!empty($param->form->details)) {
		$class = round(12 / (count($param->form->details) + 1)); ?>
		<div class="house" id="_<?= $pageId ?>" default-view="<?= $param->default_view ?>">
			<div class="row" id="_detail_row" style="display:none">
				<div class="col s12">
					<ul class="tabs" id="_tabed_details">
						<li class="tab col s12 l<?= $class ?>">
							<a class="active" href="#tab-detailx_<?= $pageId ?>">Home</a>
						</li>
						<?php foreach ($param->form->details as $key => $section) : $element = reset($section->section_elements) ?>
							<li class="tab col s12 l<?= $class ?>">
								<a href="#tab-detail<?= "{$key}_{$pageId}" ?>" class="noref" data-source="<?= $element->source ?>" data-component="<?= $element->type ?>">
									<?= $section->section_title ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- Default home tab -->
				<div id="tab-detailx" class="col s12 active">
					<div>
						<?php $formControl->build_form($formdata, "static_elements") ?>
					</div>
					<div class="fixed-action-btn" style="right:5px">
						<a class="btn-floating btn-large red" id="edit_detail">
							<i class="large material-icons">edit</i>
						</a>
						<ul>
							<li>
								<a id="close_detail" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Back to <?= $param->page_title ?>">
									<i class="material-icons">reply</i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Other tabs -->
				<?php foreach ($param->form->details as $key => $section) :
					$element = reset($section->section_elements);
					$primary_key = empty($section->primary_key) ? $param->primary_key : $section->primary_key;
				?>
					<div id="tab-detail<?= $key ?>" class="col s12 generic-tab">
						<div class="top-control row" style="margin:0">
							<div class="input-field col s9 m10 l3 right">
								<input name="search" type="text" size="50" />
								<label for="_searchBox">Search <?= $section->section_title ?></label>
								<img src="icons/search.svg" class="search prefix material-icons tiny" />
							</div>
							<div class="divider col s12"></div>
						</div>
						<input type="hidden" name="<?= $element->column ?>" data-key="<?= $primary_key ?>" value="" class="primary_key">
						<?php $formControl->build_detail_tabs($section, $params->{$element->source}) ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php require_once("{$uri->root}includes/form_container.php") ?>
			<?php require_once("{$uri->root}includes/list_container.php") ?>
		</div>
	<?php	} ?>
	<?php if (!empty($get->ajax)) { ?>
	</body>

	</html>
<?php } ?>