<div>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar hoverable">
    <!-- Menu -->
    <div class="menu">
      <ul class="list">
        <li class="">
          <div class="user-panel">
            <div class="image mb-3">
              <img src="<?= $user->image_col ?>" class="user-img-style user-profile" alt="User Image" />
            </div>
            <div class="profile-usertitle">
              <div class="sidebar-userpic-name"> <?= $user->name_col ?> <?= $user->last_name_col ?> </div>
              <div class="profile-usertitle-job "><?= $user->rolename ?> </div>
            </div>
          </div>
        </li>
        <?php
        $parent_id  = 1;
        $sidelinks   = $param->get_page_param("roles");
        $params     = $param->get_params();
        // see($user_role)
        foreach ($sidelinks as $name => $data) {
          if (empty($user_role[$parent_id])) {
            $parent_id++;
            continue;
          } ?>
          <li class="<?php if ($parent_id == 1) { ?> active mt-5<?php } ?> main-menu-li">
            <a href="#" onClick="return false;" class="menu-toggle">
              <i class="fa fa-<?= $data->icon ?>"></i>
              <span class="navTitle"><?= $name ?></span>
            </a>
            <ul class="ml-menu">
              <?php
              foreach ($data->links as $k => $link) {
                $onclick = null;
                $url = explode("/", $link->url);
                $t = end($url);
                $link_source = reset($url);
                $l = $k + 1;
                if (empty($user_role[$parent_id]["$l"])) continue;

                if (!empty($params->{$t})) {
                  $linkParam = $params->{$t};
                  if (!empty($linkParam->page_title)) $link->title = $linkParam->page_title;
                  if ($link_source == "level-view" && !empty($linkParam->display_level) && !empty($linkParam->display_level->source)) {
                    if (!empty($params->{$linkParam->display_level->source})) $link->title = $params->{$linkParam->display_level->source}->page_title;
                  }
                }
                if ($link_source == "javascript") {
                  $link->url = "javascript:;";
                  $onclick = end($url);
                } ?>
                <li>
                  <a data-title="_<?= strToFilename($t) ?>" class="noref" href="<?= $link->url ?>"><?= $link->title ?></a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php $parent_id++;
        } ?>
      </ul>
    </div>
    <!-- #Menu -->
  </aside>
  <!-- #END# Left Sidebar -->
  <!-- Right Sidebar -->
  <aside id="rightsidebar" class="right-sidebar">
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
        <div class="demo-skin">
          <div class="rightSetting">
            <p>SKIN COLORS</p>
            <div class="btn-group theme-color mt-3" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="btnradio" value="1" id="btnradio1" autocomplete="off" checked>
              <label class="radio-toggle btn btn-outline-primary" for="btnradio1">Light Mode</label>
              <input type="radio" class="btn-check" name="btnradio" value="2" id="btnradio2" autocomplete="off">
              <label class="radio-toggle btn btn-outline-primary " for="btnradio2">Dark Mode</label>
            </div>
          </div>
          <div class="rightSetting">
            <p> SKIN COLORS</p>
            <ul class="demo-choose-skin choose-theme list-unstyled">
              <li data-theme="black">
                <div class="black-theme"></div>
              </li>
              <li data-theme="white">
                <div class="white-theme white-theme-border"></div>
              </li>
              <?php $themes = ["primary", "info", "success", "warning", "danger"] ?>
              <?php foreach ($themes as $key => $value) { ?>
                <li data-theme="<?= $value ?>">
                  <div class="white-<?= $value ?> white-theme-border bg-<?= $value ?>"></div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane stretchRight" id="settings">
        <div class="demo-settings">
          <p>GENERAL SETTINGS</p>
          <ul class="setting-list">
            <li>
              <span>Report Panel Usage</span>
              <div class="switch">
                <label>
                  <input type="checkbox" checked>
                  <span class="lever switch-col-green"></span>
                </label>
              </div>
            </li>
            <li>
              <span>Email Redirect</span>
              <div class="switch">
                <label>
                  <input type="checkbox">
                  <span class="lever switch-col-blue"></span>
                </label>
              </div>
            </li>
          </ul>
          <p>SYSTEM SETTINGS</p>
          <ul class="setting-list">
            <li>
              <span>Notifications</span>
              <div class="switch">
                <label>
                  <input type="checkbox" checked>
                  <span class="lever switch-col-purple"></span>
                </label>
              </div>
            </li>
            <li>
              <span>Auto Updates</span>
              <div class="switch">
                <label>
                  <input type="checkbox" checked>
                  <span class="lever switch-col-cyan"></span>
                </label>
              </div>
            </li>
          </ul>
          <p>ACCOUNT SETTINGS</p>
          <ul class="setting-list">
            <li>
              <span>Offline</span>
              <div class="switch">
                <label>
                  <input type="checkbox" checked>
                  <span class="lever switch-col-red"></span>
                </label>
              </div>
            </li>
            <li>
              <span>Location Permission</span>
              <div class="switch">
                <label>
                  <input type="checkbox">
                  <span class="lever switch-col-lime"></span>
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
  <!-- #END# Right Sidebar -->
</div>