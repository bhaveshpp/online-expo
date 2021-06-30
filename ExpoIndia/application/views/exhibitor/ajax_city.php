<select id="city" class="form-control" name="city">
    <option value="">Select City</option>
    <?php foreach($city as $row){?>
    <option value="<?php echo @$row['id'];?>"  <?php if(@$set_city==@$row['id']){echo 'selected';}?> ><?php echo @$row['name'];?>
    </option>
    <?php }?>
</select>