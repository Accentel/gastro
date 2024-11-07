<?php
include("../db/connection.php");

$prdtype = $_REQUEST['prdtype'];

$sql = mysqli_query($link,"select distinct(b.PRD_NAME),b.PRD_CODE from phr_prdtype_mast as a,phr_prddetails_mast as b where a.prdtype_code=b.type and b.type='$prdtype'");


?>
<select name="prdnames" id="prdnames" onchange="getstock('All2')">
<option value=""> -- Select Product Name -- </option>
<?php
if($sql){
while($row = mysqli_fetch_array($sql))
{
?>
<option value="<?php echo $row[1] ?>"><?php echo $row[0] ?></option>
<?php
}
}
?>
</select>