<?php
session_start();
$ses= $_SESSION['user'] ;
if($_SESSION['user'])
{
    $ses=$_SESSION['user'];
 ?><?php
include("../db/connection.php");
//include("header.php");?>
<?php  include("header.php");?>
<script type="text/javascript">
function report()
{
var s_date=document.form.fdate.value;
   		    window.open('Ch_SalesEntry.php?s_date='+s_date,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report1()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('labbill_report.php?fdate='+s_date+'&tdate='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
<script type="text/javascript">
function report4()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('labbill_due.php?fdate='+s_date+'&tdate='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report2()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;var ses=document.form.ses.value;
   		    window.open('admit_patients.php?sdate='+s_date+'&edate='+s_date1+'&ses='+ses,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report3()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('view_in_patient_admit8.php?s_date='+s_date+'&e_date='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
			<?php 
			$d=date('Y-m-d');	
//opcount
$kk1=mysqli_query($link,"select * from patientregister where date='$d' and pat_type1='New'") or die(mysqli_error($link));
$newcount=mysqli_num_rows($kk1);
//exitcount
$kk12=mysqli_query($link,"select * from patientregister where date='$d' and pat_type1='Existing'") or die(mysqli_error($link));
$exitcount=mysqli_num_rows($kk12);
			?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
						<?php
$d=date('Y-m-d');					
 $a="SELECT * FROM `patientregister` where date='$d'  and pcancel=''";
					$sq=mysqli_query($link,$a);
					$r=mysqli_fetch_array($sq);
					$cnt=mysqli_num_rows($sq);?>
					
                    <!-- start widget -->
					
					<form name="form" method="post">
					<input type="hidden" name="sname" id="fdate" value="<?php echo date('Y-m-d');?>">
					<input type="hidden" name="ses" id="ses" value="<?php echo $ses;?>">
					<div class="row">
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-purple">
	                           <!-- <a href='book_appointment.php'><h3 class="text-white box-title">New Appointments <span class="pull-right">(ToDay)
								<i class="fa fa-caret-up"></i> <?php echo $cnt?></span></h3>-->
								<h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" value="OUT Patients" onclick="report3();">
							 
							  <i class="fa fa-caret-up"></i> <?php echo $cnt;?></h3>
								
								
	                            <div ><b>New Patients-</b><?php echo $newcount; ?><br/><b>Existing Patients-</b><?php echo $exitcount; ?></div>
								</a>
	                        </div>
	                    </div>
						<?php
					
  $a="SELECT * FROM `ip_pat_admit`
 where DIS_STATUS='ADMITTED' and ADMIT_DATE='$d' ";
$sq=mysqli_query($link,$a);
$i=1;
$ip=mysqli_num_rows($sq);
?>
<?php
  $a="SELECT * FROM `phr_salent_mast` where  SAL_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$phar=mysqli_num_rows($sq);
				
				$l="select * from bill where bdate='$d'";
				$lb=mysqli_query($link,$l);
				$lbc=mysqli_num_rows($lb);
				$l1="select * from bill where bamount='$d'";
				$lb1=mysqli_query($link,$l1);
				$lbdc=mysqli_num_rows($lb1);
				$d1="select * from daycarebill where bdate='$d'";
				$db=mysqli_query($link,$d1);
				$dbc=mysqli_num_rows($db);
				$p="select * from physiotherapybill where bdate='$d'";
				$pb=mysqli_query($link,$p);
				$pbc=mysqli_num_rows($pb);		
					?>
					
					
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-danger">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" value="InPatients" onclick="report2();">
							 
							  <i class="fa fa-caret-up"></i> <?php echo $ip;?></h3>
								
							</span></h3>
	                            <div id="sparkline12"><canvas style="display: inline-block; width: 367px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
						<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" value="Lab Bill" onclick="report1();">
								
								<i class="fa fa-caret-up"></i> <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: inline-block; width: 367px; height: 40px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
						<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" value="Lab Due" onclick="report4();">
								
								<i class="fa fa-caret-up"></i> <?php echo $lbdc;?></span></h3>
	                            <div id="sparkline9"><canvas style="display: inline-block; width: 367px; height: 40px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
						</form>
						<!--
						<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-success">
	                          <a href='salesentry_list.php'>  <h3 class="text-white box-title">Lab Bill <span class="pull-right"><i class="fa fa-caret-up"></i> <?php echo $lbc?></span></h3>
	                            <div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
								</a>
	                        </div>
	                    </div>
						
						
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h4 class="text-white box-title">Lab Bill <span class="pull-right"><i class="fa fa-caret-up"></i><?php echo $lbdc?></span></h4>
								 <div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
								
	                        </div>
	                    </div>-->
	                    
                	</div>
					
					<?php
					
						$q="select ename from login where name1='$ses' ";
					$y=mysqli_query($link,$q) or die(mysqli_error($link));
						$y1=mysqli_fetch_array($y);
					$ename=$y1['ename'];
					
					$q1="select a.deptname from employee c,empdept a  where c.department=a.id  and c.empcode='$ename' ";
					$y2=mysqli_query($link,$q1) or die(mysqli_error($link));
					$y11=mysqli_fetch_array($y2);
					$dpt=$y11['deptname'];
					?>
<?php
$d=date('Y-m-d');	
//opcount
$kk1=mysqli_query($link,"select * from patientregister where date='$d' and pat_type1='New'") or die(mysqli_error($link));
$newcount=mysqli_num_rows($kk1);
//exitcount
$kk12=mysqli_query($link,"select * from patientregister where date='$d' and pat_type1='Existing'") or die(mysqli_error($link));
$exitcount=mysqli_num_rows($kk12);
//inpatient

if($ses=='admin'){
   			$a="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'  ";
   			$ipUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			$ipUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			$ipCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			$ipCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
   			$ipcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'  ";
   				 
   				 
}else{
     $a="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'  ";
	 $ipUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
	 $ipUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
	 $ipCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
	 $ipCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
     $ipcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and pay_type='cash' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'  ";
   				 
   				 
    
    
}
					$sq=mysqli_query($link,$a);
					$r=mysqli_fetch_array($sq);
					$ip_convert=$r['amt'];
					
					$ipUPILAB1=mysqli_query($link,$ipUPILAB);
					$ipUPILAB2=mysqli_fetch_array($ipUPILAB1);
					$ip_UPILAB=$ipUPILAB2['UPILAB'];
				
					$ipUPIHOSPITAL1=mysqli_query($link,$ipUPIHOSPITAL);
					$ipUPIHOSPITAL2=mysqli_fetch_array($ipUPIHOSPITAL1);
					$ip_UPIHOSPITAL=$ipUPIHOSPITAL2['UPIHOSPITAL'];
					
					$ipCARDLAB1=mysqli_query($link,$ipCARDLAB);
					$ipCARDLAB2=mysqli_fetch_array($ipCARDLAB1);
					$ip_CARDLAB=$ipCARDLAB2['CARDLAB'];
				
					$ipCARDHOSPITAL1=mysqli_query($link,$ipCARDHOSPITAL);
					$ipCARDHOSPITAL2=mysqli_fetch_array($ipCARDHOSPITAL1);
					$ip_CARDHOSPITAL=$ipCARDHOSPITAL2['CARDHOSPITAL'];
					
					$ipcash1=mysqli_query($link,$ipcash);
					$ipcash2=mysqli_fetch_array($ipcash1);
					$ip_cash=$ipcash2['amt'];
					
					
					
					
					//ip return amount
					if($ses=='admin'){
					
					$auy="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'IP Return Amount' and amnt_desc='IP Return Amount' and date(date1)='$d'  ";
					}else{
					$auy="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and  `amnt_type` = 'IP Return Amount' and amnt_desc='IP Return Amount' and date(date1)='$d'  ";
					}
					$squy=mysqli_query($link,$auy);
					$ruy=mysqli_fetch_array($squy);
					$ip_return=$ruy['amt'];
	//advance collection
	if($ses=='admin'){
			 $aamt="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
			 $advUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
			 $advUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
			 $advCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
			 $advCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
			 $advcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and  `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
				 
	}else{
	    $aamt="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
		$advUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
		$advUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
		$advCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
	    $advCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'Advance Collection'  and date(date1)='$d'   ";
		$advcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and pay_type='cash' and  `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
				 
	}
					$sqamt=mysqli_query($link,$aamt);
					$ramt=mysqli_fetch_array($sqamt);
					$adv=$ramt['amt'];
					
					$advUPILAB1=mysqli_query($link,$advUPILAB);
					$advUPILAB2=mysqli_fetch_array($advUPILAB1);
					$advUPILAB20=$advUPILAB2['amt'];	
					
					$advUPIHOSPITAL1=mysqli_query($link,$advUPIHOSPITAL);
					$advUPIHOSPITAL2=mysqli_fetch_array($advUPIHOSPITAL1);
					$advUPIHOSPITAL20=$advUPIHOSPITAL2['amt'];
					
					$advCARDLAB1=mysqli_query($link,$advCARDLAB);
					$advCARDLAB2=mysqli_fetch_array($advCARDLAB1);
					$advCARDLAB20=$advCARDLAB2['amt'];	
					
					$advCARDHOSPITAL1=mysqli_query($link,$advCARDHOSPITAL);
					$advCARDHOSPITAL2=mysqli_fetch_array($advCARDHOSPITAL1);
					$advCARDHOSPITAL20=$advCARDHOSPITAL2['amt'];
					
					$advcash1=mysqli_query($link,$advcash);
					$advcash2=mysqli_fetch_array($advcash1);
					$advcash20=$advcash2['amt'];	
					
						
	
	
	//patient register
	
					if($ses=='admin'){
			 $a="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			 $prUPILAB="SELECT sum(amount) as UPILAB FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			 $prUPIHOSPITAL="SELECT sum(amount) as UPIHOSPITAL FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			 $prCARDLAB="SELECT sum(amount) as CARDLAB FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			 $prCARDHOSPITAL="SELECT sum(amount) as CARDHOSPITAL FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			 $prcash="SELECT sum(amount) as cash FROM `daily_amount` where pay_type='cash' and  `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
			  
			 
			 
					}else{
					     $a="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
						 $prUPILAB="SELECT sum(amount) as UPILAB FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
					     $prUPIHOSPITAL="SELECT sum(amount) as UPIHOSPITAL FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
						 $prCARDLAB="SELECT sum(amount) as CARDLAB FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
						 $prCARDHOSPITAL="SELECT sum(amount) as CARDHOSPITAL FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
					     $prcash="SELECT sum(amount) as cash FROM `daily_amount` where pay_type='cash' and  recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
					      
					}
				
				
					$sq=mysqli_query($link,$a);
					$r=mysqli_fetch_array($sq);
					$amnt=$r['amt'];
					
					$prUPILAB1=mysqli_query($link,$prUPILAB);
					$prUPILAB2=mysqli_fetch_array($prUPILAB1);
					$prUPILABamt=$prUPILAB2['UPILAB'];
				
					$prUPIHOSPITAL1=mysqli_query($link,$prUPIHOSPITAL);
					$prUPIHOSPITAL2=mysqli_fetch_array($prUPIHOSPITAL1);
					$prUPIHOSPITALamt=$prUPIHOSPITAL2['UPIHOSPITAL'];
					
					$prCARDLAB1=mysqli_query($link,$prCARDLAB);
					$prCARDLAB2=mysqli_fetch_array($prCARDLAB1);
					$prCARDLABamt=$prCARDLAB2['CARDLAB'];
				
					$prCARDHOSPITAL1=mysqli_query($link,$prCARDHOSPITAL);
					$prCARDHOSPITAL2=mysqli_fetch_array($prCARDHOSPITAL1);
					$prCARDHOSPITALamt=$prCARDHOSPITAL2['CARDHOSPITAL'];
					
					$sqpr=mysqli_query($link,$prcash);
					$rml=mysqli_fetch_array($sqpr);
					$prcash=$rml['cash'];
					
					
			//patient cancellation
				if($ses=='admin'){
			 $a1="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register' and amnt_desc='Patient Register Canceled' and date(date1)='$d'   ";
				}else{
				     $a1="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc='Patient Register Canceled' and date(date1)='$d'   ";
				}
				
					$sq1=mysqli_query($link,$a1);
					$r1=mysqli_fetch_array($sq1);
					$opcamnt=$r1['amt'];
			
			
			
		//patient cancel	
					if($ses=='admin'){
		$labamount="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register Canceled' and amnt_desc='Patient Register Canceled'  ";
					}else{
					    $labamount="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and `amnt_type` = 'Patient Register Canceled' and amnt_desc='Patient Register Canceled'  ";
					}
					$sqlabb=mysqli_query($link,$labamount);
					$rlab=mysqli_fetch_array($sqlabb);
					$lab_amount=$rrlab['amt'];	
					
						
					//lab due bill or labbill
					if($ses=='admin'){
			 $a2="SELECT sum(amount) as amt FROM `daily_amount` where amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
			 $lUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
			 $lUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
			 $lCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
			 $lCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
		     $lcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and  amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
					 
					 
					 
					}else{
					     $a2="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
						 $lUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
					      $lUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
						  $lCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill')  and date(date1)='$d'   ";
						  $lCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill') and date(date1)='$d'   ";
					      $lcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and pay_type='cash' and  amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
					 
					}
					$sq2=mysqli_query($link,$a2);
					
					$r2=mysqli_fetch_array($sq2);
					$lab_amnt=$r2['amt'];
					
					$lUPILAB1=mysqli_query($link,$lUPILAB);
					$lUPILAB2=mysqli_fetch_array($lUPILAB1);
					$lab_UPILAB=$lUPILAB2['amt'];
				
					$lUPIHOSPITAL1=mysqli_query($link,$lUPIHOSPITAL);
					$lUPIHOSPITAL2=mysqli_fetch_array($lUPIHOSPITAL1);
					$lab_UPIHOSPITAL=$lUPIHOSPITAL2['amt'];
					
					$lCARDLAB1=mysqli_query($link,$lCARDLAB);
					$lCARDLAB2=mysqli_fetch_array($lCARDLAB1);
					$lab_CARDLAB=$lCARDLAB2['amt'];
				
					$lCARDHOSPITAL1=mysqli_query($link,$lCARDHOSPITAL);
					$lCARDHOSPITAL2=mysqli_fetch_array($lCARDHOSPITAL1);
					$lab_CARDHOSPITAL=$lCARDHOSPITAL2['amt'];
					
					
					$lcash1=mysqli_query($link,$lcash);
					$lcash2=mysqli_fetch_array($lcash1);
					$lab_cash=$lcash2['amt'];
				
					
				
					
					
					
					
					
					
					//lab cancel amount
					if($ses=='admin'){
					 $lca2="SELECT sum(amount) as amt FROM `daily_amount` where amnt_type IN('Lab Canceled') and  date(date1)='$d'  ";
					}else{
					
					    $lca2="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and  amnt_type IN('Lab Canceled') and  date(date1)='$d'  ";
					}
				
					$lsq2=mysqli_query($link,$lca2);
					
					$lr2=mysqli_fetch_array($lsq2);
					$lab_camnt=$lr2['amt'];
	//procedure bill				
	if($ses=='admin'){
		
		     $pUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
			 $pUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
			 $pCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
			 $pCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
			 $pcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
			 $dea="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
	}else{
	$dea="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
	$pUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
	$pUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
	$pCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
	$pCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d'   ";
	$pcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and pay_type='cash' and  `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
					 
					 
	    
	}
					$desq=mysqli_query($link,$dea);
					$derd=mysqli_fetch_array($desq);
					$deamt=$derd['amt'];
					
					$pUPILAB1=mysqli_query($link,$pUPILAB);
					$pUPILAB2=mysqli_fetch_array($pUPILAB1);
					$pUPILAB20=$pUPILAB2['amt'];
				
					$pUPIHOSPITAL1=mysqli_query($link,$pUPIHOSPITAL);
					$pUPIHOSPITAL2=mysqli_fetch_array($pUPIHOSPITAL1);
					$pUPIHOSPITAL20=$pUPIHOSPITAL2['amt'];
					$pCARDLAB1=mysqli_query($link,$pCARDLAB);
					$pCARDLAB2=mysqli_fetch_array($pCARDLAB1);
					$pCARDLAB20=$pCARDLAB2['amt'];
				
					$pCARDHOSPITAL1=mysqli_query($link,$pCARDHOSPITAL);
					$pCARDHOSPITAL2=mysqli_fetch_array($pCARDHOSPITAL1);
					$pCARDHOSPITAL20=$pCARDHOSPITAL2['amt'];
					
					$pcash1=mysqli_query($link,$pcash);
					$pcash2=mysqli_fetch_array($pcash1);
					$pcash20=$pcash2['amt'];
					
					
					
					
		//procedure bill canceled
		if($ses=='admin'){
					$pdea="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Procedure Lab Canceled') and date(date1)='$d' ";
		}else{
		
		    $pdea="SELECT sum(amount) as amt FROM `daily_amount`  where recv_by='$ses' and  `amnt_type` IN ('Procedure Lab Canceled') and date(date1)='$d' ";
		}
					$pdesq=mysqli_query($link,$pdea);
					
					$pderd=mysqli_fetch_array($pdesq);
					$pdeamt=$pderd['amt'];
					
					//pharmacy
					if($ses=='admin'){
					$pr="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
					$phrUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
					$phrUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
					$phrCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
					$phrCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
					$phrcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
						
					}else{
					    $pr="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses'  and `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
						$phrUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` IN ('Pharmacy') and date(date1)='$d'   ";
					      $phrUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Pharmacy') and date(date1)='$d'   ";
						  $phrCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` IN ('Pharmacy') and date(date1)='$d'   ";
						  $phrCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Pharmacy') and date(date1)='$d'   ";
					    $phrcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses'  and pay_type='cash' and  `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
						
					}
					$pr1=mysqli_query($link,$pr);
					
					$pr2=mysqli_fetch_array($pr1);
					$phr=$pr2['amt'];
		
		
		             $phrUPILAB1=mysqli_query($link,$phrUPILAB);
					$phrUPILAB2=mysqli_fetch_array($phrUPILAB1);
					$phrUPILAB20=$phrcard2['amt'];
			
					$phrUPIHOSPITAL1=mysqli_query($link,$phrUPIHOSPITAL);
					$phrUPIHOSPITAL2=mysqli_fetch_array($phrUPIHOSPITAL1);
					$phrUPIHOSPITAL20=$phrUPIHOSPITAL2['amt'];
					
					$phrCARDLAB1=mysqli_query($link,$phrCARDLAB);
					$phrCARDLAB2=mysqli_fetch_array($phrCARDLAB1);
					$phrCARDLAB20=$phrCARDLAB2['amt'];
			
					$phrCARDHOSPITAL1=mysqli_query($link,$phrCARDHOSPITAL);
					$phrCARDHOSPITAL2=mysqli_fetch_array($phrCARDHOSPITAL1);
					$phrCARDHOSPITAL20=$phrCARDHOSPITAL2['amt'];
					
					$phrcash1=mysqli_query($link,$phrcash);
					$phrcash2=mysqli_fetch_array($phrcash1);
					$phrcash20=$phrcash2['amt'];
		
					
				
					
					//final bill
					if($ses=='admin'){
			 $fab="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
			 $fabUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
			 $fabUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
			 $fabCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
			 $fabCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
			 $fabcash="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='cash' and `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
						
					}else{
						$fab="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
						$fabUPILAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPILAB' and  recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
					    $fabUPIHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='UPIHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
						$fabCARDLAB="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDLAB' and  recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
						$fabCARDHOSPITAL="SELECT sum(amount) as amt FROM `daily_amount` where pay_type='CARDHOSPITAL' and  recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'   ";
						$fabcash="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and pay_type='cash' and `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
						
					}
					$sqb=mysqli_query($link,$fab);
					$rb=mysqli_fetch_array($sqb);
					$final2=$rb['amt'];
					
					$fabUPILAB1=mysqli_query($link,$fabUPILAB);
					$fabUPILAB2=mysqli_fetch_array($fabUPILAB1);
					$fabUPILAB20=$fabUPILAB2['amt'];
				
					$fabUPIHOSPITAL1=mysqli_query($link,$fabUPIHOSPITAL);
					$fabUPIHOSPITAL2=mysqli_fetch_array($fabUPIHOSPITAL1);
					$fabUPIHOSPITAL20=$fabUPIHOSPITAL2['amt'];
					
					$fabCARDLAB1=mysqli_query($link,$fabCARDLAB);
					$fabCARDLAB2=mysqli_fetch_array($fabCARDLAB1);
					$fabCARDLAB20=$fabCARDLAB2['amt'];
				
					$fabCARDHOSPITAL1=mysqli_query($link,$fabCARDHOSPITAL);
					$fabCARDHOSPITAL2=mysqli_fetch_array($fabCARDHOSPITAL1);
					$fabCARDHOSPITAL20=$fabCARDHOSPITAL2['amt'];
					
					$fabcash1=mysqli_query($link,$fabcash);
					$fabcash2=mysqli_fetch_array($fabcash1);
					$fabcash20=$fabcash2['amt'];
					
					
					
					?>
					
                    <!-- start widget -->
					<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
								<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Today Total Summary</header>
                                </div>
                                <div class="card-body" id="bar-parent">
												
								  <table class="table">
								  <tr>
								  <th>S No</th>
								  <th>Particulars</th>
								  <th>UPILAB</th>
								  <th>UPIHOSPITAL</th>
								  <th>CARDLAB</th>
								  <th>CARDHOSPITAL</th>
								  <th>Cash</th>
								  <th>Rec Amount</th>
								  <th>Cancel Amount</th>
								  <th>Total</th>
								  </tr>
								  <tr>
								  <td>1</td>
								  <td style="cursor: pointer;"><a href="reg_card.php" style="color:#424447">Patient Registration</a></td>
								  
								  
								  <td><?php if($prUPILABamt>=1){ echo $prUPILABamt; } else { echo  "0"; }?></td>
								  <td><?php if($prUPIHOSPITALamt>=1){ echo $prUPIHOSPITALamt; } else { echo  "0"; }?></td>
								  <td><?php if($prCARDLABamt>=1){ echo $prCARDLABamt; } else { echo  "0"; }?></td>
								  <td><?php if($prCARDHOSPITALamt>=1){ echo $prCARDHOSPITALamt; } else { echo  "0"; }?></td>
								  <td><?php if($prcash>=1){ echo $prcash; } else { echo  "0"; }?></td>
								  
								  <td><?php if($amnt>=1){ echo $amnt; } else { echo  "0"; }?></td>
								  <td>
								      <?php 
								      if($opcamnt>=1){ echo $opcamnt; } else { echo  "0"; }?>
								      
								  </td>
								  
								  <td>
								      
								      <?php echo $pramount=$amnt-$opcamnt; ?>
								      
								  </td>
								  
								  </tr>	
                    			  <tr>
								  <td>2</td>
								  <td style="cursor: pointer;"><a href="inpatient.php" style="color:#424447">In Patient Registration</a></td>
								  <td>
								  <?php if($ip_UPILAB>=1){ echo $ip_UPILAB; } else { echo  "0"; }?>
								  </td>
								  <td>
								  <?php if($ip_UPIHOSPITAL>=1){ echo $ip_UPIHOSPITAL; } else { echo  "0"; }?>
								  </td>
								   <td>
								  <?php if($ip_CARDLAB>=1){ echo $ip_CARDLAB; } else { echo  "0"; }?>
								  </td>
								  <td>
								  <?php if($ip_CARDHOSPITAL>=1){ echo $ip_CARDHOSPITAL; } else { echo  "0"; }?>
								  </td>
								  <td>
								  <?php if($ip_cash>=1){ echo $ip_cash; } else { echo  "0"; }?>
								  </td>
								   
								   
								   <td>
								  <?php if($ip_convert>=1){ echo $ip_convert; } else { echo  "0"; }?>
								  </td>
								  <td><?php if($ip_return>=1){ echo $ip_return; } else { echo  "0"; }?></td>
								  <td> <?php echo $ip_convert-$ip_return;?></td>
								  </tr>	

									<tr>
								  <td>3</td>
								  <td style="cursor: pointer;"><a href="advancebilllist.php" style="color:#424447">Advance Amount</a></td>
								  <td><?php if($advUPILAB20>=1) { echo $advUPILAB20; } else { echo  "0"; }?></td>
								  <td><?php if($advUPIHOSPITAL20>=1) { echo $advUPIHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($advCARDLAB20>=1) { echo $advCARDLAB20; } else { echo  "0"; }?></td>
								  <td><?php if($advCARDHOSPITAL20>=1) { echo $advCARDHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($advcash20>=1) { echo $advcash20; } else { echo  "0"; }?></td>
								  
								   <td><?php if($adv>=1) { echo $adv; } else { echo  "0"; }?></td>
								   <td>0</td>
								   <td><?php if($adv>=1) { echo $adv; } else { echo  "0"; } ?></td>
								  </tr>	
									<tr>
								  <td>4</td>
								  <td style="cursor: pointer;"><a href="labpayment.php" style="color:#424447">Lab Amount</a></td>
								  <td><?php if($lab_UPILAB>=1){  echo $lab_UPILAB; } else { echo  "0"; }?></td>
								  <td><?php if($lab_UPIHOSPITAL>=1){  echo $lab_UPIHOSPITAL; } else { echo  "0"; }?></td>
								  <td><?php if($lab_CARDLAB>=1){  echo $lab_CARDLAB; } else { echo  "0"; }?></td>
								  <td><?php if($lab_CARDHOSPITAL>=1){  echo $lab_CARDHOSPITAL; } else { echo  "0"; }?></td>
								  <td><?php if($lab_cash>=1){  echo $lab_cash; } else { echo  "0"; }?></td>
								  
								   <td><?php if($lab_amnt>=1){  echo $lab_amnt; } else { echo  "0"; }?></td>
								   <td><?php if($lab_camnt>=1){  echo $lab_camnt; } else { echo  "0"; }?></td>
								   <td><?php echo $lab_amnt-$lab_camnt;?></td>
								  </tr>		
<tr>
								  <td>5</td>
								  <td style="cursor:pointer"><a href="plabbillreport.php" style="color:#424447">Procedure Amount</a></td>
								  <td><?php if($pUPILAB20>=1){ echo $pUPILAB20; } else { echo  "0"; }?></td>
								    <td><?php if($pUPIHOSPITAL20>=1){ echo $pUPIHOSPITAL20; } else { echo  "0"; }?></td>
									<td><?php if($pCARDLAB20>=1){ echo $pCARDLAB20; } else { echo  "0"; }?></td>
									<td><?php if($pCARDHOSPITAL20>=1){ echo $pCARDHOSPITAL20; } else { echo  "0"; }?></td>
								   <td><?php if($pcash20>=1){ echo $pcash20; } else { echo  "0"; }?></td>
								    
								   <td><?php if($deamt>=1){ echo $deamt; } else { echo  "0"; }?></td>
								   <td><?php if($pdeamt>=1){ echo $pdeamt; } else { echo  "0"; }?></td>
								   <td><?php echo $deamt-$pdeamt ?></td>
								  </tr>	



<tr>
								  <td>6</td>
								  <td style="cursor: pointer;"><a href="finalbillreport.php" style="color:#424447">Final Bill Amount</a></td>
								  <td><?php if($fabUPILAB20>=1) { echo $fabUPILAB20; } else { echo  "0"; }?></td>
								  <td><?php if($fabUPIHOSPITAL20>=1) { echo $fabUPIHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($fabCARDLAB20>=1) { echo $fabCARDLAB20; } else { echo  "0"; }?></td>
								  <td><?php if($fabCARDHOSPITAL20>=1) { echo $fabCARDHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($fabcash20>=1) { echo $fabcash20; } else { echo  "0"; }?></td>
								  
								   <td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
								   <td>0</td>
								   <td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
								  </tr>
<tr>
								  <td>7</td>
								  <td style="cursor: pointer;"><a href="purchase_invoice_list.php" style="color:#424447">Pharmacy Amount</a></td>
								  <td><?php if($phrUPILAB20>=1) { echo $phrUPILAB20; } else { echo  "0"; }?></td>
								  <td><?php if($phrUPIHOSPITAL20>=1) { echo $phrUPIHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($phrCARDLAB20>=1) { echo $phrCARDLAB20; } else { echo  "0"; }?></td>
								  <td><?php if($phrCARDHOSPITAL20>=1) { echo $phrCARDHOSPITAL20; } else { echo  "0"; }?></td>
								  <td><?php if($phrcash20>=1) { echo $phrcash20; } else { echo  "0"; }?></td>
								 
								   <td><?php if($phr>=1) { echo $phr; } else { echo  "0"; }?></td>
								   <td>0</td>
								   <td><?php if($phr>=1) { echo $phr; } else { echo  "0"; }?></td>
								  </tr>

<tr>
								  <td>8</td>
								  <td>Today Total Amount</td>
								  <td><?php echo $ua=$prUPILABamt+$ip_UPILAB+$advUPILAB20+$lab_UPILAB+$pUPILAB20+$fabUPILAB20+$phrUPILAB20 ?>
								  </td>
								  <td><?php echo $uh=$prUPIHOSPITALamt+$ip_UPIHOSPITAL+$advUPIHOSPITAL20+$lab_UPIHOSPITAL+$pUPIHOSPITAL20+$fabUPIHOSPITAL20+$phrUPIHOSPITAL20 ?>
								  </td>
								  <td><?php echo $cl=$prCARDLABamt+$ip_CARDLAB+$advCARDLAB20+$lab_CARDLAB+$pCARDLAB20+$fabCARDLAB20+$phrCARDLAB20 ?>
								  </td>
								  <td><?php echo $ch=$prCARDHOSPITALamt+$ip_CARDHOSPITAL+$advCARDHOSPITAL20+$lab_CARDHOSPITAL+$pCARDHOSPITAL20+$fabCARDHOSPITAL20+$phrCARDHOSPITAL20 ?>
								  </td>
								  <td><?php echo $cash=$prcash+$ip_cash+$advcash20+$lab_cash+$pcash20+$fabcash20+$phrcash20 ?>
								  </td>
								   <td><?php $tam= $amnt+$adv+$lab_amnt+$daycarera+$deamt+$final2+$ip_convert+$phr;
										if($tam>=1) { echo $tam;} else { echo  "0"; }

										?></td>
										
										<td><?php echo $tcamt= $opcamnt+$lab_camnt+$pdeamt+$ip_return ?></td>
										<td><?php echo $tam-$tcamt; ?></td>
								  </tr>									  
								  </table>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
					
					
					
					
					
                     <!-- start new patient list -->
					 <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div> <h3 style="color:orange;">Today Discharge Patients Count(<?php
                            $td=date('Y-m-d');
                            $ku=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='DISCHARGED' and  Discharge_date='$td'") or die(mysqli_error($link));
                            echo mysqli_num_rows($ku);
                            
                            ?>)</h3></div>
                            </div>
                            </div>
					 <!-- table format start  -->
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Beds Status <i class="material-icons" style="color:green;width:32px;height:32px;">hotel</i>Available Beds &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i>Reserved Beds</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body" id="bar-parent">
							<h3 style="color:blue">Total Reserved Beds Count  (<?php 
							$kk=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='ADMITTED'") or die(mysqli_error($link));
							echo $kk1=mysqli_num_rows($kk)
							
							
							?>)</h3>					
								  <?php 
include('../db/locations.php');

									foreach($result as $key=>$p){ $lid=$p['id'];?>
									 <div><b><?php echo $p['lname']; ?></b></div>
									 <?php 
									  $r="select * from roomtype where ltype='$lid'";
									 $result1 = $crud->getData($r);
									  foreach($result1 as $key=>$p1){ 
									  $rid=$p1['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p1['rtype']; ?></b></div>
									  <?php 
									  $r2="select * from rooms where ltype='$lid' and rtype='$rid'";
									 $result2 = $crud->getData($r2);?>
								<b style="color:blue">	Reserved Beds (<?php $mm=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='ADMITTED' and room_loc='$lid' and room_type='$rid' ") or die(mysqli_error($link));
									  echo mysqli_num_rows($mm);
									  ?>)</b>
									 <?php foreach($result2 as $key=>$p2){ $romid=$p2['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $p2['roomno']; ?></div>
									  
									   <?php 
									  $r3="select * from beds where ltype='$lid' and rtype='$rid' and roomno='$romid'";
									 $result3 = $crud->getData($r3);
									  foreach($result3 as $key=>$p3){ $bid=$p3['id'];?>
									   <?php if($p3['status']=='out'){
									   $bid=$p3['id'];
									   $uu=mysqli_query($link,"select PAT_REGNO from ip_pat_admit where BED_NO='$bid' and DIS_STATUS='ADMITTED' ");
									   $uty=mysqli_fetch_array($uu);
									   $PAT_REGNO=$uty['PAT_REGNO'];
									   $tyu="select * from patientregister where  registerno='$PAT_REGNO'";
									   $TTT=mysqli_query($link,$tyu);
									   $tt1=mysqli_fetch_array($TTT);
									   $pname=$tt1['patientname'];
									   
									   
									   
									   ?>
									   &nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip" title="<?php echo $p3['bedno']."&mrno=".$PAT_REGNO."&pname=".$pname; ?>"><i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i></a>&nbsp;&nbsp;&nbsp; 
									   <?php }else{?>
									  &nbsp;&nbsp;&nbsp;<a href="#" title="<?php echo $p3['bedno']; ?>"><i class="material-icons" style="color:green;">hotel</i> </a>&nbsp;&nbsp;&nbsp;
									   <?php }?>
									  
									  <?php 
									  
									  }
									  }
											  
									  }
									  
									  }?>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- end new patient list -->
                     <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>ToDay Booking List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row">
									
                                       
	

									   <ul class="to-do-list ui-sortable" id="sortable-todo">
									   <marquee  behavior="scroll" direction="down" scrolldelay="150">  <?php
					
 $a="SELECT * FROM `patientregister` where date='$d' ";
//$a="SELECT * FROM `patientregister` order by reg_id desc limit 0,10 ";
					$sq=mysqli_query($link,$a);
					$i=1;
					while($r=mysqli_fetch_array($sq)){
						
					?>
									  
                                            <li class="clearfix">
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="None" id="todo-check1">
                                                    <label for="todo-check1"></label>
                                                </div>
                                               <a href='patientregister1.php?reg=<?php echo $r['reg_id'];?>'> <p class="todo-title"><?php echo $r['registerno'];?> - <?php echo $r['patientname'];?></a>
                                                </p></a>
                                                <div class="todo-actionlist pull-right clearfix">
                                                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                            </li>
					<?php }?></marquee>
                                        </ul>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-sm-12">
                             <div class="card card-box">
                                 <div class="card-head">
                                     <header>Doctors List</header>
                                 </div>
                                 <div class="card-body ">
                                 <div class="row">
								   <ul class="docListWindow">
								 <?php $sqq=mysqli_query($link,"select * from doct_infor order by id desc limit 0,8");
								 while($r1=mysqli_fetch_array($sqq)){
									 $gender=$r1['gender'];
									 ?>
								 
                                      
                                            <li>
                                                <div class="prog-avatar">
												<?php if($gender=='Female'){?>
                                                    <img src="../img/doc/doc1.jpg" alt="" width="40" height="40">
												<?php } else {?>
												     <img src="../img/doc/doc2.jpg" alt="" width="40" height="40">
												
												<?php }?>
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Dr.<?php echo $r1['dname1'];?></a> -(<?php echo $r1['desc1'];?>)
                                                    </div>
                                                        <div>
                                                           
                                                        </div>
                                                </div>
								 </li>
                                            <?php }?>
                                        </ul>
                                        <div class="text-center full-width">
                                            <a href="doctor.php">View all</a>
                                        </div>
                                    </div>
                                 </div>
                             </div>
						</div>
					</div>
					
					
					
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
        <!--<script src="http://radixtouch.in/templates/admin/redstar/source/assets/assets/jquery.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/popper/popper.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.blockui.min.js" ></script>
    
  
	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.slimscroll.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.waypoints.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.counterup.min.js" ></script>

	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/app.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/layout.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/theme-color.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/material/material.min.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/Chart.bundle.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/utils.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data.js" ></script>
    
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data3.js" ></script>
     <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/jquery.sparkline.js" ></script>
      <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/sparkline-data.js" ></script>-->
    
	   	   <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>