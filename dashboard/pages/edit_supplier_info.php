<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");

$res = mysqli_query($link,"select max(SUP_ID) FROM phr_supplier_mast");
	IF($res)
	{
		$row = mysqli_fetch_array($res);
		$sid = $row[0];	
	}
?>


			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Supplier</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="supplier_info_list.php">Supplier List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Supplier</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Edit Supplier Details</header>
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
								<?php $id=$_GET['id'];
								
								$sq=mysqli_query($link,"select * from phr_supplier_mast where SUP_ID='$id'");
								$r=mysqli_fetch_array($sq);?>
								
								
								
								 <form name="form" method="post" action="../modal/insert.php">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Supplier Name</label>
	                                            <input type="text" class="form-control" name="SUPPL_NAME"  value="<?php echo $r['SUPPL_NAME'];?>" required id="sname" >
	                                        </div>
											
											 <div class="form-group">
	                                            <label>Supplier Type</label>
										<select name="TYPE" class="form-control">
									
									 <?php $type=$r['TYPE'];

if($type=='v'){?>									 <option value="v">Vender</option>
						 <option value="p">Pharmacy</option><?php } else if($type=='p'){?> 
									 
									 
									  <?php //$type=$r['TYPE'];

?>									 <option value="v">Vender</option><?php }?>
									 <?php if($type=='p'){?> <option value="p">Pharmacy</option><?php } ?>
									 </select>
	                                        </div>
											<div class="form-group">
	                                            <label>Phone No.</label>
	                                            <input type="text" class="form-control" name="PHONE1" value="<?php echo $r['PHONE1'];?>" required  id="sphone" >
												
												
	                                        </div>
											<div class="form-group">
	                                            <label>City</label>
	                                            <input type="text" class="form-control" name="CITY" value="<?php echo $r['CITY'];?>"  id="scity" >
	                                        </div>
										
											
											
												<div class="form-group">
	                                            <label>Country</label>
	                                            <input type="text" value="India" class="form-control" value="<?php echo $r['COUNTRY'];?>" required name="COUNTRY" id="scon" >
	                                        </div>
										
											<div class="form-group">
	                                            <label>DL.No20B</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['AGR_NO'];?>"  required name="AGR_NO" id="dlno1" >
	                                        </div>
											<div class="form-group">
	                                            <label>CST Reg.No</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['CST_REG_NO'];?>" required name="CST_REG_NO" id="cstreg" >
	                                        </div>
											
											<div class="form-group">
	                                            <label>TIN No </label>
	                                            <input type="text" class="form-control" name="ECC_NO" value="<?php echo $r['ECC_NO'];?>"  id="tinno">
	                                        </div>
											<div class="form-group">
	                                            <label>FSSAI No </label>
	                                            <input type="text" class="form-control" name="fsno" value="<?php echo $r['fsno'];?>" id="fssaino" >
	                                        </div>
										
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Supplier Code</label>
	                                            <input type="text" class="form-control" name="SUPPL_CODE" value="<?php echo $r['SUPPL_CODE'];?>" readonly required id="scode" >
                                        </div>
										
										<div class="form-group">
	                                            <label>Contact Person</label>
	                                            <input type="text" class="form-control" name="CONTACT_PERSON" value="<?php echo $r['CONTACT_PERSON'];?>" required id="sperson" ></div>
									
                                        
										
										<div class="form-group">
                                            <label>Alternate Contact No.</label>
                                            <input type="text" class="form-control" name="PHONE2" value="<?php echo $r['PHONE2'];?>" required id="saltno" >
											
                                        </div>
										
										
										
										<div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="STATE" value="<?php echo $r['STATE'];?>"  id="sstate" >
									   </div>
									   
									   <div class="form-group">
                                            <label>Address</label>
                                   <textarea  class="form-control" name="ADDR1"  id="saddr" ><?php echo $r['ADDR1'];?></textarea>
									   </div>
									 		
									   <div class="form-group">
                                            <label>DL.No 21B </label>
                                            <input type="text" class="form-control" name="AGR_DATE" value="<?php echo $r['AGR_DATE'];?>" id="dlno1" >
									   </div>
									     <div class="form-group">
                                            <label>AP GST No</label>
                                            <input type="text" class="form-control" required value="<?php echo $r['APGST_NO'];?>" name="APGST_NO" id="apgstno" >
									   </div>
									   
									  
									   	<div class="form-group">
	                                            <label>Remarks</label>
	                                            <textarea  class="form-control" name="REMARKS"  id="remark" ><?php echo $r['REMARKS'];?></textarea>
	                                        </div>
									   
									   <input type="hidden" name="id" value="<?php echo $r['SUP_ID'];?>">
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="update_suppliier">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='supplier_info_list.php'">Cancel</button>
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