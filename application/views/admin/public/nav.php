<!-- sidebar menu -->
            <div id= "sidebar-menu" class= "main_menu_side hidden-print main_menu">
              <div class= "menu_section">
                
                <ul class= "nav side-menu">

               







               <li><a href= "<?=  $url ?>admin/home"><i class= "fa fa-home"></i>
                    <?= $this->lang->line('home'); ?></a>
                  </li> 


                 <li><a href= "<?=  $url ?>admin/user/index"><i class= "fa fa-list"></i>
                    <?= $this->lang->line('user_list'); ?></a>
                  </li>
                  <li><a href= "<?=  $url ?>admin/user/create"><i class= "fa fa-plus"></i>
                    <?= $this->lang->line('add_user'); ?></a>
                  </li>

                  <li><a><i class= "fa fa-cogs"></i><?= $this->lang->line('settings'); ?><span class= "fa fa-chevron-down"></span></a>

                    <ul class= "nav child_menu">
                      <li><a href= "<?=  $url ?>admin/profil"><?= $this->lang->line('profil'); ?></a></li>
                      <li><a href= "<?=  $url ?>admin/settings"><?= $this->lang->line('generel'); ?></a></li>
                      
                    </ul>
                  
                  </li> 
                 
                </ul>
              </div>



            </div>
            <!-- /sidebar menu -->
 <!-- /menu footer buttons -->
           <!--  <div class= "sidebar-footer hidden-small">
              <a data-toggle= "tooltip" data-placement= "top" title= "Settings">
                <span class= "glyphicon glyphicon-cog" aria-hidden= "true"></span>
              </a>
              <a data-toggle= "tooltip" data-placement= "top" title= "FullScreen">
                <span class= "glyphicon glyphicon-fullscreen" aria-hidden= "true"></span>
              </a>
              <a data-toggle= "tooltip" data-placement= "top" title= "Lock">
                <span class= "glyphicon glyphicon-eye-close" aria-hidden= "true"></span>
              </a>
              <a data-toggle= "tooltip" data-placement= "top" title= "Logout" href= "login.html">
                <span class= "glyphicon glyphicon-off" aria-hidden= "true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>