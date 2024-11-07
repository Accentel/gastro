<?php 
include('../db/connection.php');
session_start();
if($_SESSION['user'])
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <link rel="stylesheet" href="../js/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function validate(){
	
	var emp_value ="";
	//var selected=false;

  for (var i=0; i < document.docpat.empid.length; i++){

   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="finalbill_popup13.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		  //alert(showdata);
		  var strar = showdata.split("|");
		//alert(strar);
		  if(strar.length>0){
			 //window.opener.location.reload();
			 //window.location.reload(); 
	 //alert(strar.length);
		//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;

	//alert('<%=current_date%>')
			opener.document.getElementById("pname").value=strar[1];
			opener.document.getElementById("age").value=strar[2];
			opener.document.getElementById("gender").value=strar[3];
			opener.document.getElementById("dname").value=strar[4];
			opener.document.getElementById("mobile").value=strar[5];
			opener.document.getElementById("mrno").value=strar[6];
		
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
	</head>

	<body>


	
                       <form name="frm" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td>Search By MR No : <input type="text" name="mno" id="mno" /></td><td>Search By Name: <input type="text" name="wno" id="wno" /></td>
<td align="left"><input name="submit" type="submit" value="Search"  /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>MR NO</TH><TH>PATIENT NAME.</TH><TH>Gender</TH></tr>
<?php 
			  include("../db/connection.php");
			  
			   if(isset($_REQUEST['submit'])){
				$mno=$_REQUEST['mno'];
				$wno=$_REQUEST['wno'];
				$sq=mysqli_query($link,"select * from patientregister  WHERE  patientname='$wno' or registerno='$mno'");
				if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			  $a= $res['reg_id'];
			  $a1 = $res['gender'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $r ?></td><td><?php echo $h ?></td><td><?php echo $a1;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				  $x="select * from patientregister order by reg_id desc";
				$sq=mysqli_query($link,$x) or die(mysqli_error($link));
	 
			if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 $a = $res['reg_id'];
			  $a1 = $res['gender'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px">
			 <td style="text-align:center;">
             <input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $r;?></td>
			 <td><?php echo $h ?></td>
			 <td><?php echo $a1 ?></td>
			 </tr>
             <?php }
			 
			 }
			 }
			 ?></table>
              <?php if($rows==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
</body>
</html>

<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {

    $("#mno").autocomplete({
        source: "set692.php",
        minLength: 1
    });  
    
     $("#wno").autocomplete({
        source: "set693.php",
        minLength: 1
    });  
    
    
    
});
</script>
<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>