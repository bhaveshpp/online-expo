<!-- PAGE CONTENT BEGINS -->
<?php //echo"<pre>";print_r($expo);die;?>
<?php 
$lable[1]='label-grey';
$lable[2]='label-success';
$lable[3]='label-danger';
$lable[4]='label-purple';
$lable[5]='label-yellow';
$lable[6]='label-pink';
$lable[7]='label-info';
?>
								<div class="row" >
									<div class="panel panel-primary" >
								            <div class="panel-heading">
								                <div class="row">
								                    <div class="text-left">
								                        <h2 class="center no-margin">
								                            Exhibitions
								                        </h2>
								                    </div>
								                </div>
								            </div>
								            <div class="panel-body">
								            	<div class="row">
													<div class="col-sm-9">
														<div class="space"></div>

														<div id="calendar"></div>
													</div>
													<div class="col-sm-3">
														<div class="widget-box transparent">
															<div class="widget-header">
																<h4>Published Exhibition</h4>
															</div>

															<div class="widget-body">
																<div class="widget-main no-padding">
																	<div id="external-events">
																		<?php $x=$n=1; foreach ($expo as $i) {?>
																		<div class="external-event <?php echo $lable[$n++];if ($n==7) {$n=1;}?>">
																			<i class="ace-icon fa fa-flag"></i>
																			<?php echo $x.' : Expo:-'.$i['title'];$x++;?>
																		</div>
																		<?php }$n=0;?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
								            <div class="panel-footer text-right"></div>
								    </div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content" style="background: #DBDBDB;">
						<span class="bigger-120">
							<span class="blue bolder">Expo</span>
							India &copy; 2017-2018
						</span>

						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {



	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		//firstDay: 1,// >> change first day of week 
		
		buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: [

<?php $n=1; foreach ($expo as $i) {?>
		  {
		  	expo_id: '<?php echo $i['id'];?>',
			title: '<?php echo 'Expo:-'.$i['title'];?>',
			start: moment("<?php echo $i['start_date'];?>").format('YYYY-MM-DD'),
			end: moment("<?php echo $i['end_date'];?>").format('YYYY-MM-DD'),
			className: '<?php echo $lable[$n++];if ($n==7) {$n=1;}?>'
		  },
<?php }?>
		]
		,
		
		eventClick: function(calEvent, jsEvent, view) {
			//alert(calEvent.expo_id);
		}
		
	});


})
		</script>
	</body>
</html>
