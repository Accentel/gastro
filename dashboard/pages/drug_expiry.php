<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
	if(isset($_REQUEST['report']))
	{
		echo $report = $_REQUEST['report'];
	}
 ?>
<?php include("header.php");?>
	

<script>
/*****Reports*****/
function report(){
	
	var str='<?php echo $report ?>';
	
		
var report ="";
  for (var i=0; i < document.myform.report.length; i++){
   if (document.myform.report[i].checked){
	   report = document.myform.report[i].value;
	     } }
if(report=='' || report==null){alert('Please Select Report Type');}
else{
var passedvar="";
if(report=="All"){passedvar="All";}
if(report=="Datewise"){
var st_dt=document.myform.st_dt.value;
var end_dt=document.myform.end_dt.value;
passedvar=''+report+'&st_dt='+st_dt+'&end_dt='+end_dt+'';
if(!(str==4 || str==5 || str==6 || str==7 || str==8 || str==9 || str==10 || str==11)){
//var docname="docname";
if(document.getElementById("docname").value=="") {
	alert("Please Select Department Name");
    document.myform.getElementById("docname").focus();
	 return false;
}//if(document
 }//if(str
//var url='report='+passedvar
}//if(datewise


if(report=="Deptwise")
{
passedvar="Deptwise";
if(document.getElementById("docname").value=="")
                 {
				     alert("Please Select Department Nameeeee");
                     document.myform.getElementById("docname").focus();
					 return false;
				}
}//if(dept)


if(str==1){
var doc=document.myform.docname.value
	//if(document.myform.docname.value==""){alert("Please Select Department Name");document.myform.docname.focus();}

window.open('PDF_Out_Patients1.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;
}
if(str==2){ 
	var doc=document.myform.docname.value
	//alert("doc"+doc);
	//if(document.myform.docname.value==""){alert("Please Select Doctor Name");document.myform.docname.focus();}
	
window.open('PDF_Admissions.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==3){
var doc=document.myform.docname.value
window.open('PDF_Discharge_Patients.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==4){
//	var doc=document.myform.docname.value
window.open('PDF_Summary_Ip_Discharge.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==5){
window.open('PDF_Advance.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==6){
window.open('PDF_Bed_Occupency.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==7){
window.open('PDF_OT_Utilization.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==8){
window.open('PDF_ICU_Occupency.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==9){
window.open('PDF_Delivery_Patients.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==10){
window.open('PDF_Death_Patients.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==11){
window.open('PDF_DrugExpiry.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
}//else
}//fun
/**********/

function selectreport(str)
{
if(str==1){

document.getElementById("trid").style.display='none';
<?php if($report!=5 && $report!=6 && $report!=7 && $report!=4 && $report!=8 && $report!=9 && $report!=10 && $report!=11){ ?>
document.getElementById("tr_doc").style.display='none';
<?php } ?>
}
if(str==2){
document.getElementById("trid").style.display='';
<?php if($report!=5 && $report!=6 && $report!=7 && $report!=4 && $report!=8 && $report!=9 && $report!=10 && $report!=11){ ?>
document.getElementById("tr_doc").style.display='';
<?php } ?>
}
if(str==3){
document.getElementById("trid").style.display='none';
document.getElementById("tr_doc").style.display='';
}
}

</script>

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
                                <li class="active">Drug Expiry Report</li>
                            </ol>
                        </div>
                    </div>
					 <?php 
			 if($report==1){ echo "Out Patients Report"; }
			 if($report==2){ echo "Patient Admitted Report"; }
			 if($report==3){ echo "Discharge Patients Report"; }
			 if($report==4){ echo "Summary of IP & Discharge"; }
        	 if($report==5){ echo "Advance Report"; }
			 if($report==6){ echo "Bed Occupency Summary Report"; }
			 if($report==7){ echo "OT Utilization Summary Report"; }
			 if($report==8){ echo "ICU Utilization Summary Report"; }
			 if($report==9){ echo "Patient Delivery Report"; }
			 if($report==10){ echo "Patient Death Report"; }
			 if($report==11){ echo "Drug Expiry Report"; }
			?>	<form name="myform" method="post" >
					 <fieldset>
			<legend><b style=" color:#FF6600 ">Select Any One Of The Options Below </b></legend>
			<div align="center" ><input type="radio" name="report" value="All"  onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
			<input type="radio" name="report" value="Datewise" onclick="javascript:selectreport(2)" /> 
			DateWise
			<?php if($report !=5 && $report !=6 && $report !=4 && $report !=7 && $report !=8 && $report !=9 && $report !=10 && $report !=11){ ?>
			<input type="radio" name="report" value="Deptwise" onclick="javascript:selectreport(3)" /> 
			DeptWise
			<?php } ?>
			</div>
			</fieldset>	
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Drug Expiry Details</header>
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
								
							
                                <div class="card-body " id="bar-parent2">
                                	<div class="row" id="trid" style="display:none;">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>From Date</label>
	                                            <input type="date" class="form-control" name="st_dt" required value="<?php echo date('Y-m-d')?>"  id="fromdate" >
	                                        </div>
											
											 <div class="form-group">
	                                            <label>To Date</label>
	                                            <input type="date" class="form-control" required="required" value="<?php echo date('Y-m-d')?>" name="end_dt" id="todate" >
	                                        </div>
											
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
												
												
												 <input type="button" value = "Report" onclick="window.location.href='javascript:report()'" class="btn btn-info" />
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					
              
            <!-- end page content -->
            <!-- start chat sidebar -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            
            <!-- end chat sidebar -->
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