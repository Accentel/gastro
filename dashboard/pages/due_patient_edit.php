<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>

<script>
function calc(){
	var fee=document.getElementById('tot').value;
var hopshare=document.getElementById('bill').value;
//var doctshare=document.getElementById('doctorshare').value/100;
//hamount=fee*hopshare;
htotal=fee-hopshare;
document.getElementById('bal').value=htotal;
}
</script>
	<?php 
	
	   $id=$_REQUEST['pat_no'];
	   echo $a="SELECT * FROM `phr_salent_mast` where   LR_NO='$id'";
	  $sql=mysqli_query($link,$a);
	  if($sql){
	  while($row=mysqli_fetch_array($sql)){
	  $id1=$row[0];
						
						$cust_name=$row[2];
						$age=$row[12];
						$gender=$row[13];
						$saledate=date('d-m-Y', strtotime($row[5]));
						$ctype=$row[10];
						$dueamount=abs($row[21]);
	  $rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ");
		while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
		//$age=$row[1];
		//$gender=$row[2];
		//$saledate=date('d-m-Y', strtotime($row[5]));
		//$ctype=$row[6];
		//$dueamount=$row[4];
		//$tot = $row[3];
		} 
}		
	  ?>   
	 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Due Patient Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="duecustomer.php"> Due Patient List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Due Patient Details</li>
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
                                    <header>Edit Due Patient Details </header>
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
								<form name="form" method="post" action="../modal/due_patient_update.php">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label><?php echo $ctype ?> Name :</label>
	                                            <?php echo $cust_name; ?>
	                                        </div>
											
											 <div class="form-group">
	                                            <label>Gender :</label>
	                                            <?php echo $gender; ?>
	                                        </div>
											<div class="form-group">
	                                            <label>Total Amount :</label>
												
												
												
												<?php echo $tot; ?>
												 <input type="hidden" class="form-control" value="<?php echo $dueamount ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
												name="tot"  id="tot" onchange="calc(this.form)"  >
												
	                                        </div>
											<div class="form-group">
	                                            <label>Now Pay Amount :</label>
	                                            <input type="text" class="form-control" value="<?php echo $dueamount ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
												name="bill"  id="bill" onchange="calc(this.form)" onfocus="calc(this.form)"   >
	                                        </div>
										
											
											
											 <input name="pat_no"  id="pat_no" type="hidden"  value="<?php echo $id=$_GET['pat_no'];?>" />
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Age :</label>
	                                           <?php echo $age; ?>
                                        </div>
										
										 <div class="form-group">
                                            <label>Sale Date </label>
	                                          <?php echo $saledate; ?>
                                        </div>
									
                                        
										
										<div class="form-group">
                                            <label>Due Amount :</label>
                                          <?php echo $dueamount ?>
											
                                        </div>
										
										<div class="form-group">
                                            <label>Bal Amount :</label>
                                         <input type="text" class="form-control" value="0" readonly onkeypress='return event.charCode >= 48 && event.charCode <= 57'
												name="bal"  id="bal" >
											
                                        </div>
										
										
									   
									   
									    <input type="hidden" class="form-control" value="<?php echo $r['id'];?>" name="id" id="id">
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="update_doct">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='duecustomer.php'">Cancel</button>
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