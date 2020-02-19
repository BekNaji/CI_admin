 <?php 

$this->load->view("admin/public/header");


$this->load->view("admin/public/nav");

$this->load->view("admin/public/contentheader");
  ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            
            <div class="clearfix"></div>
            <?= @$alert; ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=  $this->lang->line("profil"); ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img style="width: 200px;height: 200px;" class="img-responsive avatar-view" src="<?= $url.$user->image ?>" alt="profil" title="<?= $user->first_name ?>">
                        </div>
                      </div>
                      <h3><?= $user->first_name.' '.$user->last_name ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $user->address  ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?= $user->who ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="<?= $user->website ?>" target="_blank"><?= $user->website ?></a>
                        </li>
                      </ul>

                      
                      <br />


                    </div>
                    <div class="col-md-9 col-sm-9 ">

                                      <div class="x_panel">
                
                  <div class="x_content">
                    <br />
                    <form method="post" action="<?= $url ?>admin/profil/update" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $user->id ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><?=  $this->lang->line('first_name') ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->first_name ?>" type="text" name="first_name" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><?=  $this->lang->line('last_name') ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->last_name ?>" type="text"  name="last_name" required="required" class="form-control">
                        </div>
                      </div>
                
                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?=  $this->lang->line('email') ?><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->email ?>" required="required" class="form-control" type="text" name="email">
                        </div>
                      </div>


                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?=  $this->lang->line('password') ?><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $this->encrypt->decode($user->password) ?>" required="required" class="form-control" type="password" name="password">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?=  $this->lang->line('date_of_birth') ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->birthday ?>" required="required" data-inputmask="'mask': '99/99/9999'"  name="birthday" class="date-picker form-control" required="required" type="text">
                        </div>
                      </div>
                     

                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?=  $this->lang->line('user_website') ?></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->website ?>"  class="form-control" type="text" name="website">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?=  $this->lang->line('user_address') ?></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $user->address ?>" class="form-control" type="text" name="address">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?= $this->lang->line('user_picture') ?>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input name="image" class="date-picker form-control"  type="file">
                        </div>
                      </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align"><?= $this->lang->line('language') ?>
                        </label>
                         <div class="col-md-6 col-sm-6 ">
                            <select name="language" class="form-control">
                              <option value="english"
                              <?=  $user->language == 'english'?'selected':'' ?>>
                                <?=  $this->lang->line("english") ?>
                              </option>
                              <option value="turkish"
                              <?=  $user->language == 'turkish'?'selected':'' ?> ><?=  $this->lang->line("turkish") ?></option>
                              
                            </select>
                          </div>
                        </div>
                    
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          
              
                          <button type="submit" class="btn btn-success"><?=  $this->lang->line('update') ?></button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

                     
                      


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


        <?php 

$this->load->view("admin/public/footer");
         ?>