<?php
session_start();
require_once "../controllers/Controllers.php";
require_once "../controllers/FormControl.php";
require_once "../controllers/DateDifference.php";
//Intstantiate the Generic class
$today = date("Y-m-d H:i:s");
$session  =  ADMIN_SESSION();
$generic             = new Auth($session->user_id);
$get                = (object)$_GET;
$uri                    = $generic->getURIdata();
//Pass the generic object into the paramController
$paramControl = new ParamControl($generic);
$params            = $paramControl->get_params();
$admin_signin                 = $params->{'admin_signin'};
$param                 = $params->{$admin_signin->form};
$pageId                = strToFilename($get->pageType);
$user         =    $generic->user();
$formControl = new FormControl($uri);
$formdata = $paramControl->extract_form($param->form);
$activities = $generic->getFromTable("activitylog", "user_id={$session->user_id}", 1, 30, ID_DESC);

?>


<div class="house" id="_<?= $pageId ?>" data-key="<?= $user->primary_key ?>">
  <div class="block-header">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="breadcrumb breadcrumb-style ">
          <li class="breadcrumb-item">
            <h4 class="page-title">Home</h4>
          </li>
          <li class="breadcrumb-item bcrumb-1">
            <a href="#">
              <i class="fa fa-home"></i> <?= $admin_signin->page_title ?></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="m-b-20">
          <div class="contact-grid">
            <div class="profile-header bg-primary">
              <div class="user-name">
                <strong>
                  <?= $user->name_col ?>
                  <?= $user->last_name_col ?>
                </strong>
              </div>
              <div class="name-center"><?= $user->rolename ?></div>
            </div>
            <img src="<?= $user->image_col ?>" class="user-img user-profile" alt="">
            <p>
              <?php if (!empty($user->address)) { ?>
                <strong><?= $user->address ?></strong>
              <?php } ?>
            </p>
            <div class="row">
              <div class="col-4">
                <h5><i class="fas fa-phone"></i></h5>
                <small><?= $user->phone_col ?></small>
              </div>
              <div class="col-4">
                <h5><i class="fas fa-envelope"></i></h5>
                <small><?= $user->email_col ?></small>
              </div>
              <div class="col-4">
                <h5><i class="fas fa-id-badge"></i></h5>
                <small><?= $user->username_col ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="body">
          <p class="text-default">
            <?php if (!empty($user->bio)) { ?>
              <span> <?= $user->bio ?></span>
            <?php } else { ?>
              <strong>CREATE A BIO COLUMN FOR USER</strong>
              <br>
              <br>
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has
              been the industry's standard dummy text ever since the 1500s, when an unknown
              printer
              took a galley of type and scrambled it to make a type specimen book. It has
              survived
              not only five centuries, but also the leap into electronic typesetting, remaining
              essentially
              unchanged.
            <?php }
            ?>
          </p>
          <?php foreach ($admin_signin->display_fields  as $key => $object) {
            if (isset($user->{$object->column})) :
              $colvalue = $user->{$object->column};
              $action = $object->action ?? null;
              $source = $object->source ?? null;
              $value = displayFieldActions($colvalue, $user, $action, $source, $paramControl, $admin_signin); ?>
              <p>
                <small class="text-muted">
                  <?= $object->description ?>:
                </small> <br>
                <b><?= $value ?></b>
              </p>
              <hr>
          <?php endif;
          } ?>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-12">
      <div class="card">
        <ul class="nav nav-tabs">
          <li class="nav-item m-l-10 flex-1">
            <a class="nav-link" data-bs-toggle="tab" href="#edit-profile_<?= $pageId ?>">Edit Details</a>
          </li>
          <li class="nav-item m-l-10 flex-1">
            <a class="nav-link active" data-bs-toggle="tab" href="#my-activities_<?= $pageId ?>">My Activities</a>
          </li>
          <li class="nav-item m-l-10 flex-1">
            <a class="nav-link" data-bs-toggle="tab" href="#change-password_<?= $pageId ?>">Change Password</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane body" id="edit-profile">
            <div id="new_form">
              <input class="keep" type="hidden" id="global_page_type" data-pageType="<?= $get->pageType ?>" value="admin_signin" />
              <input class="keep" type="hidden" id="global_page_title" data-pageType="<?= $param->page_title  ?>" value="<?= $param->page_title  ?>" />

              <form <?php if (!empty($param->form->onload)) { ?>onload="<?= $param->form->onload ?>" <?php } ?> <?php if (!empty($param->form->callback)) { ?>callback="<?= $param->form->callback ?>" <?php } ?> id="formData" href="javascript:;" onSubmit="return(false)" <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> <?php if (!empty($param->receipt_url)) { ?>data-receipt="<?= $param->receipt_url ?>" <?php } ?>>
                <div class="w-100 black-text left">
                  <?php $formControl->build_form($formdata) ?>
                </div>
                <?php if (!isset($param->form->form_submit) || !empty($param->form->form_submit)) : ?>
                  <div class="w-100 left">
                    <div class="d-flex w-25 right justify-content-center">
                      <button class="waves-effect waves-green btn formSave flex-1">SUBMIT</button>
                    </div>
                    <input name="<?= $param->primary_key ?>" type="hidden" id="<?= $param->primary_key ?>" class="uniqueId" />
                    <input name="pageType" class="keep" type="hidden" id="page_type" data-pageType="admin_signin" value="admin_signin" />
                    <input name="page_title" class="keep" type="hidden" id="page_title" value="<?= $param->page_title ?>" />
                  </div>
                <?php endif; ?>
              </form>
            </div>
          </div>
          <div class="tab-pane body active" id="my-activities">
            <ul class="feedBody">
              <?php foreach ($activities as $key => $activity) { ?>
                <li class="active-feed">
                  <div class="feed-user-img">
                    <img src="<?= $user->image_col ?>" class="img-radius user-profile" alt="User-Profile-Image">
                  </div>
                  <h6>
                    <span><?= strtoupper($activity->action) ?></span>
                    <?php $datediff = new DateDifference($activity->{$admin_signin->date_col}, $today) ?>
                  </h6>
                  <p class="m-b-15 m-t-15">
                    <?= $activity->description ?> <i class="mr-5"> <small class="text-muted"><?= $datediff->smart() ?></small> </i>
                  </p>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="tab-pane body active" id="change-password">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="javascript" type="text/javascript">
  var pageId = '_<?= $pageId ?>';
  $(`#${pageId} #access_level`).closest('.card').remove();
  formInitialize(pageId, 2, $(`#${pageId}`).data("key"));
</script>