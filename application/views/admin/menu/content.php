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
                    <h2><?= $this->lang->line('topmenu') ?></h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= $url ?>admin/menu/createtop"><button class="btn btn-success"><?= $this->lang->line('create') ?> <?= $this->lang->line('topmenu') ?></button></a>
                    <a href="<?= $url ?>admin/menu/createsub"><button class="btn btn-success">
                      <?= $this->lang->line('create') ?> <?= $this->lang->line('submenu') ?></button></a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?= $this->lang->line('topmenu') ?></th>
                          <th><?= $this->lang->line('submenu') ?></th>
                          <th><?= $this->lang->line('process') ?></th>
                        </tr>
                      </thead>

                        <tbody>
                        <?php if($topmenu != ""){
                        $i=1; foreach ($topmenu as $key => $top) { ?>
                        <tr>
                          <th scope="row"><?= $i++  ?></th>
                          <td><?= $top->icon ?>
                            <?= $this->lang->line($top->name) ?></td>
                          
                          
                          <td>
                           

        <!-- sub menu -->
          <?php if($top->issub == 1){ ?>
                   <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $this->lang->line('submenu') ?></h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?= $this->lang->line('menu_name') ?></th>
                          <th><?= $this->lang->line('process') ?></th>
                        </tr>
                      </thead>

                     <tbody>
                        <?php if($submenu != ""){
                        $i=1; foreach ($submenu as $key => $sub) { 
                             if($sub->topid == $top->id){  ?>
                        <tr>
                          <th scope="row"><?= $i++  ?></th>
                          <td><?= $sub->name ?></td>
                          
                          
                          <td>
                            <a href="<?= $url ?>admin/department/edit/<?= $sub->id ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a onclick='return confirm("<?= $this->lang->line('want_delete') ?>")'
                              href="<?= $url ?>admin/department/delete/<?= $sub->id ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>

                          </td>
                        </tr>

                        <?php } }} ?>
                      
                      </tbody>
                      
                    </table>

                  </div>
                </div>

              <?php }else{ echo "Not sub menu"; } ?>

                <!-- sub menu finish -->

                           <td>
                            <a href="<?= $url ?>admin/department/edit/<?= $top->id ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a onclick='return confirm("<?= $this->lang->line('want_delete') ?>")'
                              href="<?= $url ?>admin/department/delete/<?= $top->id ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>

                          </td>
                            
                          </td>
                        </tr>

                        <?php } }?>
                      
                      </tbody>
                      
                    </table>

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