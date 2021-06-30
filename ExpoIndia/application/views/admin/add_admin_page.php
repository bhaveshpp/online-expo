<?php
$n="";
$e="";
$p="";
if(form_error('name'))
{
	$n=form_error('name');
}
else if(form_error('email'))
{
	$e=form_error('email');
}else if(form_error('password'))
{
	$p=form_error('password');
}
if(@$exist){
	$e=$exist;
}
?>
<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="panel panel-default" >
            <div class="panel-heading">
                <div class="row">
                    <div class="text-left">
                        <h2 class="center no-margin blue">
                            Add Admin
                        </h2>
                    </div>
                </div>
            </div>

            <div class="panel-body">
            
            	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Name</label>

						<div class="col-sm-9">
							<span class="input-icon">
								<input type="text"   name="name" id="form-field-icon-1" value="<?php  echo @$name ;?>" />
								<i class="ace-icon fa fa-user blue"></i>
							</span>
							<?php echo $n;?>
						</div>
						
						
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Email</label>

						<div class="col-sm-9">
							<span class="input-icon">
								<input type="text"  name="email" id="form-field-icon-1" value="<?php  echo @$email ;?>"/>
								<i class="ace-icon fa fa-envelope blue"></i>
							</span><?php echo $e;?>
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Password</label>

						<div class="col-sm-9">
							<span class="input-icon">
								<input type="password"  name="password" id="form-field-icon-1" value="<?php  echo @$password ;?>" />
								<i class="ace-icon fa fa-lock blue"></i>
							</span>
								<?php echo $p;?>
						</div>
						
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-6">Image</label>

						<div class="col-sm-9">
							<input  type="file" id="form-field-6"  class='form-element' name="image"  />
							<?php echo @$file_error;?>
							<?php if(@$image){?><img src="<?php echo base_url();?>assets/web_images/admin/<?php echo $image;?>" height="50px" width="50px"/><?php }?>
						</div>
					</div>

					<div class="space-4"></div>

					

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button value="save" class="btn btn-info" type="submit" name="save">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Submit
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>	
								Reset
							</button>
						</div>
					</div>
				</form>

			</div>

           
    </div>
</div>
<?php require_once('footer.php');?>