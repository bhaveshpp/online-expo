<div class="panel panel-success" style="margin:2%;">

    <div class="panel-heading lead">
        <div class="row">

            <div class="col-lg-8 col-md-8">

                <i class="fa fa-flag"></i>
                View Exhibition Details
            </div>

            <div class="col-lg-4 col-md-4 text-right">
                <div class="btn-group text-center">
                    
                    <a href="<?php echo site_url();?>/exhibitor/Exhibitor/update_exhibition/<?php echo @$expo['id'];?>" class="btn btn-success btn-sm btn-default">
                        <i class="icon-xl fa fa-edit fa-1x"></i>
                    </a>
                    <?php if (@$data['status']==0) {?>
                    <span class="confirm_delete btn btn-success btn-sm btn-default">
                        <i class="icon-xl fa fa-trash-o fa-1x"></i>
                    </span>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <center>
                            <span class="text-left">
                                
                                <img src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$expo['image'];?>" height="100px" width="100px" style="border-radius: 5px;">
                            </span>
                        </center>
                    <div class="table-responsive panel"></div>
                </div>

                <div class="col-lg-9 col-md-9">

                    <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#Summery" class="text-success">
                                        <i class="fa fa-indent"></i> Summery
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Contact" class="text-success">
                                        <i class="fa fa-bookmark-o"></i> Contact Info
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#General" class="text-success">
                                        <i class="fa fa-info"></i> General Info
                                    </a>
                                </li> 
                                <li>
                                    <a data-toggle="tab" href="#Payment" class="text-success">
                                        <i class="fa fa-money"></i> Payment Info
                                    </a>
                                </li>  
                    </ul>

                    <div class="tab-content">

                        <div id="Summery" class="tab-pane fade in active">

                                    <div class="table-responsive panel">
                                        <table class="table">
                                            <tbody>

                                                    <tr>
                                                        <td class="text-success">
                                                            <i class="fa fa-user"></i> Full Title
                                                        </td>
                                                        <td>
                                                            <?php echo @$expo['title'];?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="text-success">
                                                            <i class="fa fa-book"></i> Category
                                                        </td>
                                                        <td>
                                                            <?php echo @$category['name'];?>
                                                       </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-success">
                                                            <i class="fa fa-info-circle"></i> Discription
                                                        </td>
                                                        <td>
                                                            <?php echo @$expo['discription'];?>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>

                        <div id="Contact" class="tab-pane fade">
                            <div class="table-responsive panel">
                                <table class="table">
                                    <tbody>
        
                                        <tr>

                                            <td class="text-success">
                                                <i class="fa fa-envelope-o"></i> Email ID
                                            </td>

                                            <td>
                                                <?php echo @$data['email'];?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-success">
                                                <i class="glyphicon glyphicon-phone"></i> Helpline Number
                                            </td>

                                            <td>
                                                <?php echo @$expo['helpline'];?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-success">
                                                <i class="fa fa-home"></i> Address
                                            </td>

                                            <td>
                                                <address>
                                                    <strong>
                                                     <?php echo @$expo['address'];?>
                                                   </strong>
                                                </address>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-success">
                                                <i class="fa fa-flag"></i> State
                                            </td>

                                            <td>
                                                <?php echo @$state['name'];?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-success">
                                                <i class="fa fa-user"></i>City
                                            </td>

                                            <td>
                                                <?php echo @$city['name'];?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="General" class="tab-pane fade">
                            <div class="table-responsive panel">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td class="text-success">
                                                <i class="fa fa-university"></i>Stalls
                                            </td>
                                            <td>
                                                <?php echo @$expo['stalls'];?>
                                            </td>
                                        </tr>   

                                        <tr>
                                            <td class="text-success">
                                                <i class="fa fa-calendar"></i> Starting Date
                                            </td>
                                            <td>
                                                <?php echo @$expo['start_date'];?>
                                            </td>
                                        </tr>  

                                        <tr>
                                            <td class="text-success">
                                                <i class="fa fa-calendar"></i> Last/Ending Date
                                            </td>
                                            <td>
                                                <?php echo @$expo['end_date'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-success">
                                                <i class="glyphicon glyphicon-time"></i> Starting At
                                            </td>
                                            <td>
                                                <?php echo @$expo['start_time'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-success">
                                                <i class="glyphicon glyphicon-time"></i> Clsed At
                                            </td>
                                            <td>
                                                <?php echo @$expo['end_time'];?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="Payment" class="tab-pane fade">
                            <div class="table-responsive panel">
                                <?php if(!@$expo['status']){?>
                                <p class="btn btn-danger btn-block " data-toggle="modal" data-target="#myModal"> Payment Now( for Publish )</p>
                                <?php }else{?>
                                <p class="btn btn-success btn-block">Exhibition Published</p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="display-5">Exhibition Payment <span class="text-danger hidden-md-up" style="font-size: 15px;">* All fields are required</span></h4>
        </div>
        <div class="modal-body">                   
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/visa.png">     
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/master-card.png">     
            <img style='width:100px;height:60px;border-radius:3px;border:1px solid;' src="<?php echo base_url();?>assets/images/payment/rupay.png">     
            <hr>
            <form method="post" id="product_info" enctype="multipart/form-data" action="<?php echo site_url('payment/Welcome/check');?>">                                                                  
                <div class="form-group input-group">     
                <span class="input-group-addon">
                    <i class="fa fa-money"></i> Amount
                </span>                 
                  <input type="number"  name="payble_amount" id="payble_amount" class="form-control" placeholder="Enter Payble Amount" required value='1000' readonly/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-flag"></i> Exhibition
                </span>
                    <input type="text" name="product_info" id="product_info" class="form-control"  Placeholder="Exhibition info name" required value='<?php echo @$expo['title'];?>' readonly/>
                    <input type="hidden" name="exhibition_id" value="<?php echo @$expo['id'];?>">
                </div>
               <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i> Exhibitor
                </span>                     
                  <input type="text"  name="customer_name" id="customer_name" class="form-control" placeholder="Full Name (Only alphabets)" required value='<?php echo @$data['name'];?>' readonly/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i> Mobile
                </span>                                   
                  <input type="number"  name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number(10 digits)" required value='<?php echo @$data['mobile'];?>' readonly/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i> Email
                </span>                                 
                  <input type="email"  name="customer_email" id="customer_email" class="form-control" placeholder="Email" required value='<?php echo @$data['email'];?>' readonly/>
                </div>
                <div class="form-group input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map"></i> Address
                </span>
                  <textarea class="form-control" name="customer_address" id="customer_address" placeholder="Address" required></textarea>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>                 
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div class="panel panel-success" style="margin:2%;">

    <div class="panel-heading lead">
        <div class="row">

            <div class="col-lg-8 col-md-8">

                <i class="fa fa-flag"></i>
                View Exhibition Details
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="row">

<div class="row">
    <div class="col-xs-4 col-sm-3 pricing-span-header">
        <div class="widget-box transparent">
            <div class="widget-header">
                <h5 class="widget-title bigger lighter">Package Name</h5>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <ul class="list-unstyled list-striped pricing-table-header">
                        <li>Total Stalls</li>
                        <li>Booked stalls</li>
                        <li>Availablestall</li>
                        <li>Size</li>
                        <li>Price</li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-8 col-sm-9 pricing-span-body">
<?php foreach($stall as $i){?>
    <?php if($i['category_id']==1){?>
        <div class="pricing-span">
            <div class="widget-box pricing-box-small widget-color-grey">
                <div class="widget-header">
                    <h5 class="widget-title bigger lighter">Silver</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <ul class="list-unstyled list-striped pricing-table">
                            <li> <?php echo @$i['stalls'];?> </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==1){?>
                                            <?php echo $b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                    0
                                <?php }?>
                            </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==1){?>
                                            <?php echo @$i['stalls']-@$b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                     <?php echo @$i['stalls'];?>
                                <?php }?>
                                
                            </li>
                            <li><?php echo @$i['length'];?> X <?php echo @$i['width'];?></li>
                            
                        </ul>

                        <div class="price">
                            <span class="label label-lg label-inverse arrowed-in arrowed-in-right">
                               Rs.<?php echo @$i['price'];?>
                                <small>/Stall</small>
                            </span>
                        </div>
                    </div>

                    <div>
                        <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$i['exhibition_id'].'/');?>1" class="btn btn-block btn-sm btn-grey">
                            <span>Details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
<?php }foreach($stall as $i){?>
    <?php if($i['category_id']==2){?>
        <div class="pricing-span">
            <div class="widget-box pricing-box-small widget-color-orange">
                <div class="widget-header">
                    <h5 class="widget-title bigger lighter">Gold</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <ul class="list-unstyled list-striped pricing-table">
                            <li> <?php echo @$i['stalls'];?> </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==2){?>
                                            <?php echo $b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                    0
                                <?php }?>
                            </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==2){?>
                                            <?php echo @$i['stalls']-@$b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                     <?php echo @$i['stalls'];?>
                                <?php }?>
                                
                            </li>
                            <li><?php echo @$i['length'];?> X <?php echo @$i['width'];?></li>
                            
                        </ul>

                        <div class="price">
                            <span class="label label-lg label-inverse arrowed-in arrowed-in-right">
                               Rs.<?php echo @$i['price'];?>
                                <small>/Stall</small>
                            </span>
                        </div>
                    </div>

                    <div>
                        <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$i['exhibition_id'].'/');?>2" class="btn btn-block btn-sm btn-warning">
                            <span>Details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
<?php }foreach($stall as $i){?>
    <?php if($i['category_id']==3){?>
        <div class="pricing-span">
            <div class="widget-box pricing-box-small widget-color-blue">
                <div class="widget-header">
                    <h5 class="widget-title bigger lighter">Platinum</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <ul class="list-unstyled list-striped pricing-table">
                            <li> <?php echo @$i['stalls'];?> </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==3){?>
                                            <?php echo $b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                    0
                                <?php }?>
                            </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==3){?>
                                            <?php echo @$i['stalls']-@$b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                     <?php echo @$i['stalls'];?>
                                <?php }?>
                                
                            </li>
                            <li><?php echo @$i['length'];?> X <?php echo @$i['width'];?></li>
                            
                        </ul>

                        <div class="price">
                            <span class="label label-lg label-inverse arrowed-in arrowed-in-right">
                               Rs.<?php echo @$i['price'];?>
                                <small>/Stall</small>
                            </span>
                        </div>
                    </div>

                    <div>
                        <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$i['exhibition_id'].'/');?>3" class="btn btn-block btn-sm btn-primary">
                            <span>Details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
<?php }foreach($stall as $i){?>
    <?php if($i['category_id']==4){?>
        <div class="pricing-span">
            <div class="widget-box pricing-box-small widget-color-red3">
                <div class="widget-header">
                    <h5 class="widget-title bigger lighter">Diamond</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <ul class="list-unstyled list-striped pricing-table">
                            <li> <?php echo @$i['stalls'];?> </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==4){?>
                                            <?php echo $b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                    0
                                <?php }?>
                            </li>
                            <li> 
                                <?php if(@$booked){?>
                                    <?php foreach($booked as $b){?>
                                        <?php if(@$b['cat_id']==4){?>
                                            <?php echo @$i['stalls']-@$b['stall'];?>
                                        <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                     <?php echo @$i['stalls'];?>
                                <?php }?>
                                
                            </li>
                            <li><?php echo @$i['length'];?> X <?php echo @$i['width'];?></li>
                           
                        </ul>

                        <div class="price">
                            <span class="label label-lg label-inverse arrowed-in arrowed-in-right">
                               Rs.<?php echo @$i['price'];?>
                                <small>/Stall</small>
                            </span>
                        </div>
                    </div>

                    <div>
                        <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$i['exhibition_id'].'/');?>4" class="btn btn-block btn-sm btn-danger">
                            <span>Detail</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
<?php }?>
</div>
</div>
</div>
</div>
</div>





<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>


<script>
        $(document).on("click", ".confirm_delete", function(e) {
            bootbox.confirm({
    message: "Are You Realy Want To Delete Exhibition ?",
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
            window.location = "<?php echo site_url();?>/exhibitor/Exhibitor/delete_exhibition/<?php echo @$data['id'];?>"
        }
        else{
            false;
        }
        //console.log('This was logged in the callback: ' + result);
    }
});
        });
</script>
    