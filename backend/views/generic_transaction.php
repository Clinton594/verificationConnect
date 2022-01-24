<?php
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
//Intstantiate the Generic class
$generic       = new Generic;
$get          = (object)$_GET;
$uri          = $generic->getURIdata();
$uri->root    = absolute_filepath("{$uri->backend}");
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$params        = $paramControl->get_params();
$param         = $params->{$get->pageType};
$formdata      = $paramControl->extract_form($param->form);
$formControl  = new FormControl($uri);
$pageId        = strToFilename($get->pageType);;
$form_views = ["swipe", "modal"];
$default_list_actions = [
  "add" => ["Add new", "new", "green"],
  "refresh" => ["Refresh", "reloadPage", "orange"],
  "delete" => ["Delete from", "_multiDelete", "red"],
  "void" => ["Void", "_void", "grey"],
];
$default_form_actions = [
  "back" => ["Go Back to", "close"],
  "clear" => ["Refresh", "formReset"],
  "submit" => ["Submit Form", ""],
  "print" => ["Print", "printForm"]
];
$param->default_view = empty($param->default_view) ? "list" : $param->default_view;
$param->form->form_view = empty($param->form->form_view) ? "swipe" : $param->form->form_view;
global $_color;
?>
<?php if (!empty($get->ajax)) { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?= $param->page_title ?></title>
    <?php $company = $generic->company(); ?>
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
  <div class="house" id="_<?= $pageId ?>">
    <?php require_once("{$uri->root}includes/list_container.php") ?>
    <?php if (isset($param->form->form_view) && $param->form->form_view == "modal") {  ?>
      <div class="modal modal-fixed-footer" id="new_form">
        <form <?php if (!empty($param->form->onload)) { ?>onload="<?= $param->form->onload ?>" <?php } ?> <?php if (!empty($param->form->callback)) { ?>callback="<?= $param->form->callback ?>" <?php } ?> id="formData" href="javascript:;" onSubmit="return(false)" <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> <?php if (!empty($param->receipt_url)) { ?>data-receipt="<?= $param->receipt_url ?>" <?php } ?>>
          <div class="form-header">
            <div class="form-title" id="form_title"></div>
          </div>
          <div class="modal-content black-text">
            <?php $formControl->build_form($formdata) ?>
          </div>
          <div class="modal-footer">
            <a class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
            <button class="waves-effect waves-green btn formSave">SUBMIT</button>
          </div>
          <input name="<?= $param->primary_key ?>" type="hidden" id="<?= $param->primary_key ?>" class="uniqueId" />
          <input name="pageType" class="keep" type="hidden" id="page_type" value="<?= $get->pageType ?>" />
          <input name="page_title" class="keep" type="hidden" id="page_title" value="<?= $param->page_title ?>" />
          <input name="modal" class="keep" type="hidden" id="modal" value="1" />
          <?php if (isset($param->display_level) && !empty($param->display_level)) { ?>
            <input type="hidden" class="keep" id='_linkInput' name="<?php echo $param->display_level->column ?>" />
          <?php } ?>
        </form>
      </div>
    <?php } else { ?>
      <div class="row" id="new_form" style="display:none">
        <!-- The Main form -->
        <div class="col-s12">
          <form <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> id="formData" action="javascript:;" onsubmit="return(false)">
            <div class="form-values">
              <?php if (!empty($param->form_values)) {
                foreach ($param->form_values as $key => $value) { ?>
                  <input type="hidden" class="keep" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>" />
              <?php }
              } ?>
              <input type="hidden" class="keep" id="page_type" name="pageType" value="<?= $get->pageType ?>" />
              <input type="hidden" class="keep" id="page_title" name="page_title" value="<?= $param->page_title ?>" />
              <input type="hidden" name="<?= $param->primary_key ?>" id="<?= $param->primary_key ?>" value="" />
            </div>
            <?php
            $formControl->build_form($formdata);
            ?>
            <!-- Form Actions -->
            <div class="flt">
              <div id="fab" class="fixed-action-btn" style="right:0;" <?php if (isMobile()) { ?>data-mobile="true" <?php } ?>>
                <button type="submit" data-position="left" data-delay="50" data-tooltip="Print" class="tooltipped btn-floating btn-large red" id="formPrint">
                  <i class="large material-icons"><img src="icons/print.svg" /></i>
                </button>
                <ul>
                  <li>
                    <a data-position="left" data-delay="50" data-tooltip="Back" class="tooltipped btn-floating blue" id="close">
                      <i class="material-icons"><img src="icons/reply.svg" /></i>
                    </a>
                  </li>
                  <li>
                    <a data-position="left" data-delay="50" data-tooltip="Reset Form" class="tooltipped btn-floating green" id="formReset"><i class="material-icons"><img src="icons/clear.svg" /></i></a>
                  </li>
                  <li>
                    <button data-position="left" data-delay="50" data-tooltip="Save" class="tooltipped btn-floating pink formSave">
                      <i class="material-icons"><img src="icons/save.svg" /></i>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
  <script language="javascript" type="text/javascript">
    var pageId = '_<?= $pageId ?>';
    formInitialize(pageId);
    transInitialize(pageId);
    if ($("#formData" + pageId).find("#trans_no" + pageId).length == 0) {
      $("#formData" + pageId).append($("<input>").attr({
        name: "trans_no",
        id: "trans_no" + pageId,
        type: "hidden",
        "data-pageid": pageId
      }))
    }
  </script>
  <?php if (!empty($get->ajax)) { ?>
  </body>

  </html>
<?php } ?>