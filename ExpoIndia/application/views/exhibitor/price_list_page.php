<div class="panel panel-default">
    <div class="panel-heading">
        Manage Price List For Stalls (By Category)
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form method="post" role="form">   

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="form-group">

                            <span class="input-group-addon">
                                <i class="fa fa-flag"> Select Exhibition Title</i>
                            </span>
                            
                            <select required class="form-control" name="exhibition_id" id="expo_chang">

                                <option value="">Exhibition</option>
                                <?php foreach($exhibition as $row){?>
                                    <option value="<?php echo @$row['id'];?>" <?php if($row['id']==@$exhibition_id){ echo 'selected';}?>  >
                                        <?php echo @$row['title'];?>
                                    </option>
                                <?php }?>
                            </select>
                            <span style="color: red;">
                                <?php echo form_error('exhibition_id');?>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="input-group-addon">
                                <i class="fa fa-filter"> Select Stall Category</i>
                            </span>
                            
                            <select required class="form-control" id="cid" name="category_id">
                                <option value="">Category</option>
                                 <?php foreach($stall_category as $row){?>{?>
                                    <option value="<?php echo @$row['id'];?>" <?php if($row['id']==@$category_id){ echo 'selected';}?>  >
                                        <?php echo @$row['name'];?>
                                   </option>
                                <?php }?>
                            </select>
                            <span style="color: red;">
                                <?php echo form_error('category_id');?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bank"></i> Stalls
                                </span>
                                <input required type="text" name="stalls" class="form-control" value="<?php echo @$stalls;?>" placeholder="No Of Stalls" autocomplete="off">

                            </div> 
                            <span style="color: red;">
                                <?php echo form_error('stalls');?>
                            </span> 
                            <span style="color: red;">
                                <?php echo @$err_stall;?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-arrow-left"></i>Width(fit)
                                <i class="fa fa-arrow-right"></i>
                            </span>
                            <input required type="text" name="width" class="form-control" value="<?php echo @$width;?>" placeholder="Stall Width" autocomplete="off">
                            </div>  

                            <span style="color: red;">
                                <?php echo form_error('width');?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-arrow-up"></i>Length(fit)
                                <i class="fa fa-arrow-down"></i>
                            </span>
                            <input required type="text" name="length" class="form-control" value="<?php echo @$length;?>" placeholder="Stall Length" autocomplete="off">
                            </div>
                            <span style="color: red;">
                                <?php echo form_error('length');?>
                            </span>
                        </div>
                        
                        <div class="form-group">

                            <div class="form-group input-group">

                                <span class="input-group-addon">
                                    <i class="fa fa-money"></i> Price
                                </span>

                                <input required type="text" name="price" class="form-control" value="<?php echo @$price;?>" placeholder="Price Amount" autocomplete="off">
                            </div> 
                            <span style="color: red;">
                                <?php echo form_error('price');?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-12 center">

                        <button type="submit" value="save" name="save" class="btn btn-success">Submit Button</button>
                    </div>
                </form>
            </div><!-- /.col-lg-6 (nested) -->
        </div><!-- /.row (nested) -->
    </div><!-- /.panel-body -->
</div><!-- /.panel -->
<?php require_once("footer.php");?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#expo_chang').change(function(){
            var expo_chang = $('#expo_chang').val();
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('exhibitor/Ajax/select_cat');?>",
                data:
                {
                    'ex_id':expo_chang
                },
                success:function(data)
                {
                   //alert(data); 
                    $('#cid').html(data);
                }
            });
        });
    });
</script>
