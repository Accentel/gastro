<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])
{
 ?>
<?php include("header.php");?>
<script>
function reportxx(){
	var mrno = document.getElementById("mrno").value;
		alert(mrno);
	window.open('patient_history.php?mrno='+mrno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
}
</script>	
<?php // echo  $no = '$no';
    $newtimestamp = strtotime($doct1. ' + 330 minute');//gets timestamp
    //convert into whichever format you need 
     $newdate = date('d-m-Y H:i:s', $newtimestamp);
//echo "Right now: " . $now_stamp;
//echo "5 minutes from right now: " . $expire_stamp;


 $day2=date('Y-m-d', strtotime($newdate));

	$NewDate1 = date('Y-m-d', strtotime($day2 . " +$valdity days"));

  $daykk=date('d-m-Y', strtotime($NewDate1));
?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                
                                </li>
                                <li class="active">Patients History Report</li>
                            </ol>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Patients History Report</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								
							 <form method="post" name="myform" >                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>MR No:</label>
	                                         
												 <input id="mrno" class="form-control" name="mrno"  >

	                                        </div>
											
										
											
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Bill Type</label>
	                                         
												 <select class="form-control" name="btype" id="btype"  >
												<option value="">Select Bill Type</option>
												<option value="Patient Registration">Patient Registration</option>
												<option value="OP Cancel">OP Cancel</option>
												<option value="IP Registration">IP Registration</option>
												<option value="IP Return">IP Return</option>
												<option value="Advance Collection">Advance Collection</option>
												<option value="Lab Bill">Lab Bill</option>
												<option value="Lab Cancel">Lab Cancel</option>
												<option value="Procedure Lab Bill">Procedure Lab Bill</option>
												<option value="Procedure Lab Cancel">Procedure Lab Cancel</option>
												<option value="Discharge Summary">Discharge Summary</option>
												<option value="Final Bill">Final Bill</option>
												<option value="Pharmacy">Pharmacy</option>
												</select>     

	                                        </div>
                                    </div> 
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Report" >
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					<?php
					
					if(isset($_POST['submit'])){
					$mrno=$_POST['mrno'];
					$btype=$_POST['btype'];
					if($btype!=''){
					if($btype=="Patient Registration"){
					?>
				<h3 align="center">Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Patient Type</td>
<td>Date</td>
<td>Dr.Name</td>
<td>Address</td>
<td>Mobile No</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from patientregister where registerno='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['registerno']; ?></td>
<td><?php echo $q1['patientname']; ?></td>
<td><?php echo $q1['age']."/".$q1['gender']; ?></td>
<td><?php echo $q1['pat_type']; ?></td>
<td><?php echo $q1[date]('d.M Y',strtotime($newdate)); ?></td>
<td><?php echo $q1['doctorname']; ?></td>
<td><?php echo $q1['address']; ?></td>
<td><?php echo $q1['phoneno']; ?></td>
<td><?php echo $q1['cons_fee']; ?></td>
</tr>

<?php }?>

</table>

					
					<?php } else if($btype=="OP Cancel"){
					?>
				<h3 align="center">Patient Canceled</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Patient Type</td>
<td>Date</td>
<td>Dr.Name</td>
<td>Address</td>
<td>Mobile No</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from patientregister where registerno='$mrno' and pcancel='Canceled' ") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['registerno']; ?></td>
<td><?php echo $q1['patientname']; ?></td>
<td><?php echo $q1['age']."/".$q1['gender']; ?></td>
<td><?php echo $q1['pat_type']; ?></td>
<td><?php echo $q1['registerdate']; ?></td>
<td><?php echo $q1['doctorname']; ?></td>
<td><?php echo $q1['address']; ?></td>
<td><?php echo $q1['phoneno']; ?></td>
<td><?php echo $q1['cons_fee']; ?></td>
</tr>

<?php }?>

</table>

					
					<?php } else if($btype=="IP Registration"){
					?>
			<h3 align="center">In Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>IP No</td>
<td>Pat Name</td>
<td>Age/Gender</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>Status</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from ip_pat_admit where PAT_REGNO='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
    $mrn=$q1['PAT_REGNO'];
    $uy=mysqli_query($link,"select * from patientregister where registerno='$mrn'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1['PAT_REGNO']; ?></td>
<td><?php echo $q1['PAT_NO']; ?></td>
<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>

<td><?php echo $q1['ADMIT_DATE']."/".$q1['ADMIT_TIME']; ?></td>
<td><?php echo $q1['Discharge_date']."/".$q1['Discharge_Time']; ?></td>
<td><?php echo $q1['DIS_STATUS']; ?></td>
</tr>

<?php }?>

</table>
<?php } else if($btype=="Advance Collection"){
					?>
			<h3 align="center">Advance Collection</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>IP No</td>
<td>Pat Name</td>
<td>Age/Gender</td>
<td>Pay Date</td>
<td>Amount</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from adv_collection where mrno='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
    $mrn=$q1['mrno'];
    $uy=mysqli_query($link,"select * from patientregister where registerno='$mrn'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1['mrno']; ?></td>
<td><?php echo $q1['PAT_NO']; ?></td>
<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>


<td><?php echo $q1['ADV_DATE']." ".$q1['time']; ?></td>
<td><?php echo $q1['ADV_AMT']; ?></td>
</tr>

<?php }?>

</table>

					
					<?php } else if($btype=="IP Return"){
					?>
			<h3 align="center">IP Return</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>

<td>Amount</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from ipreturn where mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']." ".$q11['time']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['ramount']; ?></td>

</tr>

<?php }?>

</table>

					
					<?php } else if($btype=="Lab Bill"){?>
					
<h3 align="center">Lab Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Patient Type</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
 $uy="select * from bill where mrno='$mrno'";
$query1=mysqli_query($link,$uy) or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']." ".$q11['time']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
<td><a onclick="window.open('labprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>
<?php }?>

</table>


				<?php }else if($btype=="Procedure Lab Bill"){?>
					
<h3 align="center">Procedure Lab Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Patient Type</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill_proc where mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate'].$q11['time'];; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
<td><a onclick="window.open('plabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>
<?php }?>

</table>


				<?php }else if($btype=="Lab Cancel"){?>
					
<h3 align="center">Lab Cancel</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>
<!--<td>View</td>-->
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill  where bill_cancel='Cancel' and  mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['cadate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['caamount']; ?></td>
<!--<td><a onclick="window.open('clabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>-->
</tr>
<?php }?>

</table>


				<?php } else if($btype=="Procedure Lab Cancel"){?>
					
<h3 align="center">Procedure Lab Cancel</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Name</td>
<td>Age/Gender</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>
<!--<td>View</td>-->
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill_proc  where bill_cancel='Cancel' and  mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['cadate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['caamount']; ?></td>
<!--<td><a onclick="window.open('cplabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>-->
</tr>
<?php }?>

</table>


				<?php } else if($btype=="Discharge Summary"){?>
					
<h3 align="center">Discharge Summary</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Pat No</td>
<td>MR No</td>
<td>Name</td>
<td>Age / Gender</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>View</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query12=mysqli_query($link,"select * from adddischarge where mrno='$mrno'") or die(mysqli_error($link));
while($q112=mysqli_fetch_array($query12)){
 ?>
<tr>
<td><?php echo $bno1=$q112['patno']; ?></td>
<td><?php echo $q112['mrno']; ?></td>
<td><?php echo $q112['pname']; ?></td>
<td><?php echo $q112['age']."/".$q112['sex']; ?></td>

<td><?php echo $q112['admit']; ?></td>
<td><?php echo $q112['discharge']; ?></td>

<!--<td><a href="print_discharge5.php?id=<?php echo $q112['id']; ?>">View</a></td>-->
<td><a onclick="window.open('print_discharge5.php?id=<?php echo $q112['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>

<?php }?>

</table>


				<?php } else if($btype=="Pharmacy"){?>
					
<h3 align="center">Pharmacy Sales Report</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Sale Date</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
 $zx="select * from phr_salent_mast where mrnum='$mrno'";
$query123=mysqli_query($link,$zx) or die(mysqli_error($link));
while($q1123=mysqli_fetch_array($query123)){
    $lno=$q1123['LR_NO'];
    $cust=$q1123['mrnum'];
 $uy=mysqli_query($link,"select * from patientregister where registerno='$cust'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1123['mrnum']; ?></td>

<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>
<td><?php echo $q1123['SAL_DATE']; ?></td>
<td><?php echo $q1123['final_amnt']; ?></td>
<td><a onclick="window.open('cmedbill.php?id=<?php echo $q1123['LR_NO']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>

<?php }?>

</table>


				<?php } else if($btype=="Final Bill"){?>
					
<h3 align="center">Final Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Name</td>
<td>Age/Gender</td>

<td>Admit Date</td>
<td>Discharge Date</td>
<td>View</td>
</tr>
<?php

$query123=mysqli_query($link,"select * from final_bill_fin where mrno='$mrno'") or die(mysqli_error($link));
while($q1123=mysqli_fetch_array($query123)){
   
 ?>
<tr>

<td><?php echo $q1123['mrno']; ?></td>
<td><?php echo $q1123['pname']; ?></td>
<td><?php echo $q1123['age']."/".$q1123['sex']; ?></td>

<td><?php echo $q1123['doa']; ?></td>
<td><?php echo $q1123['dichargedate']; ?></td>
<td><a onclick="window.open('pfinal.php?id=<?php echo $q1123['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>

</tr>

<?php }?>

</table>
				<?php }else{} ?>
				
				
				<?php }else{ ?>
				
				<!-- start-->
				<h3 align="center">Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Patient Type</td>
<td>Date</td>
<td>Dr.Name</td>
<td>Address</td>
<td>Mobile No</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from patientregister where registerno='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['registerno']; ?></td>
<td><?php echo $q1['patientname']; ?></td>
<td><?php echo $q1['age']."/".$q1['gender']; ?></td>
<td><?php echo $q1['pat_type']; ?></td>
<td><?php echo $q1['registerdate']; ?></td>
<td><?php echo $q1['doctorname']; ?></td>
<td><?php echo $q1['address']; ?></td>
<td><?php echo $q1['phoneno']; ?></td>
<td><?php echo $q1['cons_fee']; ?></td>
</tr>

<?php }?>

</table>

					
					
				<h3 align="center">Patient Canceled</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Patient Type</td>
<td>Date</td>
<td>Dr.Name</td>
<td>Address</td>
<td>Mobile No</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from patientregister where registerno='$mrno' and pcancel='Canceled' ") or die(mysqli_error($link));
$pc=mysqli_num_rows($query);
if($pc > 0){
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['registerno']; ?></td>
<td><?php echo $q1['patientname']; ?></td>
<td><?php echo $q1['age']."/".$q1['gender']; ?></td>
<td><?php echo $q1['pat_type']; ?></td>
<td><?php echo $q1['registerdate']; ?></td>
<td><?php echo $q1['doctorname']; ?></td>
<td><?php echo $q1['address']; ?></td>
<td><?php echo $q1['phoneno']; ?></td>
<td><?php echo $q1['cons_fee']; ?></td>
</tr>

<?php } }else{?>
<tr><td colspan="9" style="text-align:center;"> No Records Found</td></tr>
<?php }?>
</table>

					
					
			<h3 align="center">In Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>IP No</td>
<td>Pat Name</td>
<td>Age/Gender</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>Status</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from ip_pat_admit where PAT_REGNO='$mrno'") or die(mysqli_error($link));
$ipr=mysqli_num_rows($query);
if($ipr > 0){

while($q1=mysqli_fetch_array($query)){
    $mrn=$q1['PAT_REGNO'];
    $uy=mysqli_query($link,"select * from patientregister where registerno='$mrn'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1['PAT_REGNO']; ?></td>
<td><?php echo $q1['PAT_NO']; ?></td>
<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>

<td><?php echo $q1['ADMIT_DATE']."/".$q1['ADMIT_TIME']; ?></td>
<td><?php echo $q1['Discharge_date']."/".$q1['Discharge_Time']; ?></td>
<td><?php echo $q1['DIS_STATUS']; ?></td>
</tr>

<?php }?>
<?php }else{ ?>
<tr><td colspan="7" style="align:center;"> No Records Found</td></tr>
<?php }?>
</table>

			<h3 align="center">Advance Collection</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>IP No</td>
<td>Pat Name</td>
<td>Age/Gender</td>
<td>Pay Date</td>
<td>Amount</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from adv_collection where mrno='$mrno'") or die(mysqli_error($link));
$avc=mysqli_num_rows($query);
if($avc > 0){

while($q1=mysqli_fetch_array($query)){
    $mrn=$q1['mrno'];
    $uy=mysqli_query($link,"select * from patientregister where registerno='$mrn'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1['mrno']; ?></td>
<td><?php echo $q1['PAT_NO']; ?></td>
<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>


<td><?php echo $q1['ADV_DATE']." ".$q1['time']; ?></td>
<td><?php echo $q1['ADV_AMT']; ?></td>
</tr>

<?php }
}else{?>
<tr><td colspan="6">No Records Found</td></tr>
<?php }?>
</table>

					
				
			<h3 align="center">IP Return</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>

<td>Amount</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from ipreturn where mrno='$mrno'") or die(mysqli_error($link));
$ipr=mysqli_num_rows($query);
if($ipr > 0){

while($q11=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']." ".$q11['time']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['ramount']; ?></td>

</tr>

<?php }}else{?>
<tr><td colspan="6" style="text-align:center;">No Records Found</td></tr>
<?php }?>
</table>

					
				
					
<h3 align="center">Lab Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Patient Type</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
 $uy="select * from bill where mrno='$mrno'";
$query1=mysqli_query($link,$uy) or die(mysqli_error($link));
$lb=mysqli_num_rows($query1);
if($lb > 0){

while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']." ".$q11['time']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
<td><a onclick="window.open('labprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>
<?php } }else{?>
<tr><td colspan="8" style="text-align:center;">No Records Found</td></tr>
<?php }?>
</table>
		
<h3 align="center">Procedure Lab Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Patient Type</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill_proc where mrno='$mrno'") or die(mysqli_error($link));
$plb=mysqli_num_rows($query1);
if($plb > 0){

while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate'].$q11['time'];; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
<td><a onclick="window.open('plabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>
<?php } }else{?>
<tr><td colspan="7" style="text-align:center;">No Records Found</td></tr>
<?php }?>
</table>

<h3 align="center">Lab Cancel</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Pat Name</td>
<td>Age/Gendor</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>
<!--<td>View</td>-->
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill  where bill_cancel='Cancel' and  mrno='$mrno'") or die(mysqli_error($link));
$lbc=mysqli_num_rows($query1);
if($lbc > 0){

while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['cadate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['caamount']; ?></td>
<!--<td><a onclick="window.open('clabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>-->
</tr>
<?php } }else{?>
<tr><td colspan="7" style="text-align:center;">No Records Found</td></tr>
<?php }?>
</table>

<h3 align="center">Procedure Lab Cancel</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Name</td>
<td>Age/Gender</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>
<!--<td>View</td>-->
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill_proc  where bill_cancel='Cancel' and  mrno='$mrno'") or die(mysqli_error($link));
$plcc=mysqli_num_rows($query1);
if($plcc > 0){

while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['pname']; ?></td>
<td><?php echo $q11['age']."/".$q11['gender']; ?></td>

<td><?php echo $q11['cadate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['caamount']; ?></td>
<!--<td><a onclick="window.open('cplabprint.php?id=<?php echo $q11['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>-->
</tr>
<?php } }else{?>
<tr><td colspan="7"> No Records Found</td></tr>
<?php }?>
</table>

<h3 align="center">Discharge Summary</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Pat No</td>
<td>MR No</td>
<td>Name</td>
<td>Age / Gender</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>View</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query12=mysqli_query($link,"select * from adddischarge where mrno='$mrno'") or die(mysqli_error($link));
$dc=mysqli_num_rows($query12);
if($dc > 0){

while($q112=mysqli_fetch_array($query12)){
 ?>
<tr>
<td><?php echo $bno1=$q112['patno']; ?></td>
<td><?php echo $q112['mrno']; ?></td>
<td><?php echo $q112['pname']; ?></td>
<td><?php echo $q112['age']."/".$q112['sex']; ?></td>

<td><?php echo $q112['admit']; ?></td>
<td><?php echo $q112['discharge']; ?></td>

<!--<td><a href="print_discharge5.php?id=<?php echo $q112['id']; ?>">View</a></td>-->
<td><a onclick="window.open('print_discharge5.php?id=<?php echo $q112['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>

<?php } }else{?>
<tr><td colspan="7"> No Records Found</td></tr>
<?php }?>
</table>


			
					
<h3 align="center">Pharmacy Sales Report</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Sale Date</td>
<td>Amount</td>
<td>View</td>
</tr>
<?php
 $zx="select * from phr_salent_mast where mrnum='$mrno'";
$query123=mysqli_query($link,$zx) or die(mysqli_error($link));
$ps=mysqli_num_rows($query123);
if($ps > 0){

while($q1123=mysqli_fetch_array($query123)){
    $lno=$q1123['LR_NO'];
    $cust=$q1123['mrnum'];
 $uy=mysqli_query($link,"select * from patientregister where registerno='$cust'") or die(mysqli_error($link));
    $uy1=mysqli_fetch_array($uy);
 ?>
<tr>
<td><?php echo $q1123['mrnum']; ?></td>

<td><?php echo $uy1['patientname']; ?></td>
<td><?php echo $uy1['age']." / ".$uy1['gender']; ?></td>
<td><?php echo $q1123['SAL_DATE']; ?></td>
<td><?php echo $q1123['final_amnt']; ?></td>
<td><a onclick="window.open('cmedbill.php?id=<?php echo $q1123['LR_NO']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>
</tr>

<?php } }else{?>
<tr><td colspan="6">No Records Found</td></tr>
<?php }?>
</table>


			
					
<h3 align="center">Final Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Name</td>
<td>Age/Gender</td>

<td>Admit Date</td>
<td>Discharge Date</td>
<td>View</td>
</tr>
<?php

$query123=mysqli_query($link,"select * from final_bill_fin where mrno='$mrno'") or die(mysqli_error($link));
$pcd=mysqli_num_rows($query123);
if($pcd > 0){

while($q1123=mysqli_fetch_array($query123)){
   
 ?>
<tr>

<td><?php echo $q1123['mrno']; ?></td>
<td><?php echo $q1123['pname']; ?></td>
<td><?php echo $q1123['age']."/".$q1123['sex']; ?></td>

<td><?php echo $q1123['doa']; ?></td>
<td><?php echo $q1123['dichargedate']; ?></td>
<td><a onclick="window.open('pfinal.php?id=<?php echo $q1123['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">View</a></td>

</tr>

<?php } }else{?>

<tr><td colspan="6">No Records Found</td> </tr>
<?php }?>
</table>
			
				
				<!--end-->
				<?php }?>
				
				<?php }?>
			<table>
			    
			</table>		
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>