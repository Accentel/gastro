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



 var ptype=document.getElementById("reporttype").value;
 //var bb=document.getElementById("bb").value;
//chckproduct(bb);
 //var aa=document.getElementById("aa").value;
//alert(ptype);
//pass=''+report1+'&ptype='+ptype+'';



 window.open('PDF_Stockposition2.php?reporttype='+ptype,'mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes');

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
                                <li class="active">Stock Position Report</li>
                            </ol>
                        </div>
                    </div>
					<form name="myform" method="post" >
					 <fieldset>
		
		
			
		
			</fieldset>	
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Stock Position Report</header>
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
									<div align="center" ><input type="radio" name="reporttype" id="reporttype" value="All" checked onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
						

<input type="hidden" name="reporttype" value="Datewise" onclick="javascript:selectreport(2)" /> 


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