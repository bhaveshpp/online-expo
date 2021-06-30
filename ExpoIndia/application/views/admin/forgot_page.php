
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login - Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<style type="text/css"> 
		.field-icon {
		  float: right;
		  margin-left: -25px;
		  margin-top: -25px;
		  position: relative;
		  z-index: 2;
		}</style>


		<!-- bootstrap & fontawesome -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logo-new.png">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout">
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
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger" style="text-align:center;">
												Forgot Password
											</h4>

											<div class="space-6"></div>

											<form method="post">

												<fieldset>

													<label class="block clearfix">

														<span class="block input-icon input-icon-right">
															<input type="text" style=" <?php if(@$err){ ?> border-color:#FF0000; background-color:rgba(215, 17, 13, 0.16);<?php } ?>" name="email" autocomplete="off" class="form-control" placeholder="Username" />
															<i class="ace-icon fa 
																<?php if(@$err)
																		{
																			echo "fa-exclamation-circle";
																		}
																		else
																		{
																			echo "fa-user";
																		}
																?>"></i>
														</span>
													</label>

													<label class="block clearfix">

														<span class="block input-icon input-icon-right">
															<input type="password" id="password-field" name="password" class="form-control" placeholder="Password" autocomplete="off" style="<?php if(@$err){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>"/>
															<i toggle="#password-field" class="fa fa-eye field-icon toggle-password"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="space-6"></div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div style="float:right;"> 
												<a href="<?php echo site_url();?>" data-target="#signup-box" class="user-signup-link">
													Go To WebSite
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
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".toggle-password").click(function() {
					$(this).toggleClass("fa-eye fa-eye-slash");
  					var input = $($(this).attr("toggle"));
  					if (input.attr("type") == "password") {
    					input.attr("type", "text");
  					} else {
    					input.attr("type", "password");
  					}
				});
			});
		</script>
	</body>
</html>
