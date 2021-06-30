<?php
//echo "<pre>";print_r($running_expo);die;
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>EXPO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="<?php echo base_url();?>assets/home/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/color/default.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/my.css" rel="stylesheet">
	<!-- icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/img/favicon-32x32.png">
	<script src="<?php echo base_url();?>assets/js/web_script.js"></script>
</head>

<body>
	
	<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
					<a href="#"><img style="height: 60px;width: ;" src="<?php echo base_url();?>assets/home/img/logo-new.png" alt="EXPO"></a>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="team" href="#about">
							
								About
							</a></li>
							<li><a title="services" href="#services">
									
								Services
							</a></li>
							<li><a title="works" href="#works">
								<i class='fa fa-image'></i>
								Expo
							</a></li>
							<li><a title="blog" href="#blog">
								<i class='fa fa-calendar'></i>
								Exhibition
							</a>
							</li>
							<!-- <li><a title="contact" href="#contact">Contact</a></li> -->
							<li>
								<?php if($this->session->userdata('exhibitor_id')==''){?>
								<a href="<?php echo site_url('exhibitor/Login');?>" class="btn btn-warnning">
									<i class='fa fa-bullhorn'></i>
									Exhibit
								</a>
								<?php }else{?>
								<a href="<?php echo site_url('exhibitor/Login');?>" class="btn btn-warnning">
									<i class='fa fa-dashboard'></i>
									Dashboard-exhibitor
								</a>
								<?php }?>
							</li>
							<li>
								<?php if($this->session->userdata('customer_id')==''){?>
								<a href="<?php echo site_url('customer/Login');?>" class="btn btn-success">
									<i class='fa fa-user'></i>
									Sign in
								</a>
								<?php }else{?>
								<a href="<?php echo site_url('customer/Login');?>" class="btn btn-success">
									<i class='fa fa-dashboard'></i>
									Dashboard-customer
								</a>
								<?php }?>
							</li>
							
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	<div id="header-wrapper" class="header-slider">
		<header class="clearfix">
			<div class="logo">
				<img width="150px" height="150px" src="<?php echo base_url();?>assets/home/img/logo.png" alt="" />
			</div>
			<div class="container">
				<div class="row">
				
						<div id="main-flexslider" class="flexslider">
							<ul class="slides">
								<li>
									<p class="home-slide-content">
										FUTURE EXPO!
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										AWESOME WORK
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										CUSTOMER SERVICE
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										TOP CATEGORY
									</p>
								</li>
							</ul>
						</div>
						<!-- end slider -->
				</div>
			</div>
		</header>
	</div>
	<!-- spacer section -->
	<?php if(@$city){?>
	<section class="spacer green">
		<div class="container">
			<div class="row">
				<div class="heading">
					<span class="main_heding"><font size="5px">TOP</font> <font size="5px" style="font-weight: 900;">CITY</font></span> <br>
					<h1 class="bg_chr">C</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
					<div class="owl-carousel owl-theme">
						
						<?php foreach($city as $i){?>
						<div class="item">
							<div class="span2 offset1 flyIn">
								<div class="people">
									<img class="team-thumb img-circle" src="<?php echo base_url();?>assets/web_images/city/<?php echo $i['image'];?>" alt="City" />
									<h3><?php echo $i['name'];?></h3>
									
								</div>
							</div>
						</div><!-- item -->
						<?php }?>
					</div><!-- ovl -->
				</div>
		</div>
	</section> 
	<?php }?>
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">ABOUT</font> <font size="5px" style="font-weight: 900;">US</font></span> <br>
					<h1 class="bg_chr">A</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
			</div>
			<h4>Who We Are...</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2>What Is <strong>Expo India</strong></h2>
						<p>
							• Our approach with the online expo system was based on our continuing work on the web and takes advantage of latest technical changes as well as recognizing the fundamental change in the way a potential audience encounters and interacts with new ideas.<br>
							• We combine traditional exhibition rules with elements of social and professional networks, a homepage and a web-shop. Visitors can get acquainted with the exhibitors without leaving their home or office.
						</p>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
						<img src="<?php echo base_url();?>assets/home/img/icons/creativity2.png" alt="" style="width: 350px;height: 300px;" />
					</div>
				</div>
			</div>
			
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->
	<!-- section: services -->
	<section id="services" class="section orange">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">TOP</font> <font size="5px" style="font-weight: 900;">SERVICE</font></span> <br>
					<h1 class="bg_chr">S</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- Four columns -->
			<div class="row">
				<div class="span3 animated-slow flyIn">
					<div class="service-box">
						<img src="<?php echo base_url();?>assets/home/img/icons/basket.png" alt="" />
						<h2>Visitor Ranking	</h2>
						<p>
							You can see how many Customer and Visitor Visit Our Site
						</p>
					</div>
				</div>
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="<?php echo base_url();?>assets/home/img/icons/laptop.png" alt="" />
						<h2>Online Registaration</h2>
						<p>
							Customer and Exhibitor Can Register online...
						</p>
					</div>
				</div>
				<div class="span3 animated flyIn">
					<div class="service-box">
						<img src="<?php echo base_url();?>assets/home/img/icons/stall.png" alt="" style='height: 160px;width: 160px;' />
						<h2>Online Stall Booking</h2>
						<p>
							Customer / Businesses can book a Stall Online...
						</p>
					</div>
				</div>
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="<?php echo base_url();?>assets/home/img/icons/camera.png" alt="" />
						<h2>Free Advertisement</h2>
						<p>
							All the Published Exhibition are Display on Oue site...
						</p>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- end section: services -->
	<!-- section: works -->
<?php if(@$category){?>
	<section id="works" class="section">
		<div class="container clearfix">
			<div class="heading">
					<span class="main_heding"><font size="5px">TOP</font> <font size="5px" style="font-weight: 900;">CATEGORY</font></span> <br>
					<h1 class="bg_chr">C</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- portfolio filter -->
			<div class="row">
				<div id="filters" class="span12">
					<ul class="clearfix">
						<li>
							<a href="#" data-filter="*" class="active">
								<h5>All</h5>
							</a>
						</li>
						<?php foreach($category as $i){?>
						<li>
							<a href="#" data-filter=".<?php echo @$i['id'];?>">
								<h5><?php echo strtoupper(@$i['name']);?></h5>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- END PORTFOLIO FILTERING -->
			</div>
			<div class="row">
				<div class="span12">
					<div id="portfolio-wrap">
						<?php if(@$exhibition){?>
						<?php foreach($exhibition as $i){?>
						
						<!-- portfolio item -->
						<div class="portfolio-item grid print <?php echo @$i['category'];?>">
							<div class="portfolio">
								<a href="<?php echo site_url();?>/Exhibition/index/<?php echo @$i['id'];?>" target="_blank">
						<img src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$i['image'];?>" alt=""  />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5><?php echo @$i['title'];?></h5>
								<i class="fa fa-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->

						<?php }/* expo */}/* if upp_expo*/ ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }/*if category*/ ?>


	<!-- section: running Expo -->
<?php if(@$running_expo){?>
	<section id="blog" class="section">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">RUNNING</font> <font size="5px" style="font-weight: 900;">EXPO</font></span> <br>
					<h1 class="bg_chr">R</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- Three columns -->
			<div class="row" id="ajax_run_expo">
				<?php foreach($running_expo as $i){?>
				<div class="span3">
					<div class="home-post">
						<div class="post-image" 	>
							<img class="max-img" src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$i['image'];?>"  alt="" />
						</div>
						<div class="post-meta">
							<i class="fa fa-calendar icon-xl"></i>
							<span class="date" style="margin: 0;">Last Date:<?php echo @$i['end_date'];?></span>
						</div>
						<div class="entry-content">
							<h5><strong><a href="#"><?php echo @$i['title'];?></a></strong></h5>
							<p>
								<div class="" style="overflow: auto; height: 100px;">
									<?php echo @$i['discription'];?>. &hellip;
								</div>
								

							</p>
							<a href="<?php echo site_url();?>/Exhibition/index/<?php echo @$i['id'];?>/running" class="more" target="_blank">
								<span class='btn btn-block btn-info'>More Information
								</span>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="blankdivider30"></div>
			<div class="aligncenter">
				<p class="btn btn-large btn-theme" id="ajax_run">More Exhibitions</a>
			</div>
		</div>
	</section>
<?php } ?>
	<!-- end spacer section -->
	<!-- section: upcomming Expo -->
<?php if(@$upcoming_expo){?>
	<section id="blog" class="section">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">UPCOMMING</font> <font size="5px" style="font-weight: 900;">EXPO</font></span> <br>
					<h1 class="bg_chr">U</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- Three columns -->
			<div class="row" id="ajax_up_expo">
				<?php foreach($upcoming_expo as $i){?>
				<div class="span3">
					<div class="home-post">
						<div class="post-image" 	>
							<img class="max-img" src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$i['image'];?>"  alt="" />
						</div>
						<div class="post-meta">
							<i class="fa fa-calendar icon-xl"></i>
							<span class="date"  style="margin: 0;">Start Date:<?php echo @$i['start_date'];?></span>
						</div>
						<div class="entry-content">
							<h5><strong><a href="#"><?php echo @$i['title'];?></a></strong></h5>
							<p>
								<div class="" style="overflow: auto; height: 100px;">
									<?php echo @$i['discription'];?>. &hellip;
								</div>
								
							</p>
							<a href="<?php echo site_url();?>/Exhibition/index/<?php echo @$i['id'];?>" class="more" target="_blank"><span class='btn btn-block btn-info'>More Information</span></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="blankdivider30"></div>
			<div class="aligncenter">
				<p class="btn btn-large btn-theme" id="ajax_up">More Exhibitions</a>
			</div>
		</div>
	</section>
<?php }?>
<!-- end spacer section -->
	
	<!-- section: upcomming Expo -->
<?php if(@$previous_expo){?>
	<section id="blog" class="section">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">PREVIOUS</font> <font size="5px" style="font-weight: 900;">EXPO</font></span> <br>
					<h1 class="bg_chr">U</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- Three columns -->
			<div class="row" id="ajax_pre_expo">
				<?php foreach($previous_expo as $i){?>
				<div class="span3">
					<div class="home-post">
						<div class="post-image" 	>
							<img class="max-img" src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$i['image'];?>"  alt="" />
						</div>
						<div class="post-meta">
							<i class="fa fa-calendar icon-xl"></i>
							<span class="date"  style="margin: 0;">
								Start Date:<?php echo @$i['start_date'];?>
							</span><br><br>
							<i class="fa fa-calendar icon-xl"></i>
							<span class="date"  style="margin: 0;">
								End Date:<?php echo @$i['end_date'];?>
							</span>
						</div>
						<div class="entry-content">
							<h5><strong><a href="#"><?php echo @$i['title'];?></a></strong></h5>
							<p>
								<div class="" style="overflow: auto; height: 100px;">
									<?php echo @$i['discription'];?>. &hellip;
								</div>
								
							</p>
							<a href="<?php echo site_url();?>/Exhibition/index/<?php echo @$i['id'];?>/pre" class="more" target="_blank"><span class='btn btn-block btn-info'>More Information</span></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="blankdivider30"></div>
			<div class="aligncenter">
				<p class="btn btn-large btn-theme" id="ajax_pre">More Exhibitions</a>
			</div>
		</div>
	</section>
<?php }?>
<!-- end spacer section -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="https://goo.gl/MJgppS" target="_blank"><i class="icon-circled icon-bgdark fa fa-google-plus icon-2x"></i></a></li>
						<li><a href="https://goo.gl/bGC6wY" target="_blank"><i class="icon-circled icon-bgdark fa fa-instagram icon-2x"></i></a></li>
						<li><a href="https://goo.gl/18jrWi" target="_blank"><i class="icon-circled icon-bgdark fa fa-twitter icon-2x"></i></a></li>
						
					</ul>
					<p class="copyright">
						&copy; Expo India. All rights reserved.
					</p>
				</div>
			</div>
		</div>
		<!-- ./container -->
		<input type="hidden" id="start_running" value="4">
		<input type="hidden" id="start_upcomming" value="4">
		<input type="hidden" id="start_previous" value="4">

	</footer>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="<?php echo base_url();?>assets/home/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/jquery.scrollTo.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/jquery.nav.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/jquery.localScroll.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/jquery.prettyPhoto.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/isotope.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/jquery.flexslider.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/inview.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/animate.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/custom.js"></script>
	<script src="<?php echo base_url();?>assets/home/contactform/contactform.js"></script>
	<script src="<?php echo base_url();?>assets/home/owlcarousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/getcity.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/getcategory.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#ajax_up").click(function () {

				start_upcomming = $('#start_upcomming').val();

				$.ajax({
	                type:'POST',
	                url:"<?php echo site_url('Exhibition/select_up_expo');?>",
	                data:
	                {
	                    start:start_upcomming
	                    
	                },
	                success:function(data)
	                {
	                	$('#start_upcomming').val(parseInt(start_upcomming)+4);
	                    $('#ajax_up_expo').append(data);
	                }
            	});
			});
			$("#ajax_run").click(function () {
				start_running = $('#start_running').val();
				$.ajax({
	                type:'POST',
	                url:"<?php echo site_url('Exhibition/select_run_expo');?>",
	                data:
	                {
	                    start:start_running
	                },
	                success:function(data)
	                {
	                	$('#start_running').val(parseInt(start_running)+4);
	                    $('#ajax_run_expo').append(data);
	                }
            	});
			});
			
			$("#ajax_pre").click(function () {
				start_previous = $('#start_previous').val();
				$.ajax({
	                type:'POST',
	                url:"<?php echo site_url('Exhibition/select_pre_expo');?>",
	                data:
	                {
	                    start:start_previous
	                },
	                success:function(data)
	                {
	                	$('#start_previous').val(parseInt(start_previous)+4);
	                    $('#ajax_pre_expo').append(data);
	                }
            	});
			});
		});
	</script>

</body>

</html>