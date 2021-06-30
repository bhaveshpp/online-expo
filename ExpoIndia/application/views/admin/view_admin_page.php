<div class="row">
	<div class="panel panel-default" >
            <div class="panel-heading">
                <div class="row">
                    <div class="text-left">
                        <h2 class="center no-margin blue">
                            Administrators
                        </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            
            	<div class="row">
					<div class="col-xs-12">
						
						<div class="table-header blue" style="text-align: center; background: #DBDBDB;">
							List Of Admin
						</div>

						<!-- div.table-responsive -->

						<!-- div.dataTables_borderWrap -->
						<div>

							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
									
										<th>Id</th>
										<th>Name</th>
											<th class="hidden-480">Email</th>

										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Image
										</th>

										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($row as $data){?>
									<tr>
										<td>
											<?php echo @$data['id'];?>	
										</td>
										<td><?php echo @$data['name'];?>	</td>
										<td class="hidden-480"><?php echo @$data['email'];?>	</td>
										<td>
										<img src="<?php echo base_url().'assets/web_images/admin/'.@$data['image'];?> " height="50px" width="50px"/>	</td>


										<td>
											<div class="action-buttons">
												
												<a class="btn btn-primary" href="<?php echo site_url();?>/admin/Admin/update_admin/<?php echo @$data['id'];?>">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>

												<a class="btn btn-danger
												" href="<?php echo site_url();?>/admin/Admin/delete_admin/<?php echo @$data['id'];?>	">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
												</a>
											</div>

											
										</td>
									</tr>
									<?php }?>
									
									<tr align="center">
											<th  colspan="6" >
								            	<?php  echo @$page_link;?>
								            </th>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
    </div>
</div>
						
								

				
								

								
<?php
	require_once('footer.php');
?>