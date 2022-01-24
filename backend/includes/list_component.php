<?php if (!empty($extension->table)) {
	$param = $extension;
} ?>
<div class="upload_bar" id="upload_bar">
	<?php if (!empty($param->display_level)) { ?>
		<div class="top-control row mb-3" style="border-bottom: solid 1px #dbdfd6;margin-bottom:15px !important;">
			<a href="javascript:;" class="col s2" id="_backTop" top="_<?= strToFilename($param->display_level->source) ?>">
				<img src="icons/reply_black.svg" class="material-icons" />
				<span>Back</span>
			</a>
			<div class="right-align col s10">
				<b id="_linkTitle"></b>
			</div>
		</div>
	<?php } ?>
	<div class="top-control row" style="margin:0">
		<div class="input-field col s9 m10 l3">
			<input name="search" type="text" id='_searchBox' class="browser-default" size="50" value="" <?php if (!empty($param->search)) { ?> data-search='<?= json_encode($param->search) ?>' <?php } ?> placeholder="Search Database for <?= $param->page_title ?>" />
		</div>
		<div class="input-field col s6 m4 l2">
			<select name="range" id='_rangeBox' class="browser-default">
				<option value="">Number of items</option>
				<option value="200">Fetch 200 Items</option>
				<option value="500" selected>Fetch 500 Items</option>
				<option value="1000">Fetch 1000 Items</option>
				<option value="1500">Fetch 1500 Items</option>
			</select>
		</div>
		<div id="_filterList" class="_filterList col s6 m6">
			<?php if (!empty($param->display_level)) { ?>
				<input class="filterValue keep" id='_linkFilter' type="checkbox" checked hidden name="<?= $param->display_level->column ?>" />
			<?php } ?>
			<?php
			if (!empty($param->category)) :
				foreach ($param->category as $category_key => $category_data) {
					if (isset($category_data->type) && $category_data->type == "period") { ?>
						<div class='input-field col s12 right'>
							<input class="dateFilter keep browser-default" type="text" id='<?= $category_data->column ?>' size="50" name="<?= $category_data->column ?>" />
							<?php if (!empty($param->display_level)) { ?>
								<input class="filterValue" type="hidden" id='_linkFilter' name="<?= $category_data->column ?>" />
							<?php } ?>
							<label class="cat" for='period'>Date Range </label>
						</div>
			<?php } else {
						$jn[] = $category_data;
					}
				}
			endif;
			?>
			<?php if (!empty($jn)) { ?>
				<div class="input-field col s12 m6 right">
					<input type="text" id='_filter' size="50" class="filter browser-default" data-value="<?= $paramControl->jsonRe_encode($jn) ?>" />
					<label for="_filter">Filter By</label>
				</div>
			<?php } ?>
		</div>

	</div>
</div>
<div class="list_cont">
	<div class="card">
		<div class="header">
			<h2>List Of <?= $param->page_title ?> <strong id="_reloadPage"></strong> </h2>
			<!-- Build the Action buttons -->
			<?php if (!isset($param->listFAB) || $param->listFAB !== false) {
				$fixed_keys = array_keys($default_list_actions);
				$build = empty($param->listFAB) ? $fixed_keys : $param->listFAB; ?>
				<ul class="header-dropdown">
					<li class="dropdown">
						<a href="#" onclick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<?php foreach ($build as $key => $value) {
								if (in_array($value, $fixed_keys)) { ?>
									<li>
										<a href="javascript:;" id="<?= $default_list_actions[$value][1] ?>">
											<i class="fa fa-<?= $default_list_actions[$value][2] ?>"></i> <?= $default_list_actions[$value][0] ?>
										</a>
									</li>
								<?php } else {
									$thisparam = $params->{$value}; ?>
									<li>
										<!-- Has to have pageid added to the href bcos the modal id would auto get a page appended to it -->
										<a href="javascript:;" data-bs-target='#<?= strToFilename("{$param->page_title} {$thisparam->page_title}_") . $pageId ?>' data-bs-toggle="modal">
											<i class="fa fa-<?= $thisparam->icon ?>"></i> <?= $thisparam->page_title ?>
										</a>
									</li>
								<?php } ?>
							<?php } ?>

						</ul>
					</li>
				</ul>
			<?php } ?>
		</div>
		<div id="dialog_display" class="open_select-div body" data-open="<?= $param->form->form_view ?>"></div>
	</div>
</div>
<div class="pagination">
	<div class="cont" id="cont"></div>
	<input id="active_page" type="hidden" name="page" />
</div>