 <?php 

$this->load->view("admin/public/header");


$this->load->view("admin/public/nav");

$this->load->view("admin/public/contentheader");
  ?>

        <!-- page content -->
        <div class="right_col" role="main">
         
            
            <div class="clearfix"></div>
            <?= $alert; ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=  $this->lang->line("settings") ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img style="width: 150px; height: 150px;" class="img-responsive avatar-view" src="<?= $url.$company->logo  ?>" alt="Avatar" title="<?= $company->name ?>">
                        </div>
                      </div>
                      <h3><?= $company->name ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> 
                          <?=  $company->address ?>
                        </li>

                        

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="<?=  $company->website ?>" target="_blank">
                            <?=  $company->website ?></a>
                        </li>
                      </ul>

                      
                      <br />

              

                    </div>
                    <div class="col-md-9 col-sm-9 ">

         <div class="x_panel">
                
                  <div class="x_content">

                    <br />


                    <form method="post" action="<?= $url ?>admin/settings/update" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data"  >
                      <input type="hidden" name="id" value="<?= $company->id  ?>">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >
                          <?=  $this->lang->line("company_name") ?>
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">

                          <input value="<?=  $company->name ?>" type="text" name="name" required="required" class="form-control ">
                           <span class="text-danger"><?=  form_error("company"); ?></span>
                        </div>
                      </div>

                      <div class="item form-group">

                        <label class="col-form-label col-md-3 col-sm-3 label-align" >
                          <?=  $this->lang->line("company_address") ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?=  $company->address ?>" type="text"  name="address" required="required" class="form-control">
                          <span class="text-danger"><?=  form_error("address"); ?></span>
                        </div>

                      </div>
                      <div class="item form-group">
                        <label  class="col-form-label col-md-3 col-sm-3 label-align">
                          <?=  $this->lang->line("company_website") ?><span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?=  $company->website ?>" required="required" class="form-control" type="text" name="website">
                          <?=  form_error("address"); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                      
                          <label class="col-form-label col-md-3 col-sm-3 label-align">
                            <?=  $this->lang->line("registration") ?>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select name="registration" class="form-control">
                              <option value="1"
                              <?=  $company->registration == 1?'selected':'' ?>>
                                <?=  $this->lang->line("on") ?>
                              </option>
                              <option value="0"
                              <?=  $company->registration == 0?'selected':'' ?> ><?=  $this->lang->line("off") ?></option>
                              
                            </select>
                          </div>
                        
                        </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"><?= $this->lang->line("logo_img") ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $url.$company->logo ?>" name="picture" class="form-control"  type="file">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          
              
                          <button name="submit" type="submit" class="btn btn-success">
                            <?=  $this->lang->line("update") ?></button>
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