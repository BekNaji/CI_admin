 <?php 

$this->load->view("admin/public/header");


$this->load->view("admin/public/nav");

$this->load->view("admin/public/contentheader");
  ?>

 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->


          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

              <div>
                <h1>Hellow World</h1>
                <?php print_r($topmenu); ?>
                <hr>
                <?php print_r($submenu) ?>
              </div>

            </div>
            </div>

          </div>
          <br />



        </div>
        <!-- /page content -->

                <?php 

$this->load->view("admin/public/footer");
         ?>