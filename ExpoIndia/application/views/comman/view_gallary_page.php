<?php //p($key);die;?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
<link href="<?php echo base_url();?>assets/home/my.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox.css">
<div class="panel panel-primary">
    <div class="panel-heading">
        Photo Gallary
    </div>
    <div class="panel-body">
	<div>
<?php foreach ($key as $k => $a) {$ar[$k]=$a['exhibition_id'];}?>
		<?php if(@$exhi){?>
		<?php foreach($exhi as $data){?>
		<?php if(in_array($data['id'],$ar)){?>
		<div class="row" >
			<div class="col-sm-12">
					<div class="widget-box ">
						<div class="widget-header">
							<h4 class="widget-title"><?php echo $data['title'];?></h4>

							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-<?php echo 'down';?>"></i>
								</a>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<?php if(@$key){?>
									<div class="row">
										<div class="col-xs-12">
											<!-- PAGE CONTENT BEGINS -->
											<div>
												<ul class="ace-thumbnails clearfix">
								
													<?php foreach ($key as $i ) {?>
														<?php if($i['exhibition_id']==$data['id']){?>
					
															<li>
																<a href="<?php echo base_url();?>assets/web_images/exhibition_images/<?php echo $i['name'];?>" data-lightbox="roadtrip">
																	<img alt="150x150" src="<?php echo base_url();?>assets/web_images/exhibition_images/<?php echo $i['name'];?>" width="150" height="150">
																	<div class="text">
																		<div class="inner">Click to View</div>
																	</div>
																</a>
																<?php if((@$user=='admin')||(@$user=='exhibitor')){?>
																<div class="tools tools-bottom">
									
																	<a href="<?php echo site_url($user.'/'.$user.'/delete_image/'.$i['exhibition_id'].'/'.$i['id']);?>">
																		<i class="ace-icon fa fa-times red">Delete</i>
																	</a>
																</div>
																<?php }?>
															</li>
														<?php }?>
													<?php }?>


													
												</ul>
											</div><!-- PAGE CONTENT ENDS -->
										</div><!-- /.col -->
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }}}?>

		</div>
<?php echo $page_link;?>
        <!-- /.row (nested) -->
    </div><!-- /.panel-body -->
</div><!-- /.panel -->





</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->

				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content" <?php if(@$user!='admin'){?> style="background-color: #222A2D; color: rgb(225,234,241);"<?php }?>>
						<span class="bigger-120">
							<span class="blue bolder">Expo</span>
							India &copy; 2017-2018
						</span>

						&nbsp; &nbsp;
						
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
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/spinbox.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/daterangepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.knob.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/autosize.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		<script type="text/javascript" src='<?php echo base_url();?>assets/js/lightbox-plus-jquery.min.js'></script>
		<script>
		    lightbox.option({
		      'resizeDuration': 300,
		      'wrapAround': true
    		})
		</script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			

			


				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',

					btn_choose: 'Drop images here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa-picture-o',
					droppable: true,
					thumbnail: 'small',//large | fit
			
					
					preview_error : function(filename, error_code) {
						
					}
			
				}).on('change', function(){
				
				});
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						});
					
				
				
				});
		
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})

			});
		</script>
	</body>
</html>
