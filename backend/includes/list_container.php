<?php
if (empty($is_dashboard)) { ?>
	<div class="open_diplay_box" id="open_form" <?php if ($param->default_view == "form") { ?>style="display:none" <?php } ?>>
		<?php require("list_component.php") ?>
	<?php } ?>

	<!-- Build Modals for external Actions -->
	<?php if (!isset($param->listFAB) || $param->listFAB !== false) :
		foreach ($build as $k => $v) :
			if (!empty($params->{$v})) :
				$submitype = 0;
				$thisparam = $params->{$v};
				$thisparam->pageType = $v;
				$thisparam->submit_type = isset($thisparam->submit_type) ? $thisparam->submit_type : 0;
	?>
				<div class="modal fade" id='<?= strToFilename("{$param->page_title} {$thisparam->page_title}") ?>' role="dialog">
					<div class="modal-dialog <?php if (!empty($thisparam->form->form_size)) { ?> <?= $thisparam->form->form_size ?><?php } ?>" role="document">
						<div class="modal-content">
							<?php if (!empty($thisparam->report_setup)) :
								// Method to build report setup modal if report_setup key exists in the action param
								$formControl->build_report_modal($thisparam, $param);
							elseif (!empty($thisparam->form)) :
								// Method to build action action if form exists in the action param
								$formControl->build_action_modal($thisparam, $param);
							endif; ?>
						</div>
					</div>
				</div>
	<?php endif;
		endforeach;
	endif; ?>
	<!-- Build Modals for Extensions -->
	<?php if (!empty($param->extension)) {
		foreach ($param->extension as $k => $ext_param_name) {
			if (!empty($params->{$ext_param_name})) {
				$extension 	= $params->{$ext_param_name};
				$tep_id 		= strToFilename("newextform{$k} {$ext_param_name}");
				// Form must exist because that's where you define the form_view
				$ext_form 	= $paramControl->extract_form($extension->form);
				$extension->form->form_view = empty($extension->form->form_view) ? "swipe" : $extension->form->form_view; ?>
				<?php //if(in_array($extension->form->form_view, $form_views)){ (Dont't even create the forms if it's a custom  form_view)
				if (!empty($extension->form)) { //(Create the forms even if it's a custom form_view, but only when it has form elements)
					if ($extension->form->form_view == "modal") { ?>
						<div class="modal fade" id="<?= $tep_id ?>" role="dialog">
							<div class="modal-dialog <?php if (!empty($extension->form->form_size)) { ?> <?= $extension->form->form_size ?><?php } ?>" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<div class="form-title" id="form_title"></div>
									</div>
									<div class="modal-body">
										<form <?php if (!empty($extension->process_url)) { ?>data-action="<?= $extension->process_url ?>" <?php } ?> <?php if (!empty($extension->form->callback)) { ?>callback="<?= $extension->form->callback ?>" <?php } ?> <?php if (!empty($extension->form->onload)) { ?>onload="<?= $extension->form->onload ?>" <?php } ?> id="extForm<?= $tep_id ?>" action="javascript:;">
											<?php $formControl->build_form($ext_form) ?>
											<div class="modal-footer">
												<input type="hidden" name="pageType" value="<?= $ext_param_name ?>" class="keep">
												<input type="hidden" name="<?= $extension->primary_key ?>" class="uniqueId" id="<?= $extension->primary_key ?>">
												<button type="submit" class="btn btn-primary formSave">SUBMIT</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
	<?php }
			}
		}
	} ?>
	</div>

	<!-- Build Swipe and Report for Extensions -->
	<?php if (!empty($param->extension)) {
		foreach ($param->extension as $k => $ext_param_name) {
			if (!empty($params->{$ext_param_name})) {
				$extension 	= $params->{$ext_param_name};
				$tep_id 		= strToFilename("newextform{$k} {$ext_param_name}");
				$ext_form 	= $paramControl->extract_form($extension->form);
				$extension->form->form_view = empty($extension->form->form_view) ? "swipe" : $extension->form->form_view; ?>
				<?php if (!empty($extension->form)) {
					//(Create the forms even if it's a custom form_view, but only when it has form elements)
					if ($extension->form->form_view == "extension") { ?>
						<div data-pageType="<?= $ext_param_name ?>" id="<?= $tep_id ?>" style="display:none" class="extension-list" data-action="<?= $uri->backend ?>report" data-extensionid="_<?= strToFilename($ext_param_name) ?>" <?php if (!empty($extension->filter_col)) { ?>data-filter_col="<?= $extension->filter_col ?>" <?php } ?>>
							<?php require("list_component.php") ?>
							<input type="hidden" name="<?= $extension->filter_col ?>" class="filter_col filterList" id="filter_col" class="keep">
							<input type="hidden" name="pageType" class="pageType filterList" id="pageType" class="keep" value="<?= $ext_param_name ?>">
							<div id="fab" class="fixed-action-btn" <?php if (isMobile()) { ?>data-mobile="true" <?php } ?> style="right:5px">
								<a id="return" class="btn-floating btn-large tooltipped" onclick="close_extension_view(this)" style="padding: 8px;" data-position="left" data-delay="50" data-tooltip="Back to <?= $param->page_title ?>">
									<img class="material-icons" src="icons/reply.svg">
								</a>
							</div>
						</div>
					<?php } elseif ($extension->form->form_view == "swipe") { ?>
						<div id="<?= $tep_id ?>" style="display:none">
							<form <?php if (!empty($extension->process_url)) { ?>data-action="<?= $extension->process_url ?>" <?php } ?> <?php if (!empty($extension->form->callback)) { ?>callback="<?= $extension->form->callback ?>" <?php } ?> <?php if (!empty($extension->form->onload)) { ?>onload="<?= $extension->form->onload ?>" <?php } ?> id="extForm<?= $tep_id ?>" action="javascript:;">
								<?php $formControl->build_form($ext_form) ?>
								<div class="flt">
									<div id="fab" class="fixed-action-btn" style="bottom: 45px; right: 5px;">
										<button <?php if (isset($_id)) { ?> data-modal="<?= $_id ?>" <?php } ?> class="btn-floating btn-large red formSave" href="#extForm<?= $tep_id ?>">
											<img src="icons/save.svg" class="large material-icons">
										</button>
										<ul>
											<li><a data-position="left" data-delay="50" data-tooltip="Close Window" class="tooltipped btn-floating blue" id="close_ext"> <img src="icons/reply.svg" class="material-icons"></a></li>
											<li><a data-position="left" data-delay="50" data-tooltip="Reset" class="tooltipped btn-floating green" id="formReset_ext"> <img src="icons/clear.svg" class="material-icons" /></a></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					<?php } ?>
	<?php }
			}
		}
	} ?>

	<!-- Report View container -->
	<?php if (!isset($param->listFAB) || $param->listFAB !== false) :
		foreach ($build as $k => $v) :
			if (!empty($params->{$v})) :
				$thisparam = $params->{$v};
				$thisparam->submit_type = isset($thisparam->submit_type) ? $thisparam->submit_type : 0;
	?>
				<?php if (!empty($thisparam->report_setup)) : ?>
					<div class="row" id="display_report" style="display:none;">
						<div class="" id="showreport"></div>
						<div class="fixed-action-btn" style="right:5px">
							<a class="btn-floating btn-large red">
								<i class="large material-icons">print</i>
							</a>
							<ul>
								<li>
									<a id="close_report" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Back to <?= $param->page_title ?>">
										<i class="material-icons">reply</i>
									</a>
								</li>
								<li>
									<a class="btn-floating green darken-1 modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Mail <?= $thisparam->page_title ?>">
										<i class="material-icons">email</i>
									</a>
								</li>
								<li>
									<a href='#<?= strToFilename("{$param->page_title} {$thisparam->page_title} {$pageId}") ?>' data-position="left" data-delay="50" data-tooltip="Open <?= $thisparam->page_title ?>" class="tooltipped btn-floating orange modal-trigger" onclick="close_report('_<?= $pageId ?>')">
										<i class="material-icons">bubble_chart</i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				<?php endif; ?>
	<?php endif;
		endforeach;
	endif; ?>