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
                    <h2><?= $this->lang->line('department') ?></h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= $url ?>admin/department/create"><button class="btn btn-success"><?= $this->lang->line('create') ?></button></a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?= $this->lang->line('department_name') ?></th>
                          <th><?= $this->lang->line('process') ?></th>
                        </tr>
                      </thead>
                      
                        <tbody>
                        <?php if($department != ""){
                        $i=1; foreach ($department as $key => $value) { ?>
                        <tr>
                          <th scope="row"><?= $i++  ?></th>
                          <td><?= $value->name ?></td>
                          
                          
                          <td>
                            <a href="<?= $url ?>admin/department/edit/<?= $value->id ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a onclick='return confirm("<?= $this->lang->line('want_delete') ?>")'
                              href="<?= $url ?>admin/department/delete/<?= $value->id ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>

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