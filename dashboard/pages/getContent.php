<?php
include('../db/connection.php');
if(!empty($_GET['id'])){
   $id=$_GET['id'];
    //get content from database
	?>
	<script>
	
	function show1(){
	    var bno=document.getElementById('bno').value;
	   var all_location_id = document.querySelectorAll('input[name="result[]"]:checked');

var aIds = [];

for(var x = 0, l = all_location_id.length; x < l;  x++)
{
    aIds.push(all_location_id[x].value);
}

var str = aIds.join('#');
self.location="print_result2.php?bno="+bno+"&str="+encodeURIComponent(str);
console.log(str);
     
       }

			function show2(){
	    var bno=document.getElementById('bno').value;
	   var all_location_id = document.querySelectorAll('input[name="result[]"]:checked');

var aIds = [];

for(var x = 0, l = all_location_id.length; x < l;  x++)
{
    aIds.push(all_location_id[x].value);
}

var str = aIds.join('#');
self.location="print_result4.php?bno="+bno+"&str="+encodeURIComponent(str);
console.log(str);
     
       }
		//alert(t);
	
	
	</script>
	<form method="post" action="">
	    	<input type="hidden" name="bno" id="bno" value="<?php echo $id; ?>"/>
	<table class="table">
	<tr>
	<th>Sno</th>
	<th>Test Name</th>
	<th>Result Entry</th>
	</tr>
	<?php
	 $y="SELECT * FROM bill1 WHERE bno='$id'";
    $query = mysqli_query($link,$y) or die(mysqli_error($link));
    
    if(mysqli_num_rows($query)>0){
		$i=1;
       while($rd=mysqli_fetch_array($query)){?>
        <tr>
		<td>
	
		<input type="checkbox" name="result[]" id="result<?php echo $i; ?>" value="<?php echo $rd['testname']; ?>" onclick="show(<?php echo $i ?>,this.value);"/></td>
		<td><?php echo $tname=$rd['testname'];?></td>
		<?php 
		$uy="select * from resultentry3 where bno='$id' and tname='$tname'";
		$t=mysqli_query($link,$uy) or die(mysqli_error($link));
		$t1=mysqli_num_rows($t);
		if($t1 >= 1){
			$result="Yes";
		}else{
			$result="No";
		}
		
		?>
		<td><?php echo $result;?></td>
		</tr>
       
	<?php	
	 $i++;  }
    }else{ ?>
        <tr > <td colspan="3">No Data Found</td></tr>
  <?php   } ?>
</table>

<input type="button"   value="Report" onClick="show1()"/><!-- <input type="button"   value="Continuos Report" onClick="show2()"/>-->
</form>

<?php }?>