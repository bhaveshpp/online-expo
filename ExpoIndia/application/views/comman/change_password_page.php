<!-- header End -->
<!-- PAGE CONTENT BEGINS -->
<?php
    
            $o="";
            $n="";
            $c="";
    if(form_error('opass'))
    {
        $o=form_error('opass');
    }
    else if(form_error('npass'))
    {
        $n=form_error('npass');
    }else if(form_error('cpass'))
    {
        $c=form_error('cpass');
    }  
?>
<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Change Password
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    
                                            
                                            
                                            <div class="form-group">
                                                <label>Profile</label>
                                                <p class="form-control-static">
                                                    <img src="<?php echo base_url();?>assets/web_images/<?php echo $user;?>/<?php echo @$data['image'];?>" height="100px" width="100px" style="border-radius:100%;">
                                                </p>
                                            </div>
											<form method="post">
											<div class="form-group">
                                                <label>Enter Your Old Password</label>
                                                <input required name="opass" id="opass" type="text" class="form-control" placeholder="Old Password" value="<?php echo @$opass;?>">
                                                <span class="red">
                                                    <?php echo @$o,@$opm;?>
                                                </span>
                                            </div>
											
											<div class="form-group">
                                                <label>Enter Your New Password</label>
                                                <input required name="npass" id="npass" type="Password" class="form-control" placeholder="New Password" value="<?php echo @$npass;?>">
                                                <span class="red">
                                                    <?php echo @$n;?>
                                                </span>
                                            </div>
											
											<div class="form-group">
                                                <label>Enter Your Conform Password</label>
                                                <input required name="cpass" id="cpass" type="Password" class="form-control" placeholder="Conform Password" value="<?php echo @$cpass;?>">
                                                <span class="red">
                                                <?php echo @$c;?>
                                                </span>
                                            </div>
											<button type="submit" name="save" value="save" class="btn btn-primary">Change Password</button>
                                       	</form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>
