<?php 
	//echo "<pre>";print_r($upcoming_expo);die;
?>
	<?php foreach($expo as $i){{?>
	<div class="span3">
		<div class="home-post">
			<div class="post-image" 	>
				<img class="max-img" src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$i['image'];?>"  alt="" />
			</div>
			<div class="post-meta">
				<i class="fa fa-calendar icon-xl"></i>
				<span class="date" style="margin: 0;">
					<?php if(@$type=='run'){?>
						Last Date:<?php echo @$i['end_date'];?>
					<?php }else{?>
						Start Date:<?php echo @$i['start_date'];?>
					<?php }?>
				</span>
			</div>
			<div class="entry-content">
				<h5><strong><a href="#"><?php echo @$i['title'];?></a></strong></h5>
				<p>
					<div class="" style="overflow: auto; height: 100px;">
						<?php echo @$i['discription'];?>. &hellip;
					</div>
				</p>
				<a href="<?php echo site_url();?>/Exhibition/index/<?php echo @$i['id'];?>" class="more">Read more</a>
			</div>
		</div>
	</div>
	<?php }} ?>
