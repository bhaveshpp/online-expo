
<?php 
$n="";
$e="";
$m="";
if(@form_error('name'))
{
	$n=form_error('name');
}
 if(@form_error('email'))
{
	$e=form_error('email');
}
if(@form_error('mobile'))
{
	$m=form_error('mobile');
}

?>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">	
 $(function () {
        $("#fileimage").change(function () {
		 imagedisplay(this);
        });
    });
function imagedisplay(input) 
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#imgLogo').attr('src', e.target.result);
            $('#imgLogo').attr('style', 'display:blok;border-radius: 50%;border:5px solid green;');
            $('#imgLogo').attr('width', '120px');
            $('#imgLogo').attr('height', '120px');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
		<?php
if(@$sendsuccess)
{

?>
<script type="text/javascript">
	if(confirm('Your password send to your Email..'))
	{
		window.location="<?php echo site_url(@$user);?>";
	}
</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sign Up - <?php echo $user;?></title>

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
								<div id="signup-box" class="signup-box widget-box no-border visible ">
									<div class="widget-body">
										<div class="widget-main">
											<div style="text-align:center; ">
											 <img id="imgLogo" src="" style="display: none;" alt="Logo Image"  />
											</div>
											<b><h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New <?php echo ucfirst(@$user);?> Registration
											</h4>
											</b>
											<?php echo @$connection;?>
											
											<div class="space-6"></div>
											<form method="post" enctype="multipart/form-data">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required type="email" name="email" class="form-control" placeholder="Email" value="<?php  echo @$email ;?>" autocomplete="off" style="<?php if(@$invalid){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
														<?php echo @$exist;?>
														<span class="red"><?php echo @$e;?></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required type="text" class="form-control" name="name" placeholder="Username" value="<?php  echo @$name ;?>" autocomplete="off" style="<?php if(@$invalid){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
														<span class="red"><?php echo @$n;?></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="mobile" maxlength="10" required type="text" class="form-control" placeholder="Mobile Number" value="<?php  echo @$mobile ;?>" autocomplete="off" style="<?php if(@$invalid){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
														<span class="red"><?php echo @$m;?></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required type="file" id="fileimage"  name="image" class="form-control" style="<?php if(@$file_error){ ?> border-color:orange; background-color:rgba(215, 17, 13, 0.16);<?php } ?>" />
															<i class="ace-icon fa fa-photo"></i>
														</span>
														<?php echo @$file_error;?>
													</label>

													<label class="block">
														<input type="checkbox" required class="ace" />
														<span class="lbl">	
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="reg">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="<?php echo site_url(@$user.'/Login');?>" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
	
	</body>
</html>

