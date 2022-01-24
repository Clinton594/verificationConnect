<input class="keep" type="hidden" id="global_page_type" data-pageType="<?= $get->pageType ?>" value="<?= $get->pageType ?>" />
<input class="keep" type="hidden" id="global_page_title" data-pageType="<?= $param->page_title  ?>" value="<?= $param->page_title  ?>" />
<!--For modal forms-->
<?php if (isset($param->form->form_view) && $param->form->form_view == "modal") {	?>
	<div class="modal fade" id="new_form" role="dialog" tabindex="-1">
		<div class="modal-dialog <?php if (!empty($param->form->form_size)) { ?> <?= $param->form->form_size ?><?php } ?>" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="form-title" id="form_title"></div>
				</div>
				<form <?php if (!empty($param->form->onload)) { ?>onload="<?= $param->form->onload ?>" <?php } ?> <?php if (!empty($param->form->callback)) { ?>callback="<?= $param->form->callback ?>" <?php } ?> id="formData" href="javascript:;" onSubmit="return(false)" <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> <?php if (!empty($param->receipt_url)) { ?>data-receipt="<?= $param->receipt_url ?>" <?php } ?>>
					<div class="modal-body black-text">
						<?php $formControl->build_form($formdata) ?>
					</div>
					<?php if (!isset($param->form->form_submit) || !empty($param->form->form_submit)) : ?>
						<div class="modal-footer">
							<a class="waves-effect waves-green btn-flat" data-dismiss="modal">CLOSE</a>
							<button class="waves-effect waves-green btn formSave">SUBMIT</button>
							<input name="<?= $param->primary_key ?>" type="hidden" id="<?= $param->primary_key ?>" class="uniqueId" />
							<input name="pageType" class="keep" type="hidden" id="page_type" data-pageType="<?= $get->pageType ?>" value="<?= $get->pageType ?>" />
							<input name="page_title" class="keep" type="hidden" id="page_title" value="<?= $param->page_title ?>" />
							<input name="modal" class="keep" type="hidden" id="modal" value="1" />
							<?php if (isset($param->display_level) && !empty($param->display_level)) { ?>
								<input type="hidden" class="keep" id='_linkInput' name="<?php echo $param->display_level->column ?>" />
							<?php } ?>
						</div>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
<?php } else { ?>
	<!--For Swipe forms-->
	<div class="row" id="new_form" <?php if ($param->default_view == "list") { ?>style="display:none" <?php } ?>>
		<form <?php if (!empty($param->form->onload)) { ?>onload="<?= $param->form->onload ?>" <?php } ?> <?php if (!empty($param->form->callback)) { ?>callback="<?= $param->form->callback ?>" <?php } ?> id="formData" href="javascript:;" onSubmit="return(false)" <?php if (!empty($param->process_url)) { ?>data-action="<?= $param->process_url ?>" <?php } ?> <?php if (!empty($param->receipt_url)) { ?>data-receipt="<?= $param->receipt_url ?>" <?php } ?>>
			<div class="form-header card">
				<div class="form-nav" id="form-nav-prev" data-move="prev">
					<img src="icons/chevron_left_black.svg" class="material-icons small" />
				</div>
				<div class="form-title" id="form_title"></div>
				<div class="form-nav" id="form-nav-next" data-move="next">
					<img src="icons/chevron_right_black.svg" class="material-icons small" />
				</div>
			</div>
			<?php $modal_id = $formControl->build_form($formdata) ?>
			<input name="<?= $param->primary_key ?>" type="hidden" id="<?= $param->primary_key ?>" class="uniqueId" />
			<input name="pageType" class="keep" type="hidden" id="page_type" value="<?= $get->pageType ?>" />
			<input name="page_title" class="keep" type="hidden" id="page_title" value="<?= $param->page_title ?>" />
			<?php if (isset($param->display_level) && !empty($param->display_level)) { ?>
				<input type="hidden" class="keep" id="_linkInput" name="<?= $param->display_level->column ?>" />
			<?php } ?>
			<div class="flt">
				<div data-role="form" class="form-actions" <?php if (isMobile()) { ?>data-mobile="true" <?php } ?>>
					<ul>
						<?php if (!isset($param->form->form_actions) || $param->form->form_actions !== false) {
							$fixed_form_keys = array_keys($default_form_actions);
							// Activate the default print in a form only when it is added in form_actions of the param
							$form_keys_build = empty($param->form->form_actions) ? array_slice($fixed_form_keys, 0, -1) : $param->form->form_actions;
						?>
							<?php foreach ($form_keys_build as $key => $value) {
								// for fixed form actions
								if (in_array($value, $fixed_form_keys)) {
									if ($value == "submit") {
										if (!isset($param->form->form_submit) || !empty($param->form->form_submit)) { ?>
											<li>
												<button class="formSave btn btn-small btn-flat" type="submit" title="<?= $default_form_actions[$value][0] ?>">
													Submit <i class="fa fa-arrow-circle-right"></i>
												</button>
											</li>
										<?php }
									} else { ?>
										<li>
											<a data-axx="<?= $value ?>" style="display:block" title="<?= $default_form_actions[$value][0] ?>" id="<?= $default_form_actions[$value][1] ?>">
												<img src="icons/<?= $value ?>.svg" class="material-icons tiny" />
											</a>
										</li>
									<?php } ?>
								<?php } else {
									$thisparam = $params->{$value}; ?>
									<li>
										<!-- Has to have pageid added to the href bcos the modal id would auto get a page appended to it -->
										<a onclick="<?= $thisparam->onclick ?>" style="display:block" title="<?= $thisparam->page_title ?>">
											<img src="icons/<?= $thisparam->icon ?>.svg" class="material-icons tiny" />
										</a>
									</li>
								<?php } ?>
						<?php }
						} ?>
					</ul>
				</div>
			</div>
		</form>
	</div>
<?php } ?>
<!--List page-->
<script language="javascript" type="text/javascript">
	var pageId = '_<?= $pageId ?>';
	formInitialize(pageId);
</script>