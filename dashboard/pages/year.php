<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
	

<script>
function reportxx(){
	var fdate = document.getElementById("todate").value;
	if(fdate==''){
		alert("please select Finance Year");
	} else {
	//var tdate = document.getElementById("todate").value;
	window.open('year1.php?sdate='+fdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
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
                                <li class="active">Year wise Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Year wise Report</header>
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
								
								<form name="form" method="post" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Select Year</label>
												<?php
												 $ye11=date('Y')+1; 
												 $ye=date('Y'); 
												$ye1=date('Y')-1;
												$ye2=date('Y')-2;
													$ye3=date('Y')-3; 
													$ye4=date('Y')-4;
													
												?>
												<select name="todate" class="form-control" required id="todate">
												<option value="">Select</option>
												<option value="<?php echo $ye11;?>"><?php echo $ye11;?></option>
												<option value="<?php echo $ye;?>"><?php echo $ye;?></option>
												<option value="<?php echo $ye1;?>"><?php echo $ye1;?></option>
													<option value="<?php echo $ye2;?>"><?php echo $ye2;?></option>
												<option value="<?php echo $ye3;?>"><?php echo $ye3;?></option>
												<option value="<?php echo $ye4;?>"><?php echo $ye4;?></option>
											
												</select>

												</div>
											
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Report"  onclick="reportxx();">
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