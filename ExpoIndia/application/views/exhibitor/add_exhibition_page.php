
							<!-- PAGE CONTENT BEGINS -->
							 	

								<div class="widget-box">

									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">New Exhibition Wizard</h4>
									</div>

									<div class="widget-body">

										<div class="widget-main">

											<div id="fuelux-wizard-container">

												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Exhibition Details</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Contect Details</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Date & Time</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Other Info</span>
														</li>
													</ul>
												</div>

												<hr />

												<div class="step-content pos-rel">

													<div class="step-pane active" data-step="1">
														
														<div class="row">
						                                    <div class="col-lg-12">
						                                            
						                                        <form method="post" enctype="multipart/form-data" role="form">    
						                                        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12">
						                                            <div class="form-group input-group <?php if(@form_error('title')){ echo'has-error';}?>">
						                                                <span class="input-group-addon"><i class="fa fa-user"> Title</i></span>
						                                                <input type="text" required name="title" value="<?php echo @$set_title;?>" class="form-control" placeholder="Exhibition Title" autocomplete="off">
						                                            </div>
						                                            <span style="color: red;">
						                                            	<?php echo form_error('title');?>
						                                            </span>
						                                        </div>

						                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						                                            <div class="form-group input-group <?php if(@form_error('stalls')){ echo'has-error';}?>">
						                                                <span class="input-group-addon">
						                                                	<i class="fa fa-home"> Stalls</i>
						                                                </span>
						                                                <input type="text" required name="stalls" class="form-control" value="<?php echo @$stalls;?>" placeholder="Number Of Stall" autocomplete="off">
						                                            </div>
						                                            <span style="color: red;">
						                                            	<?php echo form_error('stalls');?>
						                                            </span>
						                                        </div>

						                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						                                        	<div class="form-group <?php if(@form_error('category')){ echo'has-error';}?>">
						                                                <span class="input-group-addon" style="border-right: 1px solid #ccc;">
						                                                	<i class="fa fa-user"> Category</i>
						                                                </span>
						                                                
						                                                <select required class="form-control" name="category">
																            <option value="">Category</option>

																            <?php foreach($category as $row){?>

															                <option value="<?php echo @$row['id'];?>" <?php if(@$set_category==@$row['id']){echo 'selected';}?> ><?php echo @$row['name'];?>
															                </option>

																            <?php }?>
																        </select>
						                                                <span style="color: red;">
						                                                	<?php echo form_error('category');?>
						                                                </span>
						                                            </div>
						                                        </div>

						                                    </div><!-- /.col-lg-12 (nested) -->
						                                </div><!-- /.row (nested) -->
													</div>

													<div class="step-pane" data-step="2">
														<div>
															<div class="row">
							                                    <div class="col-lg-12">
							                                        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12">
							                                        
									                                        <div class="form-group input-group <?php if(@form_error('helpline')){ echo'has-error';}?>">

									                                                <span class="input-group-addon">
									                                                	<i class="fa fa-info"> Helpline</i>
									                                                </span>
									                                                <input required type="text" name="helpline" class="form-control" placeholder="Helpline Number" id="phone" value="<?php echo @$helpline;?>">
									                                        </div>
									                                        <span style="color: red;">
									                                         	<?php echo form_error('helpline');?>
									                                        </span>
								                                            
								                                         	<div class="form-group <?php if(@form_error('state')){ echo'has-error';}?>">
								                                                <span class="input-group-addon" style="border-right: 1px solid #ccc;">
								                                                	<i class="fa fa-user"> State</i>
								                                                </span>
								                                                
								                                                   
								                                                <select required class="form-control"  name="state" id="state">
								                                                    <option value="">State</option>

								                                                    <?php foreach($state as $row){?>
								                                                    <option value="<?php echo @$row['id'];?>" <?php if(@$set_state==@$row['id']){echo 'selected';}?>>
								                                                     	<?php echo @$row['name'];?>
								                                                    </option>
								                                                    <?php }?>
								                                                </select>
								                                                <span style="color: red;">
								                                                	<?php echo form_error('state');?>
								                                                </span>
								                                            </div>

								                                            <div class="form-group <?php if(@form_error('city')){ echo'has-error';}?>">
								                                                <span class="input-group-addon" style="border-right: 1px solid #ccc;">
								                                                	<i class="fa fa-user"> City</i>
								                                                </span>
								                                                
								                                                <select required id="city" class="form-control" name="city">
																				    <option value="">Select City</option>
																				    <?php foreach($city as $row){?>
																				    <option value="<?php echo @$row['id'];?>"  <?php if(@$set_city==@$row['id']){echo 'selected';}?> ><?php echo @$row['name'];?>
																				    </option>
																				    <?php }?>
																				</select>
								                                                <span style="color: red;">
								                                                	<?php echo form_error('city');?>
								                                                </span>
								                                            </div>
							                                        </div>
							                                        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12">
							                                            
							                                            <div class="form-group input-group <?php if(@form_error('address')){ echo'has-error';}?>">
							                                                <span class="input-group-addon">
							                                                	<i class="fa fa-map-marker"> Address</i>
							                                                </span>
							                                                <textarea required class="form-control" name="address" placeholder="Exhibition Address" style="height: 85px;"><?php echo @$set_address;?></textarea>
							                                            </div>
							                                            <span style="color: red;">
							                                            	<?php echo form_error('address');?>
							                                            </span>
							                                        </div>
							                                    </div><!-- /.col-lg-12 (nested) -->
							                                </div><!-- /.row (nested) -->
							                            </div>
													</div>

													<div class="step-pane" data-step="3">

														<div>
				
							                                <div class="row">
							                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12	">
							                                        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12">
							                                            
							                                            <div class="form-group input-group <?php if(@form_error('start_date')){ echo'has-error';}?>">

							                                                <span class="input-group-addon">
							                                                	<i class="fa fa-calendar"> Starting Date</i>
							                                                </span>
							                                                <input required type="date" id="start_date" name="start_date" class="form-control" placeholder="Exhibition Start Date" value="<?php echo @$start_date;?>" oninvalid="alert('You must fill out the form!');"/>
							                                            </div>
							                                            <span style="color: red;">
							                                            	<?php echo form_error('start_date');?>
							                                            </span>
							                                    
							                                            <div class="form-group input-group <?php if(@form_error('end_date')){ echo'has-error';}?>">
							                                                
							                                                <span class="input-group-addon">
							                                                	<i class="fa fa-calendar"> Ending Date</i>
							                                                </span>
							                                                <input required type="date" id="end_date" name="end_date" class="form-control" placeholder="Exhibition End Date"
							                                                value="<?php echo @$end_date;?>" oninvalid="alert('You must fill out the form!');"/>
							                                            </div>
							                                            <span style="color: red;">
							                                            	<?php echo form_error('end_date');?>
							                                            </span>
							                                            
							                                            <div class="form-group input-group <?php if(@form_error('start_time')){ echo'has-error';}?>">

							                                                <span class="input-group-addon">
							                                                	<i class="fa fa-clock-o "> Starting time</i>
							                                                </span>
							                                                <input required type="time" name="start_time" class="form-control" value="<?php echo @$start_time;?>" placeholder="Exhibition Start Time">
							                                            </div>
							                                            <span style="color: red;">
							                                            	<?php echo form_error('start_time');?>
							                                            </span>

							                                            <div class="form-group input-group <?php if(@form_error('end_time')){ echo'has-error';}?>">
							                                                
							                                                <span class="input-group-addon">
							                                                	<i class="fa fa-clock-o"> &nbsp;Ending time</i>
							                                                </span>
							                                                <input required type="time" name="end_time" class="form-control" placeholder="Exhibition End Time" value="<?php echo @$end_time;?>">
							                                            </div>
							                                            <span style="color: red;">
							                                            	<?php echo form_error('end_time');?>
							                                            </span>
							                                        </div>
							                                    </div><!-- /.col-lg-12 (nested) -->
							                                </div><!-- /.row (nested) -->
							                            </div>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<div class="form-group input-group <?php if(@form_error('discription')){ echo'has-error';}?>">
				                                                <span class="input-group-addon">
				                                                	<i class="fa fa-info-circle"> Discription</i>
				                                                </span>
				                                                <textarea required class="form-control" name="discription" placeholder="Exhibition Discription" style="height: 85px;"><?php echo @$set_discription;?></textarea>
				                                            </div>

															<div class="form-group <?php if(@$img_err){ echo'has-error';}?>">

				                                                <span class="input-group-addon" style="border-right: 1px solid #ccc;">
				                                                	<?php if(@$image){?>
				                                                		<img src="<?php echo base_url('assets/web_images/exhibition/'.$image);?>" height='100px' width='100px'>
				                                                	<?php }else{?>
				                                                	<i class="fa fa-photo"> Image</i>
				                                                	<?php }?>
				                                                </span>
				                                                
				                                                <input <?php if(!@$image){?> required <?php }?> type="file" class="form-control custom-file-input" style="height:50px;" name="image">  

				                                                <span style="color: red;">
				                                                	<?php echo @$img_err;?>
				                                                </span>
				                                            </div>
                                            
															<h3 class="green">submit Plese..!</h3>
																
					                                            <button type="submit" class="btn btn-success">Submit</button>
					                                            </form>
					                                            <?php echo @validation_errors(); ?>
														</div>
													</div>
												</div>
											</div>

											<hr />

											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-next" data-last="Publish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							<!-- PAGE CONTENT ENDS -->

<?php require_once("footer.php");?>

	<script src="<?php echo base_url();?>assets/js/wizard.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-additional-methods.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function(){
	    $('#start_date').attr('min', moment().format('YYYY-MM-DD'));
	    var start_date=$('#start_date').val();
	    $('#end_date').attr('min', start_date);
	    $('#start_date').change(function(){
	      var start_date=$(this).val();
	         $('#end_date').attr('min', start_date);
	    });

	   });
		</script>
	<script type="text/javascript">
		jQuery(function($) {
			var $validation = false;
			$('#fuelux-wizard-container')
			.ace_wizard({}).on('actionclicked.fu.wizard' , function(e, info){
				if(info.step == 1 && $validation) {
					if(!$('#validation-form').valid()) e.preventDefault();
			}
			}).on('finished.fu.wizard', function(e) {
				bootbox.dialog({
					message: "Thank you! Your Exhibition information was successfully saved! And Request send to Admin to Aprove Exhibition Plese Click Submit", 
					buttons: {
							"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
							}
					}
				});
			}).on('stepclick.fu.wizard', function(e){
				e.preventDefault();//this will prevent clicking and selecting steps
			});
		
			$.mask.definitions['~']='[+-]';
			$('#phone').mask('(999) 999-9999');
		
			$('#modal-wizard-container').ace_wizard();
			$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		
			
		})
	</script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#state').change(function(){
	            var state_id = $('#state').val();
	            $.ajax({
	                type:'POST',
	                url:"<?php echo site_url('exhibitor/Ajax/select_city');?>",
	                data:
	                {
	                    'sid':state_id
	                },
	                success:function(data)
	                {
	                   //alert(data);
	                    $('#city').html(data);
	                }
	            });
	        });
	    });
	</script>
