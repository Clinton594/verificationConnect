    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="flex-mobile">

            <a href="#" onClick="return false;" class="bars navbar-toggle"></a>

            <strong class="navbar-brand">
              <a href="<?= $uri->site ?>">
                <img src="<?= $company->logo_ref ?>" alt="<?= $company->name ?>" height="100%" />
              </a>
            </strong>

            <a href="javascript:;" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-expanded="false"></a>

          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="pull-left">
            <li>
              <a href="#" onClick="return false;" class="sidemenu-collapse">
                <i class="material-icons">reorder</i>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-left pull-left breadcrumb breadcrumb-style d-none d-lg-block" style="margin-left: 30px;">
            <li class="breadcrumb-item"> <i id="pageIcon" style="float:unset" class="fa fa-home"></i> <b class="page-title" id="navTitle">Dashboard</b></li>
            <li class="breadcrumb-item"><small id="pageLabel">Home</small></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!-- Full Screen Button -->
            <li class="fullscreen">
              <a href="javascript:;" class="fullscreen-btn">
                <i class="fas fa-expand"></i>
              </a>
            </li>
            <!-- #END# Full Screen Button -->
            <!-- #START# Notifications-->
            <li class="dropdown">
              <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button">
                <i class="far fa-bell"></i>
                <span class="label-count bg-orange"></span>
              </a>
              <ul class="dropdown-menu pullDown">
                <li class="header">NOTIFICATIONS</li>
                <li class="body">
                  <ul class="menu">
                    <li>
                      <a href="#" onClick="return false;">
                        <span class="table-img msg-user">
                          <img src="<?= $user->image_col ?>" alt="">
                        </span>
                        <span class="menu-info">
                          <span class="menu-title">Sarah Smith</span>
                          <span class="menu-desc">
                            <i class="material-icons">access_time</i> 14 mins ago
                          </span>
                          <span class="menu-desc">Please check your email.</span>
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#" onClick="return false;">View All Notifications</a>
                </li>
              </ul>
            </li>
            <!-- #END# Notifications-->
            <li class="dropdown user_profile">
              <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button">
                <img src="<?= $user->image_col ?>" class="user-profile" width="32" height="32" alt="User">
              </a>
              <ul class="dropdown-menu pullDown">
                <li class="body">
                  <ul class="user_dw_menu">
                    <li>
                      <a href="<?= $uri->backend ?>profile/settings" onClick="return false;" class="noref" data-title="_settings">
                        <i class="fa fa-user"></i>Profile
                      </a>
                    </li>
                    <li>
                      <a href="<?= $uri->backend ?>logout">
                        <i class="fas fa-power-off"></i>Logout
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <!-- #END# Tasks -->
            <li class="dropdown p-r-25">
              <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button">
                <i class="fas fa-palette"></i>
              </a>
              <ul class="dropdown-menu pullDown" style="right: 0;">
                <li class="header">COLOR PALETTES</li>
                <li class="body w-100 theme-palette">
                  <div class="demo-skin black-text">
                    <div class="rightSetting">
                      <p>CHOOSE THEME MODE</p>
                      <div class="btn-group theme-color mt-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" value="light" id="btnradiolight" autocomplete="off" checked>
                        <label class="radio-toggle btn" for="btnradiolight">Light Mode</label>
                        <input type="radio" class="btn-check" name="btnradio" value="dark" id="btnradiodark" autocomplete="off">
                        <label class="radio-toggle btn" for="btnradiodark">Dark Mode</label>
                      </div>
                    </div>
                    <div class="rightSetting mb-4">
                      <p>SKIN COLOR PALETTES</p>
                      <ul class="demo-choose-skin choose-theme list-unstyled">
                        <?php $themes = ["white", "black", "primary", "info", "success", "orange", "danger", "purple"] ?>
                        <?php foreach ($themes as $key => $value) { ?>
                          <li data-skin="<?= $value ?>">
                            <div class="white-<?= $value ?> white-theme-border bg-<?= $value ?>"></div>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>