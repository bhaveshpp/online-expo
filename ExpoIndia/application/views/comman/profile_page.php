								<!-- PAGE CONTENT BEGINS -->
							
								<div class="hr dotted"></div>

								<div>
									<?php if(@$edit){?>
										<form method='post' enctype='multipart/form-data'>
									<?php }?>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="<?php echo strtoupper(@$data['name']);?>" src="<?php echo base_url();?>assets/web_images/<?php echo $user;?>/<?php echo @$data['image'];?>" height='150px' width='150px' />
													
												</span>

												<div class="space-4"></div>
												<?php if(!@$edit){?>
												<a class="white" href="<?php echo site_url($user.'/'.$user.'/edit_profile');?>">
												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
															<i class="ace-icon fa fa-pencil light-green"></i>
															&nbsp;
															Edit
															
													</div>
												</div>
												</a>
												<?php }else{?>
													<div class="width-80 height-50 label label-info label-xlg arrowed-in no-margin no-padding">
														<input type='file' name='image'>
													</div>
												<?php }?>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
												

												<div class="space-6"></div>

												
											</div>

											<div class="hr hr12 dotted"></div>

											

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<i class="fa fa-user light-orange bigger-110"></i>
														<?php if(!@$edit){?>
															<?php echo strtoupper(@$data['name']);?>
														<?php }else{?>
															<input type='text' name='name' value='<?php echo @$data['name'];?>'>
														<?php }?>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Email </div>

													<div class="profile-info-value">
														<i class="fa fa-envelope light-orange bigger-110"></i>
															<?php echo (@$data['email']);?>
													</div>
												</div>

												<?php if((@$user=='exhibitor')||(@$user=='customer')){?>
												<div class="profile-info-row">
													<div class="profile-info-name"> Mobile </div>

													<div class="profile-info-value">
														<i class="fa fa-phone light-orange bigger-110"></i>
															<?php if(!@$edit){?>
															<?php echo (@$data['mobile']);?>
														<?php }else{?>
															<input type='number' name='mobile' value='<?php echo (@$data['mobile']);?>'>
														<?php }?>
													</div>
												</div>
												<?php }?>

												<?php if((@$data['business'])||(@$user=='customer')){?>
												<div class="profile-info-row">
													<div class="profile-info-name"> Business / Organiztion </div>

													<div class="profile-info-value">
														<i class="fa fa-bank light-orange bigger-110"></i>
															<?php if(!@$edit){?>
															<?php echo (@$data['business']);?>
															<?php }else{?>
																<input type='text' name='business' value='<?php echo (@$data['business']);?>'required>
															<?php }?>
													</div>
												</div>
												<?php }?>

												<?php if(!@$edit){?>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> To Days Login </div>

													<div class="profile-info-value">
														<i class="fa fa-clock-o light-orange bigger-110"></i>
															<?php 
																$date=date('Y-m-d h:i:s');
																echo $date;
															?> hours ago
														
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> About Me </div>

													<div class="profile-info-value">
														<i class="fa fa-info-circle light-orange bigger-110"></i>
														I Am <?php echo @$user;?>
													</div>
												</div>

												<?php }else{?>
													<div class="profile-info-row">
														<div class="profile-info-name"> Save </div>

														<div class="profile-info-value">
															<i class="fa fa-info-circle light-orange bigger-110"></i>
															<button type='submit' name='submit' value='Save' class='btn btn-success'>
																<i class="fa fa-check-circle light-orange bigger-110"></i>
																Save Changes
															</button>
														</div>
													</div>
															
												<?php }?>

												
											</div>
										</div>
									</div>
									<?php if(@$edit){?>
										</form>
									<?php }?>
								</div>

								
								

								<!-- PAGE CONTENT ENDS -->
<?php require_once("footer.php");?>
