<div class="row" >
	<div class="panel panel-default" >
            <div class="panel-heading">
                <div class="row">
                    <div class="text-left">
                        <h2 class="center blue no-margin">
                            Exhibitors
                        </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            
            	<div class="row">
					<div class="col-xs-12">
						
						<div class="table-header blue" style="text-align: center; background: #DBDBDB;">
							List Of Exhibitor
						</div>

						<!-- div.table-responsive -->

						<!-- div.dataTables_borderWrap -->
						<div>

							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
									
										<th class="hidden-480">Id</th>
										<th>Name</th>
										<th class="hidden-480">Email</th>

										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Image
										</th>
										<th>Status</th>

										<th>Action</th>
									</tr>
								</thead>

								<tbody>
								<?php foreach($row as $row){?>
									<tr>
										<td class="hidden-480">
											<?php echo @$row['id'];?>	
										</td>
										<td><?php echo @$row['name'];?>	</td>
										<td class="hidden-480"><?php echo @$row['email'];?>	</td>
										<td>
										<img src="<?php echo base_url().'assets/web_images/exhibitor/'.@$row['image'];?> " height="50px" width="50px"/>	</td>

										<td>
											<?php 
												if(@$row['status']=='1'){
													?>
													
													<label>
														<input name="switch-field-1" value="1" class="status1 ace ace-switch ace-switch-6" type="checkbox" checked="true"  data-status_id = "<?php echo @$row['id'];?>" />
														<span class="lbl"></span>
														
													</label>
 	
													<?php
												}
											?>
											<?php 
												if(@$row['status']=='0'){
													?>
													
													<label>
														<input name="switch-field-1" value="0" class="status1 ace ace-switch ace-switch-6" type="checkbox" data-status_id = "<?php echo @$row['id'];?>" />
														<span class="lbl"></span>

													</label>

													<?php
												}
											?>	
										</td>

										<td>
											<div class="action-buttons">
											
											<span class="confirm_delete" data-status_id = "<?php echo @$row['id'];?>">
												<a class="btn btn-danger" href="#">
													<i class="ace-icon fa fa-trash-o bigger-130">
														
													</i>
												</a>
											</span>
											<!-- <span class="" data-status_id = "<?php echo @$row['id'];?>">
												<a class="btn btn-info" href="<?php echo site_url();?>/admin/Admin/detail_exhibitor/">
													<i class="ace-icon fa fa-info-circle bigger-130">
														
													</i>
												</a>
											</span> -->
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
				</div><!-- /.row -->

			</div>
    </div>
</div>
<!-- PAGE CONTENT ENDS -->
<?php
	require_once('footer.php');
?>
<script>
	$(document).ready(function(e) {
		$('.status1').change(function(){
			var id = $(this).data('status_id');
			$.ajax({
		        type:'POST',
		        url:"<?php echo site_url('/admin/Admin/update_status');?>",
		        data:
		        {
		          'id':id
		        },
		        success:function(data)
		        {}
		      });			
		});
		
	});

</script>
<script>
        $(document).on("click", ".confirm_delete", function(e) {
        	var id = $(this).data('status_id');
            bootbox.confirm({
    message: "Are You Realy Want To Delete Exhibitor?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result){
        	window.location = "<?php echo site_url();?>/admin/Admin/delete_exhibitor/"+id
        }
        else{
        	false;
        }
        //console.log('This was logged in the callback: ' + result);
    }
});
        });
</script>
