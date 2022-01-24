<?php
class FormControl
{
	static $uri;
	static $paramControl;

	public function __construct($uri)
	{
		global $paramControl;
		$this::$uri = $uri;
		$this::$paramControl = $paramControl;
	}

	public function build_form($vt, $elements = "form_elements", $param = null)
	{
		extract($vt);
		$modal_id = null;
		if (!empty($coldesc)) {
			foreach ($coldesc as $_k0 => $v0) { ?>
				<div class="page">
					<?php foreach ($v0 as $_k => $v) {
						if ($_k == 'modal') {
							$mod_launch = 1;
							$modal_id = 'mod' . rand();
						} ?>
						<div <?php if ($_k == 'modal') echo 'class="modal" id="' . $modal_id . '"';
									else echo 'class="' . trim(explode(' ', $_k)[0]) . 'desc"' ?>>
							<?php foreach ($v as $_k1 => $v1) { ?>
								<div class="row ">
									<div class="col s12">
										<!-- <div class="card hoverable" <?php if ($elements == "dashboard_elements") { ?> style="max-height:400px; overflow-y:auto !important;"<?php } ?>> -->
										<div class="card hoverable">
											<div class="card-content">
												<?php if (!empty($_k1)) { ?>
													<div class="card-title">
														<h6><?= $_k1; ?></h6>
													</div>
												<?php } ?>
												<?php
												if ($elements == "form_elements") $this->create_elements($vt, $_k0, $_k, $_k1, "", $param);
												else if ($elements == "dashboard_elements") $this->create_dashboard_elements($vt, $_k0, $_k, $_k1);
												else if ($elements == "static_elements") $this->create_static_elements($vt, $_k0, $_k, $_k1);
												?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?><?php if ($_k == 'modal') { ?>
								<div class="modal-footer">
									<a class="modal-action blue btn formSave">Submit</a>
									<a class="modal-action modal-close btn-flat ">Back</a>
								</div> <?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php }
		}
		return $modal_id;
	}

	public function create_elements($vt, $_k0, $_k, $_k1, $ex = '', $param = null)
	{
		if (empty($param)) global $param;
		extract($vt);
		$v1 = $coldesc[$_k0][$_k][$_k1];
		foreach ($v1 as $_k2 => $desc) {
			$source 	= $src[$_k0][$_k][$_k1][$_k2];
			$class 		= $cls[$_k0][$_k][$_k1][$_k2];
			$multi  	= $mult[$_k0][$_k][$_k1][$_k2];
			$Empty 		= $empty[$_k0][$_k][$_k1][$_k2];
			$Event 		= $event[$_k0][$_k][$_k1][$_k2];
			$Value 		= $value[$_k0][$_k][$_k1][$_k2];
			$Disabled = $disabled[$_k0][$_k][$_k1][$_k2];
			$Readonly = $readonly[$_k0][$_k][$_k1][$_k2];
			$Required = $required[$_k0][$_k][$_k1][$_k2];
			$plh 			= $placeholder[$_k0][$_k][$_k1][$_k2];
			$type 		= strtolower($order[$_k0][$_k][$_k1][$_k2]);
			$name 		= strtolower($columns[$_k0][$_k][$_k1][$_k2]);
			// This particular "keep" class is for Select and combo elements and they would be excluded from auto reloads
			$keep     = (stripos($class, "keep") === false) ? "" : "keep";
			$class    = str_replace("keep", "", $class);

			if (
				$type == "text" || $type == "url" || $type == "tel" || $type == "password" || $type == "date" || $type == "email" || $type == "number" || $type == "hidden" || $type == "button" || $type == "combo" || $type == "textarea" || $type == "time" ||
				$type == "richtext-title"
			) { ?>
				<div class="input-field <?= $class; ?>">
					<?php if ($type == "textarea" || $type == "button") { ?><<?= $type ?> <?php } else { ?> <input <?php } ?> <?php if ($Disabled == true) { ?> disabled="disabled" <?php } ?> <?php if ($Readonly == true) { ?>readonly="readonly" <?php } ?> <?php if (!empty($Event)) { ?> <?= $Event["type"] ?>="<?= $Event["function"] ?>" <?php } ?> <?php if ($multi != true) { ?> browser-default <?php } ?> <?php if ($Required == true) { ?>required="required" <?php } ?> <?php if ($type == 'number') { ?>step="any" <?php } ?> <?php if ($type == 'combo') { ?> display_fields="<?= $multi ?>" insert_field="<?= $Value ?>" <?php } ?> <?php if ($type != 'combo') { ?>value="<?= $Value ?>" <?php } ?> <?php if ($type != 'combo' && strlen($Value)) { ?>data-keep="<?= $Value ?>" <?php } ?> data-source="<?= $source ?>" name="<?= $name . $ex; ?>" id="<?= $name . $ex; ?>" type="<?= $type ?>" class="filled-in browser-default <?= "{$type} {$name} {$keep}" ?>
						<?php if (strlen($Value) && $type !== 'combo') { ?>keep<?php } ?>" <?php if (!empty($ex)) { ?>data-class="<?= $name; ?>" <?php } ?> <?php if (!empty($plh)) { ?>placeholder="<?php if ($Required == true) { ?>*<?php } ?><?= $desc ?>" <?php } ?>>
							<?php if ($type == "button") { ?><?= $Value ?><?php } ?>
							<?php if ($type == "textarea" || $type == "button") { ?></<?= $type ?>> <?php } else { ?> </input> <?php } ?>
					<?php if (empty($plh) && $type !== "button") { ?>
						<label class="active" for="<?= $name; ?>"><?php if ($Required == true) { ?>*<?php } ?><?= $desc; ?></label>
					<?php } ?>
				</div>
			<?php } else if ($type == "checkbox") { ?>
				<div class="input-field <?= $class ?>">
					<div class="checkbox-container">
						<label>
							<input class="filled-in" type="checkbox" id="<?= $name . $ex; ?>" data-source="<?= $source ?>" name="<?= $name . $ex; ?>" />
							<span><?= $desc; ?></span>
						</label>
					</div>
				</div>
			<?php } else if ($type == "radio") { ?>
				<div class="input-field <?= $class ?>">
					<div class="left" style="height:auto">
						<?php
						$buttons = $this::$paramControl->load_data_from_param($source);
						foreach ($buttons as $_value => $_desc) { ?>
							<label class=left>
								<input data-keep="<?= $_value; ?>" <?php if ($Disabled == true) { ?> disabled="disabled" <?php } ?> <?php if ($Readonly == true) { ?>readonly="readonly" <?php } ?> <?php if ($Required == true) { ?>required="required" <?php } ?> class="filled-in keep" type="radio" value="<?= $_value; ?>" data-source="<?= $source ?>" name="<?= $name . $ex; ?>" />
								<span><?= $_desc; ?></span>
							</label>
						<?php } ?>
					</div>
				</div>
			<?php } else if ($type == "content") { ?>
				<?php
				// if (empty($Value)) {
				// 	if(empty($this::$paramControl->isConnected)) $this::$paramControl::$generic->connect();
				// 	$value = $this::$paramControl::$generic->getFromTable($param->table, "{$param->primary_key}={$param->key}");
				// 	if (count($value)) {
				// 		$Value = reset($value)->{$name};
				// 	}
				// }
				?>
				<div class="file-field input-field left <?= $class ?>">
					<label class="active" for="<?= $name; ?>">
						<?php if ($Required == true) { ?>*<?php } ?><?= $desc; ?>
					</label>
					<div id="<?= $name . $ex; ?>" style="padding-bottom: 20px" class="w-100"><?php see($Value, false) ?></div>
				</div>
			<?php } else if ($type == "file") { ?>
				<div class="file-field input-field left <?= $class ?>">
					<div class="btn generic-file-selector" data-href="<?= $this::$uri->backend ?>processors/process_upload.php" data-path="<?= absolute_filepath($this::$uri->site) ?>/assets/" data-edit="0" data-display="<?php if (empty($Value)) { ?> all <?php } else {
																																																																																																																										echo $Value;
																																																																																																																									} ?>" style="height: 2.7rem;line-height: 2.7rem;">
						<span>File</span>
					</div>
					<div class="file-path-wrapper">
						<input name="<?= $name . $ex; ?>" id="<?= $name . $ex; ?>" <?php if ($Required == true) { ?> required="required" <?php } ?> class="file-path validate" readonly type="text" placeholder="<?= $desc; ?>
						">
					</div>
				</div>
			<?php } else if ($type == "select") { ?>
				<div class="input-field <?= $class ?>">
					<select class="<?php if ($multi != true) { ?> browser-default	<?php } ?> <?= $name ?> <?= $keep ?>" data-value="<?= $Value ?>" data-empty="<?= $Empty ?>" data-source="<?= $source ?>" name="<?= $name . $ex; ?>" id="<?= $name . $ex; ?>" <?php if ($multi == true) { ?> multiple="multiple" <?php } ?> <?php if ($Required == true) { ?> required="required" <?php } ?> <?php if ($Disabled == true) { ?> disabled="disabled" <?php } ?> <?php if (!empty($event[$_k0][$_k][$_k1][$_k2])) {
																																																																																																																																																																																																																												$_selFunc = empty($Event['function']) ? 'heirachy_select(this)' : $Event['function'];
																																																																																																																																																																																																																												$Event['type'] = empty($Event['type']) ? "onchange" : $Event['type']; ?> <?= $Event['type'] ?>="<?= $_selFunc ?>" <?php if (!empty($Event['target'])) { ?> data-target="<?= $Event['target'] ?>" data-target-source="<?= $this::$paramControl->source_encode($Event['source']) ?>" <?php if (!empty($Event['action'])) { ?> data-target-action="<?= $Event['action'] ?>" <?php } ?> <?php } ?> <?php } ?>>
						<?php
						if (empty($this::$paramControl->isConnected)) $this::$paramControl::$generic->connect();
						$array = $this::$paramControl->load_data_from_param($source);
						if (!empty($Empty)) { ?> <option value="">Select</option> <?php }
																																		foreach ($array as $key => $value_) { ?>
							<option value="<?= $key ?>"><?= $value_ ?></option>
						<?php }
						?>
					</select>
					<?php if (empty($plh)) { ?>
						<label class="active" for="<?= $name; ?>"><?php if ($Required == true) { ?>*<?php } ?><?= $desc; ?></label>
					<?php } ?>
				</div>
			<?php } else if ($type == "switch") { ?>
				<div class="input-field <?= $class ?>">
					<?php $data = $this::$paramControl->load_data_from_param($source);
					$vy = [];
					foreach ($data as $_k3 => $v3) {
						$_ky[] = $_k3;
						$vy[] = $v3;
					} ?>
					<label data-cache="<?= $source ?>" for="<?= $name; ?>" class="active"><?php if ($Required == true) { ?>*<?php } ?><?= $desc ?></label>
					<div class="switch" style="height:50px">
						<label>
							<?php if ($Required == true) { ?>*<?php } ?> <?= $vy[0]; ?>
							<input <?php if (!empty($Event)) { ?> <?= $Event["type"] ?>="<?= $Event["function"] ?>" <?php } ?> type="checkbox" name="<?= $name . $ex; ?>" id="<?= $name . $ex; ?>" <?php if ($Disabled == true) { ?> disabled="disabled" <?php } ?> <?php if ($Readonly == true) { ?>readonly="readonly" <?php } ?> <?php if (strlen($Value)) { ?>checked="checked" <?php } ?> <?php if ($Required == true) { ?>required="required" <?php } ?>>
							<span class="lever"></span>
							<?php if ($Required == true) { ?>*<?php } ?><?= $vy[1]; ?>
						</label>
					</div>
				</div>
				<?php } else if ($type == "buttons") {
				$buttons = $this::$paramControl->load_data_from_param($source);
				$btnclick = empty($onClick) ? "download" : 'onclick="' . $onClick . '"';
				foreach ($buttons as $bk => $bv) { ?>
					<div class="<?= $class ?>" style="margin-bottom:10px">
						<a href="javascript:;" id="<?= $bk ?>" name="<?= $bk ?>" class="button download" <?= $btnclick ?>><?= "$desc $bv" ?></a>
					</div>
				<?php }
			} else if ($type == "download") {
				$btnclick = empty($onClick) ? "download" : 'onclick="' . $onClick . '"'; ?>
				<div class="<?= $class ?>" style="margin-bottom:10px">
					<a href="javascript:;" id="<?= $name . $ex; ?>" name="<?= $name ?>" class="button btn download white-text w-100" <?= $btnclick ?>><?= $desc ?></a>
				</div>
			<?php
			} else if ($type == "roles") {
				$pages = 	$this::$paramControl->get_page_param("roles"); ?>
				<div class="input-field <?= $class ?> role">
					<input type="hidden" name="<?= $name . $ex; ?>" />
					<ul class="collection">
						<?php $parent_num	= 1;
						foreach ($pages as $group_name => $group_data) { ?>
							<li>
								<div class="collection-header ">
									<label>
										<input id="<?= $parent_num ?>" data-keep="<?= $parent_num ?>" value="<?= $parent_num ?>" type="checkbox" class="rlAll keep filled-in" />
										<span for="<?= $parent_num ?>" class="collection-header"><?= $group_name ?></span>
									</label>
								</div>
								<div class="collection-item">
									<div class="collection">
										<?php
										$links_id	= 1;
										foreach ($group_data->links as $links_key => $links_data) { ?>
											<div class="collection-item">
												<label>
													<input class='filled-in keep cbr<?= $parent_num ?>' type="checkbox" id="<?= "{$parent_num}_{$links_id}" ?>" data-keep="<?= "{$parent_num}:{$links_id}" ?>" value="<?= "{$parent_num}:{$links_id}" ?>" />
													<span for="<?= "{$parent_num}_{$links_id}" ?>"><?= $links_data->title ?></span>
												</label>
											</div>
										<?php $links_id++;
										} ?>
									</div>
								</div>
							</li>
						<?php $parent_num++;
						} ?>
					</ul>
				</div>
				<!-- SLAVE PRODUCT MANAGER -->
			<?php } else if ($type == "slave") { ?>
				<div class="slave-container <?= $class ?>" data-name="<?= $desc ?>">
					<div class="input-field">
						<div class="checkbox-container" style="position:relative; width:100%">
							<label for='<?= $name . $ex ?>'>
								<input <?php if ($Disabled == true) { ?> disabled="disabled" <?php } ?> <?php if ($Readonly == true) { ?>readonly="readonly" <?php } ?> name="<?= $name . $ex; ?>" id="<?= $name . $ex; ?>" <?php if ($Required == true) { ?>required="required" <?php } ?> type="checkbox" value="<?= $Value ?>" class="filled-in <?= $name ?> <?php if (strlen($Value)) echo 'keep' ?>" <?php if (!empty($ex)) { ?>data-class="<?= $name; ?>" <?php } ?> onclick="toggleSlave(this)" />
								<span>Master Stock</span>
							</label>
							<button type="button" class="slave-button hide" onclick="$(this).closest('.slave-container').find('.modal').openModal()">Manage</button>
						</div>
					</div>
				</div>
				<!-- DESCRIPTION -->
			<?php } else if ($type == "displaypicture") { ?>
				<div class="displaypicture <?= $class ?>" data-name="<?= $desc ?>">
					<label for="<?= $name; ?>" class="text-center w-100"> <?= $desc; ?></label>
					<img width="100%" name="<?= $name; ?>" id="<?= $name; ?>" src="">
				</div>
			<?php } else if ($type == "description") { ?>
				<div class="description-container <?php if ($Required == true) echo "required" ?>" data-name="<?= $desc ?>" name="<?= $name; ?>">
				</div>
				<!-- MULTI IMAGE WIDGET -->
			<?php } else if ($type == "items") { ?>
				<div data-num="<?= $Value ?>" class="items-container <?php if ($Required == true) echo "required ";
																															echo $class ?>" data-desc="<?= $desc ?>" name="<?= $name; ?>">
				</div>
				<!-- JSON MANAGER WIDGET -->
			<?php } else if ($type == "json-manager") { ?>
				<div class="json-container <?php if ($Required == true) echo "required ";
																		echo $class ?>" data-source="<?= $source ?>" data-desc="<?= $desc ?>" name="<?= $name; ?>">
				</div>
				<!-- Form Builder -->
			<?php } else if ($type == "form-builder") { ?>
				<div class="form-builder <?php if ($Required == true) {
																		echo "required ";
																		echo $class;
																	} ?>" data-desc="<?= $desc ?>" name="<?= $name; ?>">
				</div>
				<!-- Generic Slider -->
			<?php } else if ($type == "generic-slider") { ?>
				<div class="slider-container <?php if ($Required == true) echo "required" ?>" data-name="<?= $desc ?>" name="<?= $name; ?>"></div>
				<!-- DRAW SEATS -->
			<?php } else if ($type == "drawseats") { ?>
				<div class="<?= $class ?> seats-container" data-name="<?= $desc ?>" name="<?= $name; ?>">
					<div class="input-field col s12">
						<input autocomplete="off" <?php if ($Required == true) echo "required" ?> name="<?= $name ?>" id="<?= $name ?>" type="text" class="selected <?= $name ?>">
						<label class="active" for="<?= $name ?>">Selected Seat</label>
					</div>
					<div class="seats-title w-100 p-3"> <?= $desc ?></div>
				</div>
			<?php } else if ($type == "dynamic-lists") { ?>
				<!-- DYNAMIC LIST MANAGER -->
				<div class="<?= $class ?> list-container" name="<?= $name; ?>" <?php if (!empty($Event)) { ?> <?= $Event["type"] ?>="<?= $Event["function"] ?>" <?php } ?>>
					<div class="dynamic-lists-head"> <?= $desc ?></div>
					<div class="dynamic-lists-body" data-source="<?= $source ?>" <?php if (!empty($multi)) { ?>data-multiple="<?= $multi ?>" <?php } ?>>
						<div class="dynamic-lists-form"></div>
						<div class="dynamic-lists-list"></div>
					</div>
				</div>
			<?php } else if ($type == "richtext-body") { ?>
				<!-- RICHTEXT BODY -->
				<div class="richtext-body contentEdittable" name="<?= $name; ?>" id="<?= $name; ?>"></div>

			<?php } else if ($type == "divider") { ?>
				<!-- RICHTEXT BODY -->
				<div class="divider <?= $class; ?> my-3" id="<?= $name; ?>"></div>
				<!-- <picture>

					</picture> -->
			<?php } else if ($type == "picture") { ?>
				<div class="input-field <?= $class ?>">
					<label for="<?= $name ?>" class=active><?= $desc ?></label>
					<a href="javascript:;" data-href="<?= $this::$uri->backend ?>process/dialog" data-path="<?= absolute_filepath($this::$uri->site) ?>assets/" class="<?= $name; ?> mb-2 uploadPic" data-display="picture">
						<img src="<?php if (isset($col_row[$name])) echo $col_row[$name];
											else echo $this::$uri->backend . 'images/default.png'; ?>" style="width: 100%;" class='form_pic' data-name="<?= $name; ?>">
						<div class="white black-text center-align valign-wrapper" style="position: absolute; right: 0px; top: 0px; opacity: 0.8; margin-top: 20px;">
							<img class="material-icons black-text medium valign" src="icons/photo_camera.svg">
							<span class="valign"> Click to change picture </span>
						</div>
					</a>
					<input name="<?= $name; ?>" id="<?= $name; ?>" <?php if ($Required == true) { ?> required="required" <?php } ?> hidden="hidden" class="hide" type="text" value="<?php if (isset($col_row[$name])) echo $col_row[$name]; ?>" />
				</div>
				<!-- TRANSACTION WIDGET -->
			<?php  } else if ($type == "transactions") { ?>
				<div id="_item_div" class="<?= $class ?>">
					<div class="col s12">
						<a id="newsales" type="button" onclick="newsales(this)" class="tooltipped newsales" data-tooltip="Add a new transaction row">
							<img src="icons/add.svg" class="btn-floating pink darken-3 btn-flat material-icons" alt="">
						</a>
						<div id="_itemlist" style="display:block" class="table col s12 p-0">
							<?php
							global $params;
							//Extract the source of this transaction widget to create the form attached to it
							$transaction_row = $params->{$source}->form;
							$trans = $this::$paramControl->extract_form($transaction_row);
							$trans_pos = $trans['form_position'];
							foreach ($trans["cls"][0][$trans_pos] as $_trans_k => $trans_value) { ?>
								<div class="row teal-text lighten-1" data-role="Transaction Header">
									<?php foreach ($trans["cls"][0][$trans_pos][$_trans_k] as $key => $value) { ?>
										<div class="<?= $trans["cls"][0][$trans_pos][$_trans_k][$key] ?>" <?php if ($trans["order"][0][$trans_pos][$_trans_k][$key] == 'h') echo 'style="display:none"'; ?>>
											<?= strtoupper($trans["coldesc"][0][$trans_pos][$_trans_k][$key]) ?>
										</div>
									<?php } ?>
								</div>
								<!-- Transaction body [rows] -->
								<div class="row teal-text lighten-1 desc crv " data-role="Transaction Body" data-num="1">
									<input type="hidden" class="tid" name="tid1" id="tid1" />
									<?php $this->create_elements($trans, 0, $trans_pos, $_trans_k, '1'); ?>
								</div>
							<?php } ?>
						</div>
						<input id="sparam" type="hidden" class="keep" value="<?= $this::$paramControl->extractFormSubset($transaction_row, $trans_pos); ?>" />
						<input id="_count" type="hidden" class="keep" value="1" name="num_rows" />
					</div>
				</div>
				<div class="card-action col s12 exbold no-bottom">
					<div class="col s6 right">
						<input type="text" name="amount" class="col s6 m8 r-align-bold total" readonly="true" autocomplete="off" id="_total" />
						<label for="_total" class="hide-on-small-only r-label">TOTAL</label>
					</div>
				</div>
			<?php } ?>
			<?php }
	}

	public function create_static_elements($vt, $_k0, $_k, $_k1, $ex = '', $param = null)
	{
		if (empty($param)) global $param;
		extract($vt);
		$v1 = $coldesc[$_k0][$_k][$_k1];
		foreach ($v1 as $_k2 => $desc) {
			$source 	= $src[$_k0][$_k][$_k1][$_k2];
			$class 		= $cls[$_k0][$_k][$_k1][$_k2];
			$multi  	= $mult[$_k0][$_k][$_k1][$_k2];
			$Empty 		= $empty[$_k0][$_k][$_k1][$_k2];
			$Event 		= $event[$_k0][$_k][$_k1][$_k2];
			$Value 		= $value[$_k0][$_k][$_k1][$_k2];
			$Disabled = $disabled[$_k0][$_k][$_k1][$_k2];
			$Readonly = $readonly[$_k0][$_k][$_k1][$_k2];
			$Required = $required[$_k0][$_k][$_k1][$_k2];
			$plh 			= $placeholder[$_k0][$_k][$_k1][$_k2];
			$type 		= strtolower($order[$_k0][$_k][$_k1][$_k2]);
			$name 		= strtolower($columns[$_k0][$_k][$_k1][$_k2]);
			// This particular "keep" class is for Select and combo elements and they would be excluded from auto reloads
			$keep     = (stripos($class, "keep") === false) ? "" : "keep";
			$class    = str_replace("keep", "", $class);

			if ($type == "select") { ?>
				<div class="input-field <?= $class ?>">
					<select class="<?php if ($multi != true) { ?> browser-default	<?php } ?> <?= $name ?> <?= $keep ?>" name="<?= $name . $ex; ?>" disabled="disabled">
						<?php
						if (empty($this::$paramControl->isConnected)) $this::$paramControl::$generic->connect();
						$array = $this::$paramControl->load_data_from_param($source);
						foreach ($array as $key => $value_) { ?>
							<option value="<?= $key ?>"><?= $value_ ?></option>
						<?php }
						?>
					</select>
					<?php if (empty($plh)) { ?>
						<label class="active" for="<?= $name; ?>"><?php if ($Required == true) { ?>*<?php } ?><?= $desc; ?></label>
					<?php } ?>
				</div>
			<?php } else if ($type == "picture") { ?>
				<div class="displaypicture <?= $class ?>" data-name="<?= $desc ?>">
					<img width="100%" name="<?= $name; ?>" class="<?= $name; ?>" src="">
				</div>
			<?php } else { ?>
				<div class="input-field <?= $class; ?>">
					<p class="<?= $name; ?> input3"><?= $Value; ?></p>
					<label class="active" for="<?= $name; ?>"><?php if ($Required == true) { ?>*<?php } ?><?= $desc; ?></label>
				</div>
			<?php }
		}
	}

	public function create_dashboard_elements($vt, $_k0, $_k, $_k1, $ex = '')
	{
		global $param;
		extract($vt);
		$v1 = $coldesc[$_k0][$_k][$_k1];
		foreach ($v1 as $_k2 => $desc) {
			$source 	= $src[$_k0][$_k][$_k1][$_k2];
			$class 		= $cls[$_k0][$_k][$_k1][$_k2];
			$multi  	= $mult[$_k0][$_k][$_k1][$_k2];
			$Empty 		= $empty[$_k0][$_k][$_k1][$_k2];
			$Event 		= $event[$_k0][$_k][$_k1][$_k2];
			$Value 		= $value[$_k0][$_k][$_k1][$_k2];
			$Disabled = $disabled[$_k0][$_k][$_k1][$_k2];
			$Readonly = $readonly[$_k0][$_k][$_k1][$_k2];
			$Required = $required[$_k0][$_k][$_k1][$_k2];
			$plh 			= $placeholder[$_k0][$_k][$_k1][$_k2];
			$type 		= strtolower($order[$_k0][$_k][$_k1][$_k2]);
			$name 		= strtolower($name[$_k0][$_k][$_k1][$_k2]);
			// This particular "keep" class is for Select and combo elements and they would be excluded from auto reloads
			$keep     = (stripos($class, "keep") === false) ? "" : "keep";
			$class    = str_replace("keep", "", $class);

			if ($type == "table") {
				if (empty($this::$paramControl->isConnected)) $this::$paramControl::$generic->connect();
				$source = $this::$paramControl->source_decode($source);
				$array  = $this::$paramControl->load_data_from_param($source);
			?>
				<div class="">
					<ul class="collection no-collection">
						<?php $count = 1;
						foreach ($array as $key => $arrayvalue) :
							$arrayvalue  = array_values((array)$arrayvalue);
							unset($arrayvalue[0]);
							$arrayvalue = array_values($arrayvalue);
							$last = array_pop($arrayvalue);
						?>
							<li class="collection-item">
								<?php foreach ($arrayvalue as $colvalue) : ?>
									<span class="title capitalize"><?= $colvalue ?></span>
								<?php endforeach; ?>
								<i class="secondary-content"><?= $last ?></i>
							</li>
						<?php $count++;
						endforeach; ?>
					</ul>
				</div>
			<?php } elseif ($type == "line-graph" || $type == "bar-graph" || $type == "pie-chart") { ?>
				<?php $heights = ["line-graph" => "300px", "bar-graph" => "300px", "pie-chart" => "150px"] ?>
				<div class="chart-container" class="<?= $class ?>">
					<canvas id="<?= $name . $ex; ?>" width="100%" data-height="<?= $heights[$type] ?>" data-type=<?= explode("-", $type)[0] ?>></canvas>
				</div>
		<?php  }
		}
	}

	public function build_action_modal($thisparam, $param)
	{
		$paramControl = $this::$paramControl; ?>
		<form <?php if (!empty($thisparam->form->onload)) { ?>onload="<?= $thisparam->form->onload ?>" <?php } ?> <?php if (!empty($thisparam->form->callback)) { ?>callback="<?= $thisparam->form->callback ?>" <?php } ?> data-action="<?= $thisparam->process_url ?>" method="post" id="fm_action_<?= strToFilename("{$param->page_title} {$thisparam->page_title}") ?>" data-submit="<?= $thisparam->submit_type ?>" enctype="multipart/form-data" action="javascript:;">
			<div class="modal-header">
				<div class="form-title" id="form_title"></div>
			</div>
			<div class="modal-body">
				<?php
				//Load form elements into to the hidden modal
				$thisForm = $paramControl->extract_form($thisparam->form);
				$this->build_form($thisForm, "form_elements", $thisparam);
				?>
			</div>
			<div class="modal-footer">
				<input name="<?= $thisparam->primary_key ?>" type="hidden" id="<?= $thisparam->primary_key ?>" class="uniqueId" />
				<input name="pageType" class="keep" type="hidden" id="page_type" data-pageType="<?= $thisparam->pageType ?>" value="<?= $thisparam->pageType ?>" />
				<input name="page_title" class="keep" type="hidden" id="page_title" value="<?= $thisparam->page_title ?>" />
				<a class="waves-effect waves-green btn-flat" data-dismiss="modal">CANCEL</a>
				<button type="submit" class="waves-effect waves-green btn action-btn">Ok</button>
			</div>
		</form>
	<?php
	}

	public function build_report_modal($thisparam, $param)
	{
		$paramControl = $this::$paramControl;
		$report_setup = $thisparam->report_setup;
		$sections = [
			"date" => "Date Range",
			"grouping" => "Grouping",
			"secondary_grouping" => "Secondary Grouping",
			"filters" => "Filters",
		]
	?>
		<div class="modal-title">
			<h4 class="center-align pt-2 mb-0"><?= $thisparam->page_title ?></h4>
		</div>
		<div class="modal-content report-modal" id="report_modal">
			<div class="row">
				<!-- Left Bar -->
				<div class="col s4">
					<div class="collection m-0 p-0 w-100" id="report_menu">
						<a href="javascript:;" data-href="subdiv_column" class="collection-item active">Display Columns</a>
						<?php foreach ($sections as $section_key => $section_title) : ?>
							<?php if (in_array($section_key, $report_setup->sections)) : ?>
								<a href="javascript:;" data-href="subdiv_<?= $section_key ?>" class="collection-item"><?= $section_title ?></a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<a type="button" class="btn mt-4" id="_runReport">Run Report</a>
				</div>
				<!-- Right bar -->
				<div class="col s8 panel-div" id="panel-div">
					<div class="row active" name="float_div" id="subdiv_column">
						<p class="my-0">Display Columns
							<hr>
						</p>
						<div class="col s12 p-0">
							<ul class="collection m-0 p-0 w-100">
								<li class="collection-item row">
									<div class="col s6"> <b style="font-weight:bold"> <small> Column Name</small> </b></div>
									<div class="col s3"> <b style="font-weight:bold"> <small> Show Title </small> </b></div>
									<div class="col s3"> <b style="font-weight:bold"> <small>Column Break</small> </b></div>
								</li>
							</ul>
							<ul class="collection sortable m-0 p-0 w-100">
								<?php foreach ($report_setup->display_fields as $key => $field) : if (!empty($field->hidden)) continue; ?>
									<li class="collection-item row checked<?= !empty($field->checked) ?> <?= $field->name ?>">
										<div class="col s1">
											<label for="check<?= $key ?>">
												<input type="checkbox" <?php if (!empty($field->checked)) { ?>checked="checked" <?php } ?> class="filled-in gcol" id="check<?= $key ?>" name="check<?= $key ?>" value="<?= $field->name ?>">
												<span></span>
											</label>
										</div>
										<div class="col s6"> <small> <b style="font-weight:bold"><?= $field->description ?></b> </small> </div>
										<div class="col s3">
											<label for="check-a1-<?= $key ?>">
												<input type="checkbox" name="check-a1-<?= $key ?>" <?php if (!empty($field->checked)) { ?>checked="checked" <?php } else { ?> disabled="disabled" <?php } ?> class="filled-in" id="check-a1-<?= $key ?>" value=""> <span></span>
											</label>
										</div>
										<div class="col s2">
											<label for="check-a2-<?= $key ?>">
												<input type="checkbox" <?php if (!empty($field->checked)) { ?>checked="checked" <?php } else { ?> disabled="disabled" <?php } ?> class="filled-in" name="check-a2-<?= $key ?>" id="check-a2-<?= $key ?>" value="">
												<span></span>
											</label>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php foreach ($sections as $section_key => $section_title) : ?>
						<div class="row" name="float_div" id="subdiv_<?= $section_key ?>" style="display:none">
							<p class="my-0"><?= $section_title ?>
								<hr>
							</p>
							<div class="col s12">
								<!-- ==================================================== Date Range section -->
								<?php if (in_array($section_key, $report_setup->sections) && $section_key == "date") : ?>
									<div class="col s6">
										<div class="sub-date-title">Quick Dates </div>
										<ul class="quick-dates">
											<li>
												<label for="drd">
													<input name="drd" type="radio" value="" class="none" id="drd" />
													<span>None</span>
												</label>
											</li>
											<?php
											foreach (getReportPeriod() as $i => $preriod) { ?>
												<li>
													<label for="drd_<?= $i ?>">
														<input name="drd" type="radio" value="<?= $preriod; ?>" class="dateVal" id="drd_<?= $i ?>" />
														<span><?= $preriod; ?></span>
													</label>
												</li>
											<?php } ?>
										</ul>
									</div>
									<div class="col s6">
										<div class="sub-date-title">Date Range</div>
										<div class="custom-dates">
											<div class="input-field left w-100">
												<input type="date" name="startdate" />
												<label for="startdate" class="active">Start Date</label>
											</div>
											<div class="date-seperator my-4"></div>
											<div class="input-field  left w-100">
												<input type="date" name="enddate" />
												<label for="enddate" class="active">End Date</label>
											</div>
										</div>
										<a href="javascript:;" class="btn mt-5 right" id="reportdaterange">Apply</a>
										<p class="right w-100 right-align mt-0"><span> <small id="reportdatedisplay"></small> </span></p>
									</div>
									<!-- ==================================================== Grouping Section -->
								<?php elseif (in_array($section_key, $report_setup->sections) && $section_key == "grouping") :
									$group_cols = array_filter($report_setup->display_fields, function ($col) {
										return !empty($col->grouping);
									});
									// Dynamically add none to index 0 of the list
									array_unshift($group_cols, object(["description" => "None", "name" => ""]));
									$gr_sections = ["primary-grouping", "secondary-grouping"];
									// $gr_data     = ["checkbox", "radio"];
								?>
									<?php foreach ($gr_sections as $key => $gr_name) : ?>
										<div class="col s6">
											<div class=""> <small> Select <?= ucfirst(explode("-", $gr_name)[0]) ?> Column</small> </div>
											<ul class="<?= strtolower(explode("-", $gr_name)[0]) ?>-grouping">
												<?php foreach ($group_cols as $i => $field) : ?>
													<li>
														<label for="drd_<?= $key . $i ?>">
															<input data-name="<?= $field->name ?>" class="<?= $field->name ?>" name="drd<?= $key ?>" type="radio" value="<?= $field->name ?>" id="drd_<?= $key . $i ?>" />
															<span><?= $field->description; ?></span>
														</label>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endforeach; ?>
									<div class="col s12">
										<p class="mb-0"> <small>What data do you want to group against the selected column ?</small> </p>
										<ul class="select-data">
											<?php foreach (array_filter($report_setup->display_fields, function ($value) {
												return isset($value->graph);
											}) as $i => $list) : ?>
												<li class="left w-50">
													<label for="group_<?= $i ?>_checkbox">
														<input name="pri_checkbox" checked type="checkbox" value="<?= $list->name; ?>" id="group_<?= $i ?>_checkbox" class="filled-in" group="primary" />
														<span><?= ucwords($list->description) ?></span>
													</label>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col s12">
										<p class="mb-0"> <small>Add graph to data ?</small></p>
										<?php $graph = ["" => "No Graph|", "line" => "Line Graph|show_chart", "bar" => "Bar Chart|equalizer", "pie" => "Pie Chart|pie_chart"] ?>
										<ul class="graph-data">
											<?php foreach ($graph as $i => $graphx) : $graphx = explode("|", $graphx) ?>
												<li class="left w-50">
													<label for="graph_<?= $i ?>_checkbox">
														<input name="graph" type="radio" value="<?= $i ?>" id="graph_<?= $i ?>_checkbox" class="filled-in" />
														<span>
															<i class="material-icons teal-text mt-1"><?= $graphx[1] ?></i>
															<?= ucwords($graphx[0]) ?>
														</span>
													</label>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<!-- -=========================================Filters======================================================== -->
								<?php elseif (in_array($section_key, $report_setup->sections) && $section_key == "filters") : ?>
									<?php $filterkeys = ["None" => "0||", "Range" => "range|From|To", "Equal To" => "equal|Value|", "Less Than" => "less|Value|", "Greater Than" => "greater|Value|", "Starting With" => "start|Value|", "Ending With" => "end|Value|", "Contains" => "contain|Value|", "Not Equal To" => "not|Value|"] ?>
									<?php foreach ($thisparam->report_setup->display_fields as $key => $field) :
										if (!empty($field->filter)) {
											$display_fields = empty($field->multiple) ? "" : $field->multiple;
											$insert_field = empty($field->value) ? "" : $field->value; ?>
											<div class="row report-filter-list">
												<div class="col m4 s12">
													<div class="input-field">
														<label for="" class="active"><?= $field->description ?></label>
														<select class="browser-default report-filter-select" name="<?= $field->name ?>" id="filter<?= $field->column ?>">
															<?php foreach ($filterkeys as $key => $value) : ?>
																<option value="<?= explode("|", $value)[0] ?>" data-action=<?= $value ?>><?= $key ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="col m4 s12">
													<div class="input-field" style="display:none">
														<input id="from<?= $field->column ?>" type="text" name="from<?= $field->column ?>" value="" class="combo" data-source="<?= $paramControl->source_encode($field->source) ?>" display_fields="<?= $display_fields ?>" insert_field="<?= $insert_field ?>">
														<label for="from">FROM</label>
													</div>
												</div>
												<div class="col m4 s12">
													<div class="input-field" style="display:none">
														<input id="to<?= $field->column ?>" type="text" name="to<?= $field->column ?>" value="" class="combo" data-source="<?= $paramControl->source_encode($field->source) ?>" display_fields="<?= $display_fields ?>" insert_field="<?= $insert_field ?>">
														<label for="to">To</label>
													</div>
												</div>
											</div>
										<?php } ?>

									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<form action="<?= $this::$uri->backend ?>process/report" method="post" id="report_form">
				<input name="dateTitle" id="dateTitle_report" type="hidden">
				<input name="selectDate" id="selectDate_report" type="hidden">
				<input name="pri" id="pri_report" type="hidden">
				<input name="graph" id="graph" type="hidden">
				<input name="sec" id="sec_report" type="hidden">
				<input name="igroup" id="igroup_report" type="hidden">
				<input name="dir" id="dir_report" type="hidden" value="asc">
				<input name="pageType" type="hidden" value="<?= $thisparam->pageType ?>">
			</form>
		</div>
		<?php
	}

	public function build_detail_tabs($section, $param)
	{
		$type = reset($section->section_elements);
		switch ($type->type) {
			case 'list':
		?>
				<div class="display-detail"></div>
				<div class="fixed-action-btn" style="right:5px">
					<a class="btn-floating btn-large teal" data-tooltip="Add new<?= $section->section_title ?>">
						<i class="large material-icons">add</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating orange tooltipped" data-position="left" data-delay="50" data-tooltip="Refresh <?= $section->section_title ?>">
								<i class="material-icons">refresh</i>
							</a>
						</li>
					</ul>
				</div>
			<?php
				break;
			case 'comment':
			?>
				<div class="comment">
					<div class="display-detail"></div>
					<div class="comment-footer">
						<form class="" action="javascript:;" method="post" onsubmit="saveForm('_<?= $d ?>', this)">
							<div class="row">
								<?php
								$formdata = $this::$paramControl->extract_form($param->form);
								if (!empty($formdata["coldesc"])) {
									foreach ($formdata["coldesc"] as $_k0 => $v0) {
										foreach ($v0 as $_k => $v) {
											foreach ($v as $_k1 => $v1) {
												$this->create_elements($formdata, $_k0, $_k, $_k1, "", $param);
											}
										}
									}
								}
								?>
							</div>
						</form>
					</div>
				</div>
				<div class="fixed-action-btn" style="right:5px">
					<a class="btn-floating btn-large orange" data-tooltip="Add new<?= $section->section_title ?>">
						<i class="large material-icons">refresh</i>
					</a>
				</div>
<?php
				break;

			default:
				// code...
				break;
		}
	}
}
?>