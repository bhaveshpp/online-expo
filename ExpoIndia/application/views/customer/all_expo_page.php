<?php
//echo "<pre>";print_r($row);die;
?>












                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Exhibition Details</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                



                <div class="row">
                    <?php foreach($row as $data){?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail search-thumbnail">
                            <?php if(@$data['status']=='1'){?>
                            <span class="search-promotion label label-success arrowed-in arrowed-in-right">Published</span>
                            <?php }?>
                            <img src="<?php echo base_url();?>assets/web_images/exhibition/<?php echo @$data['image'];?>" style="border-radius: 5px; height:100px; width:150px;">
                            <div class="caption">
                                <div class="clearfix">
                                    <span class="pull-right label label-grey info-label">
                                        <?php 
                                            foreach ($city as $key => $value) {
                                                if($value['id']==$data['city']){echo $value['name'];}
                                            }
                                        ?>
                                    </span>

                                    
                                </div>

                                <h3 class="search-title">
                                    <a href="<?php echo site_url('customer/Customer/detail_exhibition/');echo @$data['id'];?>" class="blue">
                                        <?php echo strtoupper(@$data['title']);?>
                                    </a>
                                </h3>
                                <p style="height:100px;overflow:auto;"><?php echo strtoupper(@$data['discription']);?></p>
                                <a href="<?php echo site_url('customer/Customer/detail_exhibition/');echo @$data['id'];?>">
                                    <span class='btn btn-block btn-info'>More Information</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div><!-- /.row -->




                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <?php if(!@$err1){echo @$page_link;}?>
                    </div>
                </div>
<!-- PAGE CONTENT ENDS -->
<!-- footer Start -->
<?php require_once("footer.php");?>
