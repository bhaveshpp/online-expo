<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Expo India - Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/img/logo-new.png">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<!-- for Calander -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.min.css" />

		<!-- End -->
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
		<!-- expo india custom -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/paging_style.css" />

		<!-- over -->
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>

	
	</head>

	<body class="skin-3">
		<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo site_url();?>" class="navbar-brand">
						<div>
							<img style="height: 25px;" src="<?php echo base_url();?>assets/home/img/logo-new.png" alt="EXPO_INDIA"> <span class='hidden-xs'> - ADMIN Dashboard</span>
						</div>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="red dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-users icon-animated-vertical"></i>
								<span class="badge badge-danger"><?php echo count($reg_exhibitor);?> Blocked Exhibitors</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-users"></i>
									Exhibitor
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<?php if(@$reg_exhibitor){foreach($reg_exhibitor as $i){?>
											<li>
												<a href="<?php echo site_url('admin/admin/view_exhibitor');?>" class="clearfix">
													<img src="<?php echo base_url();?>assets/web_images/exhibitor/<?php echo $i['image'];?>" class="msg-photo" alt="<?php echo $i['name'];?>" />
													<span class="msg-body">
														<span class="msg-title">
															<span class="blue"><?php echo $i['name'];?></span>
															I want to Login
														</span>

														<span class="msg-time">
															<i class="ace-icon fa fa-clock-o"></i>
															<span>a moment ago</span>
														</span>
													</span>
												</a>
											</li>
										<?php }}?>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="<?php echo site_url('admin/admin/view_exhibitor');?>">
										See all Exhibitor
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" alt="<?php echo strtoupper(@$data['name']);?>" src="<?php echo base_url();?>/assets/web_images/admin/<?php echo @$data['image'];?>"/>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo strtoupper(@$data['name']);?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url();?>/admin/Admin/change_password">
										<i class="ace-icon fa fa-key"></i>
										Change Password
									</a>
								</li>
								
								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url();?>/admin/Admin/profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url();?>/admin/Admin/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li class="<?php echo @$dashboard;?>">
						<a href="<?php echo site_url();?>/admin">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Manage Exhibitors </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/view_exhibitor/">
									<i class="menu-icon fa fa-caret-right"></i>
									View Exhibitors
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Manage Exhibitions
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
	
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/all_expo">
									<i class="menu-icon fa fa-caret-right"></i>
									View Exhibitions
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/view_up_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Upcomming Exhibitions
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/view_run_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Running Exhibitions
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/view_pre_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Previous Exhibitions
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>

					<li class="">
								<a href="<?php echo site_url();?>/admin/Category">
									<i class="menu-icon fa fa-filter"></i>
									Category
								</a>

								<b class="arrow"></b>
					</li>

					<li class="<?php echo @$tables;?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">Manage Locations</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url();?>/admin/State">
									<i class="menu-icon fa fa-caret-right"></i>
									State
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url();?>/admin/City">
									<i class="menu-icon fa fa-caret-right"></i>
									City
								</a>

								<b class="arrow"></b>
							</li>
							
							
			
						</ul>
					</li>


					<li class="<?php echo @$calender;?>">
						<a href="<?php echo site_url('admin/Admin/calender');?>">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Calendar

								<span class="badge badge-transparent tooltip-error" title="8 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo site_url('admin/Admin/view_photos');?>">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Gallery </span>
						</a>

					</li>

					<li class="<?php echo @$admin;?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">
								Administrators
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/add_admin">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Admin
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/admin/Admin/view_admin">
									<i class="menu-icon fa fa-caret-right"></i>
									View Admin
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->