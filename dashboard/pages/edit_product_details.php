<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
	
<script>
function calc(){
	var fee=document.getElementById('fee').value;
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>
<script>
function calc1(){
	var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount);
document.getElementById('total').value=tt;
}
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Product Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="product_type_list.php">Product Details</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Product Details</li>
                            </ol>
                        </div>
                    </div>
					
					
					<?php $id=$_GET['id'];
$sq=mysqli_query($link,"select * from phr_prddetails_mast where id='$id'");
$r=mysqli_fetch_array($sq);?>					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Product Details </header>
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
												
												<select name="tname" id="tname" required  class="form-control">
	<option value="<?php echo $r['TYPE'];?>"> <?php echo $r['TYPE'];?> </option>
	 <?php
	   
		$sql = mysqli_query($link,"select prdtype_code,prdtype_name from phr_prdtype_mast order by prdtype_name");
		if($sql){
			while($row = mysqli_fetch_array($sql))
			{
				$prdcode=$row[1];
				$prdname=$row[1];
				
	?>
	<option value="<?php echo $prdcode ?>"><?php echo $prdname ?></option>
	<?php
			}
		}
	?>
	</select>
	                                            
	                                        </div>
											
											 <div class="form-group">
	                                            <label>GST(%)</label>
	                                           <select name="vtax" id="vtax" required  class="form-control">
	<option value="<?php echo $r['vattax'];?>"><?php echo $r['vattax'];?> </option>
     <option value="0">0</option>
	<option value="5">5</option>
	<option value="12">12</option>
	<option value="18">18</option>
    <option value="28">28</option>
   
	</select>
	                                        </div>
											<div class="form-group">
	                                            <label>SGST(%)</label>
												<select name="sgst" id="sgst" required class="form-control">
	<option value="<?php echo $r['sgst'];?>"><?php echo $r['sgst'];?> </option>
     <option value="0">0</option>
	<option value="2.5">2.5</option>
	<option value="6">6</option>
	<option value="9">9</option>
    <option value="14">14</option>
	</select>								
												
	                                        </div>
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Product Name</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['PRD_NAME'];?>" name="prdname" id="prdname" required >
                                        </div>
										
										 <div class="form-group">
                                            <label>CGST(%)</label>
	                                            <select name="cgst" id="cgst" required class="form-control">
	<option value="<?php echo $r['cgst'];?>"><?php echo $r['cgst'];?> </option>
     <option value="0">0</option>
	<option value="2.5">2.5</option>
	<option value="6">6</option>
	<option value="9">9</option>
    <option value="14">14</option>
	</select>							
                                        </div>
									
                                        
										
										<div class="form-group">
                                            <label>Manufactured By</label>
											<input name="maniby" type="text" value="<?php echo $r['mani_by'];?>" class="form-control" id="maniby" required  />
                                          
                                        </div>
										<input type="hidden" name="id" value="<?php echo $r['id']?>">
										
										<input type="hidden" name="gen" value="Genral">
										<!--<div class="form-group">
	                                            <label>Gen/Ortho/Ayurvedic</label>
												<select name="gen" class="form-control" required >
	<option value="<?php echo $r['prd_type_det'];?>"><?php echo $r['prd_type_det'];?></option>
	<option value="Genral">Genral</option>
	<option value="Ortho">Ortho</option>
	<option value="Ayurvedic">Ayurvedic</option>

	</select>
												
												
	                                        </div>-->
									   
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="edit_prd_det">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='product_details_list.php'">Cancel</button>
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