<?php if (@$statuszero) {?>
<script type="text/javascript">
	alert('You are not aproved by admin');
</script>
<?php }?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login - <?php echo $user;?></title>

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
								<div id="login-box" class="login-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter <?php echo ucfirst(@$user);?> Email
											</h4>
											<span class='red'><?php echo @$invalid;?></span>
											<div class="space-6"></div>

											<form method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" required name="email" class="form-control" placeholder="User Email" vlaue='<?php echo @$invalid;?>' autocomplete="off" style="<?php if(@$invalid){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>" />
															<i class="ace-icon fa 
																<?php if(@$err)
																		{
																			echo "fa-exclamation-circle";
																		}
																		else
																		{
																			echo "fa-envelope";
																		}
																?>"></i>
														</span>
														
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" required name="password" class="form-control" placeholder="Password" id="password" autocomplete="off" style="<?php if(@$invalid){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>" />
															<i class="ace-icon fa 
																<?php if(@$err)
																		{
																			echo "fa-exclamation-circle";
																		}
																		else
																		{
																			echo "fa-lock";
																		}
																?>"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" value="off" id="save"  class="ace" />
															<span class="lbl"> Show Password</span>
														</label>

														<button type="submit" name="login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="<?php echo site_url(@$user.'/Login/forgot');?>" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													forgot password
												</a>
											</div>

											<div>
												<a href="<?php echo site_url(@$user.'/Login/reg');?>" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

	
		<!-- inline scripts related to this page -->

		<script type="text/javascript">
		$(document).ready(function(e){
            $('#save').click(function(){
					if($('#save').attr('value')=='off')
					{
						$('#password').attr('type','text');
						$('#save').attr('value','on');	
					}
					else 
					{
						$('#password').attr('type','password');
						$('#save').attr('value','off');	
					}
				});
        });
</script>
</body>
</html>

