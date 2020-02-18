  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($company->logo != ""){ ?>
    <link rel="icon" href="<?= $url.$company->logo ?>" type="image/ico" />
    <?php }else{  ?>
    <link rel="icon" href="<?= $url  ?>assets/images/admin/default_logo.jpg" type="image/ico" />
    <?php } ?>
    <title><?= $title ?></title>

    <?php $this->load->view("admin/assets/css") ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= $url ?>admin/home" class="site_title">
                <?php if($company->logo != ""){ ?>
                <img style="width: 40px; height: 40px;" src="<?= $url.$company->logo ?>" class="img-responsive">
                <?php }else{  ?>
                  <img style="width: 40px; height: 40px;" src="<?= $url ?>assets/images/admin/default_logo.jpg" class="img-responsive">
                <?php } ?>
                <span><?= $company->name ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= $url.$user->image ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span><?= $this->lang->line("welcome") ?></span>
                <h2><?= $user->first_name ?></h2>
                <h2><?= $user->last_name ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />