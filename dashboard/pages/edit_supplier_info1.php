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
 
<script type="text/javascript">
function val(str,id)
{




var doscount=document.getElementById("pamt"+id).value;
var doscount1=document.getElementById("nbalk"+id).value;
//alert(doscount);
//if(doscount=='' || doscount==null){doscount=0;}
//if(doscount==0){
//document.getElementById("pamt"+id).value=Math.abs(srate2);
document.getElementById("nbal"+id).value=Math.abs((eval(doscount1))-(eval(doscount)));
//}else{
//var value=document.getElementById("value"+id).value;
//document.getElementById("amt"+id).value=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
//document.getElementById("total").value=vall;
//}
}

</script>

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
						 <option value="p">Pharmacy</option><?php } else if($type=='v'){?> 
									 
									 
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
									   
									   <input type="hidden" name="id" value="<?php echo $r['SUP_ID'];?>" >
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								
								
								
								
								 <table width="100%" class="table" border="1">
     
     <tr><td><strong>Sno</strong></td><td><strong>Invoive No</strong></td>
     <td><strong>Bill Date</strong></td><td><strong>Total Amount</strong></td><td><strong>Disc</strong></td><td><strong>Paid Amount</strong></td>
     <td><strong>Balance Amount</strong></td>
     
     <td><strong>Recpt No</strong></td>
      <td><strong>Discount Amount</strong></td>
     <td><strong>Now Pay Amount</strong></td>
    
     <td><strong>Remain Amount</strong></td>
     <td><strong>VIEW</strong></td>
     
     </tr>
     
     
     <?php
	 $scode = $_REQUEST['id'];
	 $SUPPL_CODE=$r['SUPPL_CODE'];
	 $x=0;
	$i=1;
	 $a="select * from phr_purinv_mast  where SUPPL_CODE='$SUPPL_CODE' order by LR_NO desc";
	 $sql = mysqli_query($link,$a);
	 while($r=mysqli_fetch_array($sql)){
		 $i1=$i;
		 $x=$x+1;

	 ?>
	
     <form name="frm" method="post" action=""> 
     <tr><td><?php echo $x?></td><td><?php  echo $s=$r['SUPPL_INV_NO'];?></td>
     <td><?php $adate=$r['INV_DATE'];  echo $b=date("d-m-Y", strtotime($adate)); ?></td>
     
     <td><?php echo $r['TOTAL'];?></td>
      <td><?php echo $ddd=$r['discount'];?></td>
     <td><?php echo $r['paid'];?></td><td><?php echo $b=$r['bal'];?>
     <input name="supcode" type="hidden" class="text" id="supcode" value="<?php echo $scode; ?>" readonly />
     
     
     <input name="inv" type="hidden" class="text" id="inv" value="<?php echo $s; ?>" readonly />
     <input name="lr_no<?php echo $x ?>" type="hidden" class="text" id="lr_no<?php echo $x ?>" value="<?php echo $r['LR_NO']; ?>" readonly />
      <input type="hidden" name="tpaid<?php echo $x ?>" id="tpaid<?php echo $x ?>" value="<?php echo  $r['paid']?>" />
     <input type="hidden" name="bal<?php echo $x ?>" id="bal<?php echo $x ?>" value="<?php echo $b?>" />
     <input type="hidden" name="tot<?php echo $x ?>" id="tot<?php echo $x ?>" value="<?php echo $r['TOTAL'];?>" />
     <input type="hidden" name="dd_dis<?php echo $x ?>" id="dd_dis<?php echo $x ?>" value="<?php echo $ddd?>" />
     </td>
      <td><input type="tel" name="recpt<?php echo $x ?>" /></td>
      <td><input type="text" name="dis<?php echo $x ?>" id="dis<?php echo $x ?>" onkeyup="val1(this.value,<?php echo $x ?>)" /></td>
    
      
     <td><input type="text" name="pamt<?php echo $x ?>" id="pamt<?php echo $x ?>" onkeyup="val(this.value,<?php echo $x ?>)" /></td>
  <input type="hidden" name="nbalk<?php echo $x ?>" id="nbalk<?php echo $x ?>" value="<?php echo $b?>" readonly="readonly" />
    <td><input type="text" name="nbal<?php echo $x ?>" id="nbal<?php echo $x ?>" value="<?php echo $b?>" readonly="readonly" /></td>
    <td><a href="sup_view.php?id=<?php echo $r['LR_NO']; ?>&inv=<?php echo $s; ?>&sup=<?php echo $scode; ?>"><img src="images/view.gif" /></a></td>
     </tr><input type="hidden" name="rows" id="rows" value="<?php echo $i ?>"/>
     
      <input type="hidden" name="x" id="x" value="<?php echo $i ?>"/>
            
			
      <?php  $i++;  }?></table><table>
    
         
         

<tr height="5px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='supplier_info_list2.php'"/></td></tr>


</table>

</form>       


 <?php if(isset($_POST['submit'])){
			$supcode=$_POST['supcode'];	
			//$lr_no=$_POST['lr_no'];
			//$paid=$_POST['paid'];
			//$paid1=$_POST['paid1'];
			//$paid2=$paid1+$paid;
			//$bal=$_POST['bal'];
			$d=date('Y-m-d');
			//$chq_num=$_POST['chq_num'];
			//$chq_date=$_POST['chq_date'];
			//$bank=$_POST['bank'];
			//$payment_type=$_POST['payment_type'];
			
			
			
			//echo $i = $_REQUEST['x'];
			 $count = $_REQUEST['rows'];
			// $cont=1;
//echo $count;
for($m=1;$m <= $count;$m++)
{
//echo $count;
//echo $m;
 $bal=$_REQUEST['bal'.$m];
//$tot=$_REQUEST['mfg'+$m];
//$exp=$_REQUEST['exp'+$m];
$pamt=$_REQUEST['pamt'.$m];
$nbal=$_REQUEST['nbal'.$m];
$tpaid=$_REQUEST['tpaid'.$m];
$tot=$_REQUEST['tot'.$m];
 $lr_no=$_REQUEST['lr_no'.$m];
 $recpt=$_REQUEST['recpt'.$m];
$paid2=$tpaid+$pamt;
 $dis=$_REQUEST['dis'.$m];
 $ddd=$_REQUEST['ddd'.$m];
//$amt=$_REQUEST['amt'.$m];
	 $dis_amt=$dis+$ddd;		
			
			  $dx="update phr_purinv_mast set paid='$paid2',bal='$nbal',discount='$dis_amt' where suppl_code='$supcode' and LR_NO='$lr_no'"; 
			$sq=mysql_query($dx);
			if($pamt!=''){
				 $f="insert into `sup_amount`(sup_code,tamt,paid,bal,date1,status1,LR_NO,recpt_num,discount)
			values('$supcode','$tot','$pamt','$bal','$d','1','$lr_no','$recpt','$dis')";
			$cc=mysql_query($f);
			}
			
} 
				if($sq)
{
	print "<script>";
	print "alert('successfully Updated');";
	print "self.location='supplier_info_list2.php'";
	print "</script>";
}
			}
				?>

 
	<script type="text/javascript">
		$(function(){
$('#pamt').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#bal').val());
    $('#nbal').val(totalpoints - balance);
});



});//]]>  
</script>	
								
								<!--<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="update_suppliier">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='supplier_info_list.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>-->
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