<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{title}</title>
	<link type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href=".<?php echo base_url() ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url() ?>assets/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="<?php echo base_url() ?>">
			  		{logoname}
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="<?php echo base_url('login') ?>">
							Login
						</a></li>

						

						<li><a href="#">
							Forgot your password?
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST" 
					action="<?php echo base_url('login/registercontrol') ?>">
						<div class="module-head">
							<h3>Register</h3>
						</div>
						<div class="module-body">
							
							<div class="control-group">
								<div class="controls row-fluid">
									<span class="text-error"><?php echo form_error("first_name"); ?></span>
									<input value="<?php echo set_value('first_name'); ?>" name="first_name" class="span12" type="text" placeholder="First name">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<span class="text-error"><?php echo form_error("last_name"); ?></span>
									<input value="<?php echo set_value('last_name'); ?>" name="last_name" class="span12" type="text" placeholder="Last name">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<span class="text-error"><?php echo form_error("email"); ?></span>
									<input value="<?php echo set_value('email'); ?>" name="email" class="span12" type="text" placeholder="Email">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<span class="text-error"><?php echo form_error("password"); ?></span>
									<input value="<?php echo set_value('password'); ?>" name="password" class="span12" type="password"  placeholder="Password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									
									<?php echo @$captcha['image'] ?>
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<span class="text-error"><?php echo form_error("captcha_code"); ?></span>
									<span class="text-error"><?php echo @$captcha_code_error ?></span>
									<input name="captcha_code" class="span12" type="text"  placeholder="Captcha code">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Apply</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>