<?php //p($stall);die;?>
<div class="row">
    <div class="col-xs-12">




<?php 
    $ar[0]=0;
    $start=0;
    $start=$this->uri->segment(6);
    $per_page=10;
    $total=$num;
    $base_url=site_url('/customer/Customer/book/'.$ex_id.'/'.$cat_id.'/');
    $page_link=pagination($total,$per_page,$base_url);
    if(@$num<=$per_page){
        $per_page=$num;
    }
?>
<?php if($total==0){?>
    <h1 class='red'>No Record Found</h1>
<?php }else{?>
<?php foreach ($booked_stall_no as $key => $a) {$ar[$key]=$a['stall_no'];}?>
<?php for($i=$start+1;$i<=$start+$per_page;$i++){?>
<?php if(in_array($i,$ar)){?>
    <?php foreach($booked_stall_no as $key => $booked) {?>
        <?php if ($i==$booked['stall_no']){?>
            <?php foreach($owner as $key => $value){?>
                <?php if(($value->cat_id==$booked['cat_id'])&&($booked['stall_no']==$value->stall_no)&&($value->exhibition_id==$ex_id)){?>
                    <div class='col-lg-6 col-sm-12' style='height:155px;'>
                    <div class="media search-media disabled">
                        <div class="media-left">
                            <a href="#">
                                <img src="<?php echo base_url('assets/web_images/customer/'.$value->image);?>" height='90px' width='90px'/>
                            </a>
                        </div>

                        <div class="media-body">
                            <div>
                                <h4 class="media-heading">
                                    <a href="#" class="blue"><?php echo $i;?> Booked By</a>
                                </h4>
                            </div>
                            <h5>Exhibition : <?php echo $expo['title'];?></h5>
                            <h5>Organization / Company :<span><?php echo $value->business;?></span></h5>
                            <h5>Owner :<span>
                                <?php echo $value->name;?>
                            </span></h5>
                                

                            <div class="search-actions text-center">
                                   <span class="grey">Rs</span>

                                        <span class="grey bolder bigger-125"><?php echo $stall['price'];?></span>
                                        <div class="action-buttons bigger-125">
                                            <?php echo $stall['width'];?> X <?php echo $stall['length'];?>
                                        </div>
                              
                                <a class="search-btn-action btn btn-sm btn-block btn-grey disabled">
                                    Unavailable!<?php echo $i ;?>
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php }?>
            <?php }?>
        <?php }?>
    <?php }?>     
<?php }else{?>
<div class='col-lg-6 col-sm-12' style='height:155px;'>
    <div class="media search-media">
        <div class="media-left">
            
            <a href="#">
                <img src="<?php echo base_url('assets/images/lable/available.jpg');?>" height='90px' width='90px'/>
            </a>
        </div>

        <div class="media-body">
            <div>
                <h4 class="media-heading">
                    <a href="#" class="blue">Stall No : <?php echo $i ;?></a>
                </h4>
            </div>
            <p>
                

            </p>

            <div class="search-actions text-center">
                  <span class="grey">Rs</span>

                        <span class="grey bolder bigger-125"><?php echo $stall['price'];?></span>
                        <div class="action-buttons bigger-125">
                            <?php echo $stall['width'];?> X <?php echo $stall['length'];?>
                        </div>
                
                <a  class="confirm_payment search-btn-action btn btn-sm btn-block btn-info" data-val="<?php echo $i ;?>" data-toggle="modal" data-target="#myModal">
                    <!-- <input type="hidden" id="aaash" class="tmp" > -->
                    <p class='' >Book it!</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php }?>
</div>
<?php echo $page_link;?>
<?php }?>  
</div>
<div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="display-5">Stall Booking<span class="text-danger hidden-md-up" style="font-size: 15px;">* All fields are required</span></h4>
        </div>
        <div class="modal-body">                   
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/visa.png">     
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/master-card.png">     
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/rupay.png">     
            <hr>
            <form method="post" id="product_info" enctype="multipart/form-data" action="<?php echo site_url('payment/Welcome/check_customer');?>">                                                                  
                <div class="form-group input-group">     
                    <span class="input-group-addon">
                        <i class="fa fa-money"></i> Amount
                    </span>   
                                   
                    <input type="number"  name="payble_amount" id="payble_amount" class="form-control" placeholder="Enter Payble Amount" required value='<?php echo $stall['price'];?>' readonly/>
                    
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-flag"></i> Exhibition
                    </span>
                    <input type="text" name="product_info" id="product_info" class="form-control"  Placeholder="Exhibition info name" required value='<?php echo $expo['title'];?>' readonly/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-filter"></i>Stll Category
                    </span>
                    <input type="text" name="stall_category" id="stall_category" class="form-control"  Placeholder="Stall Category" required value='<?php echo $stall_category['name'];?>' readonly/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bank"></i> Stall Number
                    </span>
                    <input type="text" name="stall_number" id="stall_number" class="form-control"  Placeholder="Stall Number" required value='' readonly/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i> Customer
                </span>                     
                  <input type="text"  name="customer_name" id="customer_name" class="form-control" placeholder="Full Name (Only alphabets)" required value='<?php echo $data['name'];?>' readonly/>
                </div>
                
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i> Mobile
                </span>                                   
                  <input type="number"  name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number(10 digits)" required value='<?php echo $data['mobile'];?>'/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i> Email
                </span>                                 
                  <input type="email"  name="customer_email" id="customer_email" class="form-control" placeholder="Email" required value='<?php echo $data['email'];?>'/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map"></i> Address
                </span>
                  <textarea class="form-control" name="customer_address" id="customer_address" placeholder="Address" required></textarea>
                </div>
                <div class="form-group text-right">
                    <input type="hidden"  name="exhibition_id"value='<?php echo $expo['id'];?>'/>
                    <input type="hidden"  name="category_id"value='<?php echo $cat_id;?>'/>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>                 
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".confirm_payment").click(function () {
        var num=$(this).data('val');
       //alert(num);
        $('#stall_number').attr('value', num);
        $('#stall_number').attr('readonly', true);
        });
    });
</script>