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
                    <h2><?= $this->lang->line('user_list') ?></h2>
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
                          <th><?= $this->lang->line('first_name') ?></th>
                          <th><?= $this->lang->line('last_name') ?></th>
                          <th><?= $this->lang->line('email') ?></th>
                          <th><?= $this->lang->line('root') ?></th>
                          <th><?= $this->lang->line('user_picture') ?></th>
                          <th><?= $this->lang->line('process') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($users as $key => $value) { ?>
                        <tr>
                          <th scope="row"><?= $i++  ?></th>
                          <td><?= $value->first_name ?></td>
                          <td><?= $value->last_name ?></td>
                          <td><?= $value->email ?></td>
                          <td><?= $value->who ?></td>
                          <td><img class="img-responsive" style="width: 50px; height: 50px;" src="<?= $url.$value->image ?>"></td>
                          <td>
                            <a href="<?= $url ?>admin/user/edit/<?= $value->id ?>" class="btn btn-warning"><?= $this->lang->line('edit') ?></a>
                            <a href="<?= $url ?>admin/user/delete/<?= $value->id ?>" class="btn btn-danger"><?= $this->lang->line('delete') ?></a>

                          </td>
                        </tr>

                        <?php } ?>
                      
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