<?php 

function alert($value='')
{
?>
<script>
	alert('<?php echo $value;?>');
</script>
<?php
}

function call_ajax($id='',$event='',$url='',$data_val='',$html='')
{
?>
<script type="text/javascript">
		$(document).ready(function () {
			$("#<?php echo $id;?>").<?php echo $event;?>(function () {
				data_val = $('#<?php echo $data_val;?>').val();

				$.ajax({
	                type:'POST',
	                url:"<?php echo $url;?>",
	                data:
	                {
	                    <?php echo $data_val;?>:data_val
	                    
	                },
	                success:function(data)
	                {
	                    $('#<?php echo $html;?>').html(data);
	                }
            	});
			});
		});
</script>
<?php
}

?>