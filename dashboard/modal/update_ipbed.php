   
    <?php
include("../db/connection.php");
//include("config.php");
if(isset($_POST['submit'])){
//error_reporting(E_ALL);
$patno=$_POST['patno'];
$admitdate=$_POST['admitdate'];
$intime=$_POST['time'];
 //old bdetails
$sno=$_POST['sno'];
$bedno=$_POST['bedno'];
$roomno=$_POST['roomno'];
$roomtype=$_POST['roomtype'];
$lname=$_POST['lname'];

//new dbetails

$bedsno=$_POST['bedsno'];
$roomsno=$_POST['roomsno'];
$room_type=$_POST['room_type'];
$room_location=$_POST['room_location'];

//update 
 $k="update beds set status='in'  where  id='$bedno' and ltype='$lname' and rtype='$roomtype' and roomno='$roomno' ";

mysqli_query($link,$k) or die(mysqli_error($link)); 
mysqli_query($link,"update ip_pat_bed set END_DATE='$admitdate',END_TIME=str_to_date('$intime','%r') where SNO='$sno'") or die(mysqli_error($link));

mysqli_query($link,"insert into ip_pat_bed(PAT_NO,BED_NO,room_no,room_type,location,START_DATE,START_TIME)
 values('$patno','$bedsno','$roomsno','$room_type','$room_location','$admitdate',str_to_date('$intime','%r'))") or die(mysqli_error($link));

mysqli_query($link,"update ip_pat_admit set BED_NO='$bedsno',room_loc='$room_location',room_type='$room_type',room_no='$roomsno' where PAT_NO='$patno'") or die(mysqli_error($link)); 
   $h= "update beds set status='out'  where  id='$bedsno' and ltype='$room_location' and rtype='$room_type' and roomno='$roomsno' ";
  
    $u=mysqli_query($link,$h) or die(mysqli_error($link));
    
//$sq1=mysql_query($ff1);
if($u)
		{
//header("location:patient-reg.php");
print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='../pages/ipbedlist.php';";
			print "</script>";

}
}
?>