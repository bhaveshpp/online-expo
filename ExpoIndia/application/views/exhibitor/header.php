<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Expo India - Exhibitor</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & font awesome -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/img/logo-new.png">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<!-- for Calander -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css" />
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

	<body class="skin-1">
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
							<img style="height: 25px;" src="<?php echo base_url();?>assets/home/img/logo-new.png" alt="EXPO_INDIA"> <span class='hidden-xs'> - Exhibitor Dashboard</span>
						</div>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" alt="<?php echo strtoupper(@$data['name']);?>" src="<?php echo base_url();?>/assets/web_images/exhibitor/<?php echo @$data['image'];?>"/>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo strtoupper(@$data['name']);?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li class="divider"></li>
								
								<li>
									<a href="<?php echo site_url();?>/exhibitor/Exhibitor/change_password/<?php echo @$data['id'];?>">
										<i class="ace-icon fa fa-key"></i>
										Change Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url();?>/exhibitor/Exhibitor/profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url();?>/exhibitor/Exhibitor/logout">
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
					<li class="">
						<a href="<?php echo site_url();?>/exhibitor/Exhibitor">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Manage Exhibition
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
	
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/add_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Exhibition
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/view_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									All Exhibition
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/view_up_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Upcomming Exhibition
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/view_run_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Running Exhibition
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/view_pre_exhibition">
									<i class="menu-icon fa fa-caret-right"></i>
									Previous Exhibition
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>

					

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Manage Stalls </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('exhibitor/Exhibitor/price_list')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Stall
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('exhibitor/Exhibitor/stall_view')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									View Satlls (All)
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url('exhibitor/Exhibitor/stall_up_view')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									View Satlls(Upcomming Expo)
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url('exhibitor/Exhibitor/stall_run_view')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									View Satlls(Running Expo)
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url('exhibitor/Exhibitor/stall_pre_view')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									View Satlls(Previous Expo)
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>


					<li class="">
						<a href="<?php echo site_url('exhibitor/Exhibitor/calender');?>">
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
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Gallery </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
	
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/add_photos">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Photos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url();?>/exhibitor/Exhibitor/view_photos">
									<i class="menu-icon fa fa-caret-right"></i>
									View Photos
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