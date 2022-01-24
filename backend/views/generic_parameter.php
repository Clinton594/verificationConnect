<?php
extract($_GET, EXTR_OVERWRITE);
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
//Intstantiate the Generic class
$generic 			= new Generic;
$uri					= $generic->getURIdata();
$uri->root		= absolute_filepath($uri->backend);
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$param 				= $paramControl->get_params($pageType);
$formdata			= $paramControl->extract_form($param->form);
$formControl	= new FormControl($uri);
$pageId				= strToFilename($pageType);
$get   				= object($_GET);
if (!empty($ajax)) { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?= $param->page_title ?></title>
		<?php require_once("{$uri->root}includes/link_css.php") ?>
		<?php require_once("{$uri->root}backendProject/link_css.php") ?>
	</head>

	<body>
		<div style="height:2rem;display:block">
			<div class="progress hide">
				<div class="indeterminate"></div>
			</div>
		</div>
	<?php } ?>
	<div class="house" id="_<?= $pageId ?>" default-view="form">
		<div class="upload" id="new_form">
			<input class="keep" type="hidden" id="global_page_type" data-pageType="<?= $get->pageType ?>" value="<?= $get->pageType ?>" />
			<input class="keep" type="hidden" id="global_page_title" data-pageType="<?= $param->page_title  ?>" value="<?= $param->page_title  ?>" />
			<form id="formData" href="javascript:;" onSubmit="return(false)" <?php if (!empty($param->form->onload)) { ?>onload="<?= $param->form->onload ?>" <?php } ?> <?php if (!empty($param->form->callback)) { ?>callback="<?= $param->form->callback ?>" <?php } ?> <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> <?php if (!empty($param->receipt_url)) { ?>data-receipt="<?= $param->receipt_url ?>" <?php } ?>>
				<?php $formControl->build_form($formdata) ?>
				<input name="<?= $param->primary_key ?>" id="<?= $param->primary_key ?>" value="1" type="hidden" class="uniqueId keep" />
				<input name="pageType" type="hidden" class="keep" id="page_type" value="<?= $pageType ?>" />
				<input name="page_title" type="hidden" class="keep" id="page_title" value="<?= $param->page_title ?>" />
				<input name="noreset" type="hidden" class="keep" id="noreset" value="1" />
				<div class="flt">
					<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
						<button class="btn-floating btn-large formSave">
							<img src="icons/save.svg" class="large material-icons" />
						</button>
					</div>
				</div>
			</form>
		</div>
		<script language="javascript" type="text/javascript">
			var pageId = '_<?= $pageId ?>';
			formInitialize(pageId, 2, <?= $param->key ?>);
		</script>
	</div>
	<?php if (!empty($ajax)) { ?>
	</body>

	</html>
<?php } ?>