<div class="row">
    <?php
    if(@$err1){
    ?>
    <h1 style="color: red;">
        <?php echo $err1;?>
    </h1>
    <?php }else{?>
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <div class="row">
                        <div class="text-left">
                            <h2 class="no-margin center">
                                Stalls Details 
                                (By <?php echo @$type;?> Exhibitions)
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-12 col-12">

                            <div id="accordion" class="accordion-style1 panel-group">
                                <?php if (@$row) {?>
                                <?php $x=1; foreach($row as $data){?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo strtoupper(@$data['id']);?>">
                                                <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;
                                                <?php echo strtoupper(@$data['title']);?>
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse <?php if(@$x==1){echo "in";$x++;}?>" id="collapse<?php echo strtoupper(@$data['id']);?>">
                                        <div class="panel-body">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="col-lg-9 col-md-9">
                                                    <?php 
                                                    $ar=array();
                                                    foreach ($booked as $key => $a) {
                                                        $ar[$key]=$a['exhibition_id'];
                                                    }
                                                    if( in_array(@$data['id'], $ar)){?>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead class="thin-border-bottom">
                                                                <tr>
                                                                    <th>
                                                                        <i class="ace-icon fa fa-filter"></i>
                                                                        Stall Type
                                                                    </th>

                                                                    <th class='hidden-xs'>
                                                                        <i class="ace-icon fa fa-bank"></i>Total Stalls
                                                                    </th>
                                                                    <th>
                                                                        <i class="ace-icon fa fa-bank"></i>booked Stalls
                                                                    </th>
                                                                    
                                                                    <th>
                                                                        <i class="ace-icon fa fa-money"></i>Price
                                                                    </th>       
                                                                    <th>
                                                                        <i class="ace-icon fa fa-info-circle"></i>Details
                                                                    </th>
                                                                </tr>

                                                            </thead>

                                                            <tbody>
                                                                <?php foreach($stall_category as $i){?>

                                                                <tr>
                                                                    <td class="">
                                                                        <?php echo $i['name'];?>
                                                                    </td>

                                                                    <td class='hidden-xs'>

                                                                        <?php foreach($stall as $j){?>

                                                                        <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                            <?php echo @$j['stalls'];?>
                                                                        <?php }}?>
                                                                    </td>
                                                                    <td class='hidden-xs'>

                                                                        <?php foreach($booked as $j){?>
                                                                        <?php if((@$j['cat_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                            <?php echo @$j['stalls'];?>
                                                                        <?php }}?>
                                                                    </td>
         
                                                                    <td class="">
                                                                        <?php foreach($stall as $j){?>
                                                                            <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                            <?php echo @$j['price'];?>
                                                                        <?php }}?>
                                                                    </td>
                                                                    <td>
                                                                        <?php foreach($stall as $j){?>

                                                                        <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                        <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$data['id'].'/'.@$i['id']);?>" class="btn btn-danger">View Details
                                                                        </a>
                                                                        <?php }}?>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                            <?php }else{?>
                                                                <b class='red'> No Record of Booking</b>

                                                                <table class="table table-striped table-bordered table-hover">
                                                                    <thead class="thin-border-bottom">
                                                                        <tr>
                                                                            <th>
                                                                                <i class="ace-icon fa fa-filter"></i>
                                                                                Stall Type
                                                                            </th>

                                                                            <th class='hidden-xs'>
                                                                                <i class="ace-icon fa fa-bank"></i>Total Stalls
                                                                            </th>
                                                                            <th>
                                                                                <i class="ace-icon fa fa-bank"></i>booked Stalls
                                                                            </th>
                                                                            
                                                                            <th>
                                                                                <i class="ace-icon fa fa-money"></i>Price
                                                                            </th>       
                                                                            <th>
                                                                                <i class="ace-icon fa fa-info-circle"></i>Details
                                                                            </th>
                                                                        </tr>

                                                                    </thead>

                                                                    <tbody>
                                                                        <?php foreach($stall_category as $i){?>

                                                                        <tr>
                                                                            <td class="">
                                                                                <?php echo $i['name'];?>
                                                                            </td>

                                                                            <td class='hidden-xs'>

                                                                                <?php foreach($stall as $j){?>

                                                                                <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                                    <?php echo @$j['stalls'];?>
                                                                                <?php }}?>
                                                                            </td>
                                                                            <td class='hidden-xs'>

                                                                                <?php foreach($booked as $j){?>
                                                                                <?php if((@$j['cat_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                                    <?php echo @$j['stalls'];?>
                                                                                <?php }}?>
                                                                            </td>
                 
                                                                            <td class="">
                                                                                <?php foreach($stall as $j){?>
                                                                                    <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                                    <?php echo @$j['price'];?>
                                                                                <?php }}?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach($stall as $j){?>

                                                                                <?php if((@$j['category_id']==@$i['id'])&&(@$j['exhibition_id']==@$data['id'])){?>
                                                                                <a href="<?php echo site_url('exhibitor/Exhibitor/book/'.@$data['id'].'/'.@$i['id']);?>" class="btn btn-danger">View Details
                                                                                </a>
                                                                                <?php }}?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>

                                                            <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php }} /*foreach*/?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <?php if(!@$err1){echo $page_link;}?>
                </div>
            </div>
    <?php }?>
</div>
        
<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>
<script>
        $(document).on("click", ".confirm_payment", function(e) {
            var x=$('#id').val;
            alert(x);
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
            window.location = "<?php echo site_url('customer/Booking/booking/'.$x.'/'.$ex_id.'/'.$cat_id);?>"
        }
        else{
            false;
        }
        //console.log('This was logged in the callback: ' + result);
    }
});
        });
</script>
  