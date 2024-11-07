<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];

include("header.php");
date_default_timezone_set('Asia/Kolkata');
?>
<script type="text/javascript">
function reportxx()
{
//alert("hai");
if (document.myform.fdate.value=="") {
        alert("Please enter From Date.");
        document.fdate.focus();
        return (false);
    }
    if (document.myform.tdate.value=="") {
        alert("Please enter To Date.");
        document.tdate.focus();
        return (false);
    }
    var s_date=document.myform.fdate.value;
    var e_date=document.myform.tdate.value;
    var ftime = document.getElementById("fromtime").value;
	var ttime=document.getElementById("totime").value;
	var sess = document.getElementById("ses").value;
	
	
	window.open('labbill_report.php?fdate='+s_date+'&tdate='+e_date,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
}
</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Lab Bill Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Lab Bill Report</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Lab Bill Report</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="#" name="myform" id="form_sample_1" class="form-horizontal" >
                                        <div class="form-body">
																			
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">From Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="fdate" id="fdate">
		                                               
	                                            
	                                            </div>
	                                            <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Join Date" type="time" value="<?php echo date('H:i:s'); ?>" name="fromtime" id="fromtime">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
                                            </div>
                                           <div class="form-group row">
                                                <label class="control-label col-md-2">To Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="tdate" id="tdate">
		                                                
	                                            
	                                            </div>
	                                            <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="To Time" type="time" value="<?php echo date('H:i:s'); ?>" name="totime" id="totime">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                    <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                    
									
									
                                </div>
                                            </div>
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="submit" class="btn btn-info" onclick="javascript:reportxx()">Submit</button>
                                                    <a href="dashboard.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
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
	   <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>