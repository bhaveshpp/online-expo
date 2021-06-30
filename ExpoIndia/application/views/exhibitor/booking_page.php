<?php //p($booked_stall_no);die;?>
<div class="row">
    <div class="col-xs-12">




<?php 
    $ar[0]=0;
    $start=0;
    $start=$this->uri->segment(6);
    $per_page=10;
    $total=$num;
    $base_url=site_url('/exhibitor/Exhibitor/book/'.$ex_id.'/'.$cat_id.'/');
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
                            <h5>Exhibition : <?php echo $value->exhibition_id;?></h5>
                            <h5>Organization / Company :<span><?php echo $value->business;?></span></h5>
                            <h5>Owner :<span>
                                <?php echo $value->name;?>
                            </span></h5>
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

        </div>
    </div>
</div>
<?php }?>
<?php }?>
<?php echo $page_link;?>
<?php }?>
    </div>
</div>

<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>
<script>
        $(document).on("click", ".confirm_payment", function(e) {
             var tmp = $(this).data('val');
           ///alert(tmp);
            bootbox.confirm({
    message: "Are You Realy Want To Payment Exhibition ?",
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
           //  var tmp = $(this).data('val');
            // var aa=5;
           //  alert("<?php echo site_url();?>/customer/Booking/booking/"+aa+"/<?php echo $ex_id;?>/<?php echo $cat_id;?>");
window.location="<?php echo site_url();?>/customer/Customer/booking/"+tmp+"/<?php echo $ex_id;?>/<?php echo $cat_id;?>";               
             }
        else{
            false;
        }
        //console.log('This was logged in the callback: ' + result);
    }
});
        });
</script>
  