<?php
include("../db/connection.php");
if(isset($_REQUEST['Submit'])){
$ename = $_REQUEST['ename'];
 $uname = $_REQUEST['user_id'];
$pwd1 = $_REQUEST['pwd'];
$user = $_REQUEST['user'];
$menu=$_REQUEST['menu'];
$pwd = md5($pwd1);
//mysqli_query($link,"deleter from ")
$result = mysqli_query($link,"select * from login where name1='$uname'");
 $rows = mysqli_num_rows($result);

if($rows > 0){
 $query1="update  login set name1='$uname',passowrd='$pwd',pass1='$pwd1' where ename='$ename'";

}else{
	$query1="insert into login(name1,passowrd,ename,pass1) values('$uname','$pwd','$ename','$pwd1')";

}
$query = mysqli_query($link,$query1) or die(mysql_error());
$sql = mysqli_query($link,"update employee set user='$uname', pass='$pwd1' where empcode=$ename");

if($query){
    echo $kk="delete from hr_user where emp_id='$ename'";
mysqli_query($link,$kk) or die(mysqli_error($link));
//exit;
for($j = 0; $j < count($menu); $j++){
 $menuname = $menu[$j];
 $ts="select * from hr_user where emp_id='$ename' and menus='$menuname' ";
$p=mysqli_query($link,$ts) or die(mysqli_error($link));
 $count=mysqli_num_rows($p);
if($count > 0){
	 $t="update hr_user set  menus='$menuname' where emp_id='$ename' and menus='$menuname'";
	$qry=mysqli_query($link,$t) or die(mysql_error());
}else{
	
echo		 $t="insert into hr_user(emp_id, menus, currentdate,auth_by) values('$ename','$menuname',now(),'$user')";
			
	$qry=mysqli_query($link,$t) or die(mysqli_error($link));

	}


	
			 }
 
// exit;
}	else{
	print "<script>";
	print "alert('Username or password already exists');";
	print "self.location='userview.php';";
	print "</script>";
}	
if($qry){
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='userview.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='userview.php';";
	print "</script>";
}


}
?>