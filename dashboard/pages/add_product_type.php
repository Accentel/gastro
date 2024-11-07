<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>


			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Product Type List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="add_product_type.php">Add Product</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Product Type List</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Product Type List Details</header>
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
								
								<form name="form" method="post" action="../modal/insert.php">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Product Type Name</label>
	                                            <input type="text" class="form-control" name="ptname" id="ptname" required="required" >
	                                        </div>
											
											 <div class="form-group">
	                                            <label>Representation</label>
	                                            <input type="text" class="form-control" required="required" name="rep" id="rep" >
	                                        </div>
											<div class="form-group">
	                                            <label>Product Type</label>
												<select name="ptype" class="form-control" required >
	<option value=""> -- Select Type -- </option>
	<option value="drug">Drug</option>
	<option value="general">General</option>
	</select>
								   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >				
												
	                                        </div>
											
											<div class="form-group">
	                                            <label>Gen/Ortho/Ayurvedic</label>
												<select name="gen" class="form-control" required >
	<option value=""> -- Select Type -- </option>
	<option value="Genral">Genral</option>
	<option value="Ortho">Ortho</option>
	<option value="Ayurvedic">Ayurvedic</option>
	</select>
												
												
	                                        </div>
											
	                                    </div>
	                                    
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="add_prd_type">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='product_type_list.php'">Cancel</button>
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