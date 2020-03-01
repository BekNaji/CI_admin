 <?php 

$this->load->view("admin/public/header");


$this->load->view("admin/public/nav");

$this->load->view("admin/public/contentheader");
  ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            
            <div class="clearfix"></div>
           
            <div class="row">
              <div class="col-md-12 col-sm-12 ">

             <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit <?= $this->lang->line('department') ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <a href="<?= $url ?>admin/department/index"><button class="btn btn-success"><?= $this->lang->line('department') ?> list</button></a>
                  <div class="x_content">
                     <?= @$alert; ?>

                      <form method="post" action="<?= $url ?>admin/department/update" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">


                      <input type="hidden" name="id" value="<?= $department->id ?>">


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><?=  $this->lang->line('department_name') ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?= $department->name ?>"  type="text" name="name" required="required" class="form-control ">
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
        <!-- /page content -->


        <?php 

$this->load->view("admin/public/footer");
         ?>

<script type="text/javascript">
  
</script>