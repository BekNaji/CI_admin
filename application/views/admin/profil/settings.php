 <?php 

$this->load->view("admin/public/header");


$this->load->view("admin/public/nav");

$this->load->view("admin/public/contentheader");
  ?>

        <!-- page content -->
        <div class="right_col" role="main">
         
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{url}assets/images/favicon.ico" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{website}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                        </li>

                        

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.beknaji.com</a>
                        </li>
                      </ul>

                      
                      <br />

              

                    </div>
                    <div class="col-md-9 col-sm-9 ">

         <div class="x_panel">
                
                  <div class="x_content">

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Company Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">

                          <input type="text" name="company" required="required" class="form-control ">
                           <span class="text-danger"><?php echo form_error("company"); ?></span>
                        </div>
                      </div>

                      <div class="item form-group">

                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Company Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  name="address" required="required" class="form-control">
                          <span class="text-danger"><?php echo form_error("address"); ?></span>
                        </div>

                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Company Website<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="website">
                          <?php echo form_error("address"); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Registration </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div  class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Off &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female" class="join-btn"> On
                            </label>
                          </div>

                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Logo Picture (40x40) 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="date-picker form-control" required="required" type="file">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          
              
                          <button type="submit" class="btn btn-success">Save</button>
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