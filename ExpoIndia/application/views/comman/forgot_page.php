<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<?php
if(@$sendsuccess)
{ ?>
<script type="text/javascript">
	if(confirm('Your password send to your Email..'))
	{
		window.location="<?php echo site_url('customer');?>";
	}
</script>
<?php } ?>

<?php
if(@$connection)
{ ?>
<script type="text/javascript">
	if(confirm('Internet connection Problam..'))
	{
		window.location="<?php echo site_url('customer');?>";
	}
</script>
<?php } ?>
<?php if(@$email){?>
<script type="text/javascript">
	if(confirm('Your Email is not Registered......'))
	{
		window.location="<?php echo site_url('customer');?>";
	}
</script>
<?php }?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Forgot Password</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/img/logo-new.png">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<a href="<?php echo site_url();?>">
								<h1>
									<div class="logo">
										<img width="150px" src="<?php echo base_url();?>assets/home/img/logo-new.png" alt="" />
									</div>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Online Expo</h4>
								</a>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								
								<div id="forgot-box" class="forgot-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password<br>
												<i class="ace-icon fa fa-user"></i>
												For <?php echo ucfirst(@$user);?>
											</h4>

											<div class="space-6"></div>
											<p>
												<b>Enter your email and to receive Password</b>
											</p>

											<?php echo @$connection;?>
											<?php echo @$sendsuccess;?>
											<form method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" required class="form-control" placeholder="Email" name="email" autocomplete="off" style="<?php if(@$email){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="<?php echo site_url(@$user.'/Login');?>" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<!-- inline scripts related to this page -->

	</body>
</html>

