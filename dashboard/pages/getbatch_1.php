<?php
include('../db/connection.php');
$emp_id = $_REQUEST['pname'];
$rw = $_REQUEST['row'];

$query = mysqli_query($link,"select inv_id,batch_no from phr_purinv_dtl where product_name='$emp_id' and balance_qty > 0 order by balance_qty desc");
if($query){
?>
<select name="bachno<?php echo $rw ?>" id="bachno<?php echo $rw ?>" class="select" onchange="javascript:showMAName(this.value,<?php echo $rw ?>)"  style="width:75px height:10px">
<option value="">Batch</option>
<?php
while($row1 = mysqli_fetch_array($query))
{
?>
	<option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
	<?php } } ?>
       
        </select>