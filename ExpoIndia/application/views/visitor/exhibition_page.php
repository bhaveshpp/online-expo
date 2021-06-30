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
	<link href="<?php echo base_url();?>assets/home/css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/color/default.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/my.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	
<!-- Icon ( Favicon )  -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/img/favicon-32x32.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.flipcountdown.css" />
	
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
					<a href="<?php echo site_url();?>"><img style="height: 60px;width: ;" src="<?php echo base_url();?>assets/home/img/logo-new.png" alt="EXPO"></a>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a href="<?php echo site_url();?>">Home</a></li>
							<li><a title="team" href="#about">About</a></li>
							<li><a title="services" href="#services">Counter</a></li>

<?php if(@$gallary){?>
							<li><a title="gallary" href="#gallary">Gallery</a></li>
<?php }?>
<?php if(@$category){?>
							<li><a title="stall" href="#blog">Stalls</a></li>
<?php }?>
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
	
	<!-- section: team -->
	<section id="about" class="section" style='padding-top:0;'>
		<div class="container">
			<div class="heading no-margin no-padding">
					<span class="main_heding"><font size="5px">ABOUT</font> <font size="5px" style="font-weight: 900;">EXHIBITION</font></span> <br>
					<h1 class="bg_chr">A</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
			</div>
			
			<div class="row">
				<div class="span4 offset1">
					<div>
						<table style="border:0px;">
							<tr>
								<td colspan="4"><h2>Starting After</h2></td>
							</tr>
							<tr>
								<td style="width:110px;text-align:center;">Days</td>
								<td style="width:120px;text-align:center;">Hours</td>
								<td style="width:110px;text-align:center;">Minutes</td>
								<td style="width:120px;text-align:center;">Seconds</td>
							</tr>
							<tr>
								<td colspan="4" style="text-align:center;"><span id="start_date"></span></td>
							</tr>
						</table>
						<h2>About <strong><?php echo @$cur_expo['title'];?></strong></h2>
						<p>
							<?php echo @$cur_expo['discription'];?>
						</p>
					</div>
					<div class="col-12">
						<h3>Start_Date : <?php echo @$cur_expo['start_date'];?></h3>
						
					</div>
					<div class="col-12">
						
						<h5>Ending_Date : <?php echo @$cur_expo['end_date'];?></h5>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
						<img src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @	$cur_expo['image'];?>" alt="" style="width: 350px;height: 300px;" />
					</div>
				</div>
			</div>
			
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->

	<!-- section: works -->
	
	<!-- section: services -->
	<section id="services" class="section orange" style="padding: 0px;">
		<div class="container">
			<div class="heading">
					<span class="main_heding"><font size="5px">TOP</font> <font size="5px" style="font-weight: 900;">COUNTER</font></span> <br>
					<h1 class="bg_chr">C</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
			<!-- Four columns -->
			<div class="row">
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
					
						<h2>Visitor</h2>
						<h1>
							<div id="counter">
						    	<div class="counter-value" data-count="<?php echo @$visitor;?>">0</div>
						    </div>
						</h1>
						<p>
							The total number of visitor of this perticuler Exhibition
						</p>
					</div>
				</div>
				<div class="span3 animated flyIn">
					<div class="service-box">
						
						<h2>Total Stalls</h2>
						<h1>
							<div id="counter">
							    <div class="counter-value" data-count="<?php echo @$cur_expo['stalls'];?>">0</div>
							</div>
						</h1>
						<p>
							The total number of stall in this perticuler Exhibition
						</p>
					</div>
				</div>
				<?php if(@$total_booked_stall){?>
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<h2>Booked Stalls</h2>
						<h1>
							<div id="counter">
							    <div class="counter-value" data-count="<?php echo @$total_booked_stall;?>">0</div>
							</div>
						</h1>
						<p>
							The total number of stalls that are booked by any Business
						</p>
					</div>
				</div>
				<div class="span3 animated-slow flyIn">
					<div class="service-box">
						<h2>Available Stalls</h2>
						<h1>
							<div id="counter">
							    <div class="counter-value" data-count="<?php echo @$cur_expo['stalls']-@$total_booked_stall;?>">0</div>
							</div>
						</h1>
						<p>
							The total number of stall that you can book Online
						</p>
					</div>
				</div>
				<?php }else{ ?>
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<h2>Booked Stalls</h2>
						<h1>
							<div id="counter">
							    <div class="counter-value" data-count="<?php echo @$total_booked_stall;?>">0</div>
							</div>
						</h1>
						<p>
							The total number of stalls that are booked by any Business
						</p>
					</div>
				</div>
				<div class="span3 animated-slow flyIn">
					<div class="service-box">
						<h2>Available Stalls</h2>
						<h1>
							<div id="counter">
							    <div class="counter-value" data-count="<?php echo @$cur_expo['stalls']-@$total_booked_stall;?>">0</div>
							</div>
						</h1>
						<p>
							The total number of stall that you can book Online
						</p>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>
	<!-- end section: services -->

	
	<!-- section: running Expo -->
<?php if((@$category) || (@$run_expo) || (@$gallary)){?>
	<?php if(@$gallary){?>

	<section id="gallary" class="section">
		<div class="container">
				<div class="heading">
					<span class="main_heding"><font size="5px">EXPO`s</font> <font size="5px" style="font-weight: 900;">GALLERY</font></span> <br>
					<h1 class="bg_chr">G</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>

				<div class="row">
					<?php if(@$gallary){?>
					<div class='gallery'>
					<?php foreach($gallary as $i){?>
				
						
								<a href="<?php echo base_url();?>assets/web_images/exhibition_images/<?php echo $i['name'];?>" data-lightbox="roadtrip"><img src="<?php echo base_url();?>assets/web_images/exhibition_images/<?php echo $i['name'];?>"></a>
							
					<?php }?>
					</div>
					<?php }?>
				</div>
			

				
	</section>
		<?php }?>
	<?php }?>

<?php if((@$category) || (@$run_expo) || (@$gallary)){?>
	<section id="blog" class="section">
		<div class="container">
				

					<?php if(@$category){?>
				<div class="heading">
					<span class="main_heding"><font size="5px">AVAILABAL </font> <font size="5px" style="font-weight: 900;">STALLS</font></span> <br>
					<h1 class="bg_chr">A</h1>
					<img src="<?php echo base_url();?>assets/home/img/icons/line.png" style="z-index: 2; transform: translate(-50%,40px);" class="main_heding">
				</div>
				<?php } ?>

			<!-- Three columns -->
			<div class="row">
				<?php if(@$category){?>
				<?php foreach($category as $i){?>
				<div class="span3">
					<div class="home-post">
						<div class="post-image" 	>
							<img class="max-img" src="<?php echo base_url();?>assets/web_images/stall_category/<?php echo $i['image'];?>" alt="" />
						</div>
						<div class="post-meta">
							<i class="fa fa-bank icon-xl"></i>
							<span><b><?php echo $i['length'];?></b></span>   <span  class="fa fa-times"></span>   <span><b><?php echo $i['width'];?></b></span>
						</div>
						<div class="entry-content">
							<h5><strong>Rs : <?php echo $i['price'];?></strong></h5>
							<h5><strong>Total-stall : <?php echo $i['stalls'];?></strong></h5>
							<a href="<?php echo site_url('Exhibition/book/'.$i['exhibition_id']."/".$i['category_id']);?>" class="btn btn-danger btn-block">Booking Now</a>

						</div>
					</div>
				</div>
				<?php }}?>
			</div>
		</div>	
	</section>
	<?php }?>


<!-- end spacer section -->
	<!-- section: contact -->
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="https://goo.gl/MJgppS" target="_blank"><i class="icon-circled icon-bgdark fa fa-google icon-2x"></i></a></li>
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
	<script src="<?php echo base_url();?>assets/home/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/getcity.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/getcategory.js"></script>
	<script type="text/javascript" src='<?php echo base_url();?>assets/js/lightbox-plus-jquery.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/jquery.flipcountdown.js"></script>

		<script>
		    lightbox.option({
		      'resizeDuration': 300,
		      'wrapAround': true
    		})
		</script>
</body>

</html>



<script type="text/javascript">
	var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
</script>
	
	<script>
	jQuery(function($){
		//var NY = Math.round((new Date('1/01/2015 00:00:01')).getTime()/1000);
		$('#start_date').flipcountdown({
			size:'sm',
			beforeDateTime:'<?php echo @$cur_expo['start_date'];?> 00:00:01'
		});
	});
	</script>
