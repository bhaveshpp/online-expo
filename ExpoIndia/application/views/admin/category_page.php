<div class="row"  >
	<div class="panel panel-default" >
            <div class="panel-heading">
                <div class="row">
                    <div class="text-left">
                        <h2 class="center no-margin blue">
                            Exhibition Category
                        </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            
            	            
                <div class="row">
                    <div class="col-xs-12">
                        
                        <div class="table-header blue" style="text-align: center; background: #DBDBDB;">
                            List Of Category
                        </div>

                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                            <!-- table Start -->
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
									
										<th class="hidden-xs">Id</th>
										<th>Category Name</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
								
									<tr>
									<form method="post">
										<td class="hidden-xs">
										<strong>#</strong>
										
										</td>
										<td> <input required type="text" name="name" value="<?php echo @$category['name'];?>"/>  </td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												<button class="btn btn-success"  type="submit" value="save" name="save">
													<i class="ace-icon fa fa-plus-square-o bigger-130"></i>  
													<?php 
														if(@$category){
															echo "Update";
														}else{
															echo "Add";
														}
													?>
												</button>
										
												
											</div>

											<div class="hidden-md hidden-lg">
												<button class="btn btn-success"  type="submit" value="save" name="save">
													<i class="ace-icon fa fa-plus-square-o bigger-130"></i>  
													<?php 
														if(@$category){
															echo "Update";
														}else{
															echo "Add";
														}
													?>
												</button>
											</div>
										</td>
										</form>
									</tr>
									<?php if(@$row){foreach($row as $data){?>
									<tr>
										<td class="hidden-xs">
											<?php echo @$data['id'];?>	
										</td>
										<td><?php echo @$data['name'];?>	</td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												
												<a class="btn btn-primary" href="<?php echo site_url();?>/admin/Category/update_category/<?php echo @$data['id'];?>">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>

												<a class="btn btn-danger" href="<?php echo site_url();?>/admin/Category/delete_category/<?php echo @$data['id'];?>	">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
												</a>
											</div>

											<div class="hidden-md hidden-lg">
												<div class="inline pos-rel">
													<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
														
														<li>
															<a href="<?php echo site_url();?>/admin/Category/update_category/<?php echo @$data['id'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="<?php echo site_url();?>/admin/Category/delete_category/<?php echo @$data['id'];?>" class="tooltip-error" data-rel="tooltip" title="x">
																<span class="red">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
									<?php  }?>
									
									<tr align="center">
											<th  colspan="6" >
								            	<?php  echo $this->pagination->create_links();?>
								            </th>
									</tr>
									<?php  }?>

								</tbody>
							</table>
                            <!-- table End -->
                        </div>
                    </div>
                </div>


			</div>
            <div class="panel-footer text-right"></div>
    </div>
</div>				

<?php
	require_once('footer.php');
?>