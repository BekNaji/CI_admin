
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                    <img src="<?= $url.$user->image ?>" alt=""><?= $user->first_name.' '. $user->last_name ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?= $url ?>admin/profil"><?= $this->lang->line('profil') ?></a>
                      <a class="dropdown-item"  href="<?= $url ?>admin/settings">
                       
                        <span><?= $this->lang->line('settings') ?></span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;"><?= $this->lang->line('help') ?></a>
                    <a class="dropdown-item"  href="<?= $url ?>login/exit"><i class="fa fa-sign-out pull-right"></i><?= $this->lang->line('exit') ?></a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->