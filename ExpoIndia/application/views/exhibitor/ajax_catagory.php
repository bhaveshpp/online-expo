<select class="form-control" id="cid" name="category_id">
    <option value="">Category</option>
     <?php foreach($stall_category as $row){?>{?>
        <option value="<?php echo @$row['id'];?>" <?php if($row['id']==@$category_id){ echo 'selected';}?>  >
            <?php echo @$row['name'];?>
       </option>
    <?php }?>
</select>