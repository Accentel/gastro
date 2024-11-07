<?php
ob_start();

require_once 'dashboard/db/connection.php';

session_start();

// username and password sent from Form
$myusername="admin";
$mypassword="admin";
$password = md5($mypassword);
  $sql = "SELECT name1,passowrd FROM login WHERE name1='$myusername'  and passowrd='$password' ";
$result=mysqli_query($link,$sql) or die(mysqli_error($link));
$row=mysqli_fetch_array($result);
//$active=$row['active'];
 $count=mysqli_num_rows($result);
 $user=$row['name1'];

if($count==1)
{

$_SESSION['user']=$user;
//$_SESSION['ename1']=$empname;
header("location:dashboard/pages/dashboard.php");
 //echo '<script type="text/javascript">
      //     window.location = "dashboard.php"
   //   </script>';
}
else
{
print "<script>";
	print "alert('Enter Wrong User Name or Password');";
	print "self.location='index.php';";
	print "</script>";

}

?>