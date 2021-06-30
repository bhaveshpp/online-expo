








<?php 
	$lbl[1]='grey';
	$lbl[2]='orange';
	$lbl[3]='blue';
	$lbl[4]='red3';
	$type[1]='SILVER';
	$type[2]='GOLD';
	$type[3]='PLATINIUM';
	$type[4]='DIAMOND';
?>

<div class="row">

<?php foreach($stall_booking as $i){?>
	<?php foreach ($exhibition as $expo) {?>
		<?php if(($i['exhibition_id']==$expo['id'])){?>
			<?php foreach ($stall as $s) {?>
				<?php if(($i['exhibition_id']==$s['exhibition_id'])&&($i['cat_id']==$s['category_id'])){?>
				<div class="col-xs-6 col-sm-3 pricing-box">
					<div class="widget-box widget-color-<?php echo $lbl[$i['cat_id']];?>">
						<div class="widget-header">
							<h5 class="widget-title bigger lighter"><?php echo $type[$i['cat_id']];?></h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<ul class="list-unstyled spaced2">
									<li>
										<i class="ace-icon fa fa-check green"></i>
										Exihbition : <?php echo $expo['title'];?>
									</li>

									<li>
										<i class="ace-icon fa fa-check green"></i>
										Stall No : <?php echo $i['stall_no'];?>
									</li>

									<li>
										<i class="ace-icon fa fa-check green"></i>
										Size : <?php echo $s['length'];?> X <?php echo $s['width'];?>
									</li>

									<li>
										<i class="ace-icon fa fa-check green"></i>
										Date of Reg : <?php echo $i['date'];?>
									</li>

									<li>
										<i class="ace-icon fa fa-check green"></i>
										Price : <?php echo $s['price'];?>
									</li>

									<li>
										<i class="ace-icon fa fa-check green"></i>
										Registered 
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			<?php }?>
		<?php }?>
	<?php }?>
<?php }?>
<?php echo $page_link;?>
</div>


<?php require_once('footer.php');?>