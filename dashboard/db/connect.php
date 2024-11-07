<?php
class connect
{
 public function connect()
 {
  $con=mysqli_connect("localhost","accentel_gastro","accentel_gastro","accentel_gastro");
  //mysql_select_db("dbtuts");
 }
 public function setdata($con,$sql)
 {
  mysqli_query($con,$sql);
 }
 public function getdata($con,$sql)
 {
  return mysqli_query($con,$sql);
 }
 public function delete($con,$sql)
 {
  mysqli_query($con,$sql);
 }
 public function escape_string($value)
	{
		return $con->real_escape_string($value);
	}
}
?>