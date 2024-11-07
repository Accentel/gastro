<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>

<script>
function report()
{
	//alert("1");
       if (document.form.fdate.value == "") {
				alert("Please enter From Date.");
				document.fdate.focus();
				return (false);
				}
	if (document.form.tdate.value == "") {
				alert("Please enter To Date.");
				document.tdate.focus();
				return (false);
				}
   if(document.form.repfor.value =="")
	{
		alert("Please Select Type for vat Report ");
		document.repfor.focus();
		return(false);
	}


	var sdate=document.form.fdate.value;
	var edate=document.form.tdate.value;
	var protype=document.form.repfor.value;
	
 window.open('PDF_VatReport.php?ptype='+protype+'&s_date='+sdate+'&e_date='+edate,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
}
</script>	
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">GST Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">GST Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">GST Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>GST Report</header>
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
								
								<form name="form" method="post" action="">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>From Date</label>
	                                            <input type="date" class="form-control" name="fromdate" value="<?php echo $today = date("Y-m-d"); ?>" id="fdate" required="required" >
	                                        </div>
											
											 <div class="form-group">
	                                            <label>To Date</label>
	                                          <input type="date" class="form-control" name="todate" value="<?php echo $today = date("Y-m-d"); ?>" id="tdate" required="required" >
	                                        </div>
										 <div class="form-group">
	                                            <label>To Date</label>
	                                         <select name="repfor" class="form-control"><option value="">----Select Any One----</option>
			  <option value="PI">Purchase Invoice</option>
			  <option value="PR">Purchase Return</option>
			  <option value="SE">Sales Entry</option>
			  <option value="SR">Sales Returns</option>
			 </select> </div>
												<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Report" onclick="report();">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
											
											
	                                    </div>
	                                    
									   
										
										
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