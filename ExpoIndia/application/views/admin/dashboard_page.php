<!-- header End -->
<!-- PAGE CONTENT BEGINS -->
			
							

								<div class="row">
									<div class="space-24"></div>

									<div class="col-sm-9 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo @$exhibitor;?></span>
												<div class="infobox-content">Total Exhibitors</div>
											</div>

											
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-google-plus-square"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number googlefollowercount">11</span>
												<div class="infobox-content"> followers</div>
											</div>

										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo @$customer;?></span>
												<div class="infobox-content">Customers</div>
											</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-user"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo @$visitors;?></span>
												<div class="infobox-content">Visitors</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo @$visits;?></span>
												<div class="infobox-content">pageviews</div>
											</div>

										</div>

										<div class="infobox infobox-blue2">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="<?php echo ceil(@$precentage);?>" data-size="46">
													<span class="percent"><?php echo ceil(@$precentage);?></span>%
												</div>
											</div>

											<div class="infobox-data">
												<span class="infobox-text"></span>

												<div class="infobox-content">
													
													Published Expo
												</div>
											</div>
										</div>

										<div class="space-6"></div>

										
									</div>

									
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									

									
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box transparent" id="recent-box">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													<i class="ace-icon fa fa-users orange"></i>Users
												</h4>

												<div class="widget-toolbar no-border">
													<ul class="nav nav-tabs" id="recent-tab">
									
														<li class="active">
															<a data-toggle="tab" href="#member-tab">Exhibitor</a>
														</li>

													
													</ul>
												</div>
											</div>

											<div class="widget-body" >
												<div class="widget-main padding-4" >
													<div class="tab-content padding-8" >
														

														<div id="member-tab" class="tab-pane active" >
															<div class="clearfix" >
									
																<?php if(@$all_exhibitor){?>
																<?php foreach($all_exhibitor as $i){?>
																	<?php if(@$i['status']==0){?>
																		<div class="itemdiv memberdiv">
																			<div class="user">
																				<img alt="<?php echo @$i['name'];?>" src="<?php echo base_url();?>assets/web_images/exhibitor/<?php echo @$i['image'];?>" />
																			</div>

																			<div class="body">
																				<div class="name">
																					<a href="#"><?php echo @$i['name'];?></a>
																				</div>

																				<div class="time">
																					<i class="ace-icon fa fa-clock-o"></i>
																					<span class="green">3 hour</span>
																				</div>

																				<div>
																					<span class="label label-danger label-sm">blocked</span>
																				</div>
																			</div>
																		</div>

																	<?php }else{?>
																		<div class="itemdiv memberdiv">
																			<div class="user">
																				<img alt="<?php echo @$i['name'];?>" src="<?php echo base_url();?>assets//web_images/exhibitor/<?php echo @$i['image'];?>" />
																			</div>

																			<div class="body">
																				<div class="name">
																					<a href="#"><?php echo @$i['name'];?></a>
																				</div>

																				<div class="time">
																					<i class="ace-icon fa fa-clock-o"></i>
																					<span class="green">6 hour</span>
																				</div>

																				<div>
																					<span class="label label-success label-sm arrowed-in">approved</span>
																				</div>
																			</div>
																		</div>
																	<?php }?>
																<?php }}?>
															</div>

															<div class="space-4"></div>

															<div class="center">
																<i class="ace-icon fa fa-users fa-2x green middle"></i>

																&nbsp;
																<a href="<?php echo site_url();?>/admin/Admin/view_exhibitor" class="btn btn-sm btn-white btn-info">
																	See all Exhibitor &nbsp;
																	<i class="ace-icon fa fa-arrow-right"></i>
																</a>
															</div>

															<div class="hr hr-double hr8"></div>

															<div class="hr hr8"></div>

														
															<div class="hr hr-double hr8"></div>
														</div><!-- /.#member-tab -->

													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									<div class="col-sm-6">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Payment From Exhibitor
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Exhibitor
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Exhibiton
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Amount
																</th>
															</tr>
														</thead>

														<tbody>
															<?php if(@$payment){?>
															<?php foreach($payment as $key){?>
															<tr>
																<td><?php echo @$key['name'];?></td>

																<td>
																	<span class=""><?php echo @$key['title'];?></span>
																</td>

																<td class="hidden-480">
																	<b class="green"><?php echo @$key['price'];?></b>
																</td>
															</tr>
															<?php }}?>
															<tr>
																<td colspan="3"><?php echo $page_link;?></td>
															</tr>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

								</div><!-- /.row -->

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
							India &copy; <?php echo date('Y'); ?>-<?php echo date('Y')+1; ?>
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

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.sparkline.index.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
		<script>
			var profileid = '109132294594424993359';
			var apikey = 'AIzaSyAqlZ1MJSGXMSs8q5WbfvLpZTGJeHLVc2w';
			var url = 'https://www.googleapis.com/plus/v1/people/' + profileid + '?key=' + apikey;
			$.ajax({
			    type: "GET",
			    dataType: "json",
			    url: url,
			    success: function (data) {
			        var googlefollowcount = data.circledByCount;
			        /*alert(data);alert(JSON.stringify(data,null, 4));*/
			        $(".googlefollowercount").html(googlefollowcount);
			    }
			});
		</script>
	</body>
</html>
