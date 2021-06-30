<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
<div class="panel panel-primary">
    <div class="panel-heading">
        Photo Gallery
    </div>
    <div class="panel-body">
        <div class="row">
        	<h1 class='blue center'>For published Exhibition Only</h1>
            <div class="col-lg-12">
				<form method="post" enctype="multipart/form-data">
                <div class="form-group" style="">
							<div class="col-xs-12">
							
									<label for="form-field-select-3">Chosen</label>

									<br />
									<select required name="ex" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
										<option value="">Select Exhibition</option>
										<?php foreach($exhi as $i){?>
											<?php if($i['status']==1){?>
												<option value="<?php echo $i['id']?>">
													<?php echo $i['title'];?>
												</option>
											<?php }?>
										<?php } ?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label for="form-field-select-3">Choose More Images</label>
							<div class="col-xs-12">

								<input required multiple="" type="file"  name="file[]" id="id-input-file-3" />
							</div>

						</div>
						<label>
						</label>
						<div class="form-group">
							<label for="form-field-select-3">Upload Photos</label>
							<div style="text-align:center; " class="col-xs-12">
								
								<button class="btn btn-info" type="submit" name="save"  value="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
							</div>
						</div>
						<label>
						</label>
						</form>
            </div><!-- /.col-lg-6 (nested) -->
        </div><!-- /.row (nested) -->
    </div><!-- /.panel-body -->
</div><!-- /.panel -->


</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->

				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner" >
					<div class="footer-content" style="background-color: #222A2D; color: rgb(225,234,241);">
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
