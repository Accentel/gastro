<?php
include("../db/connection.php");

$emp_id = $_REQUEST['q'];



?>
 
 
 <div class="control-label col-md-12" id="pharma" ><h1 align="left">Pharmacy Charges</h1>
                                                   <table class="table">
												   <tr>
												   <th>Particular Name</th>
												   <th>QTY</th>
												   <th>Rate</th>
												   <th>Amount</th>
												   </tr>
												  
												   <?php 
												   
												  echo $sa="select b.product_name,a.u_qty,a.u_rate,a.value,c.discount,c.total,a.disc,a.total,d.TYPE,a.gst,a.total as tt from phr_salent_dtl as a,
			  phr_purinv_dtl as b,phr_salent_mast as c,`phr_prddetails_mast` as d where a.inv_id=b.inv_id and a.lr_no=c.lr_no  and c.mrnum='$emp_id' and b.inv_id=d.id";
			  $res1=mysqli_query($link,$sa);
			  while($row1 = mysqli_fetch_array($res1)){
												   $i=1;
										 ?>
												   <tr>
												   <td><input type="text" name="description[]"   id="description" value="<?php echo $y['product_name'];?>"/></td>
												   <td><input type="text" name="qty[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $row1['u_qty'];?>" class='tet'/></td>
												   <td><input type="text" name="charge[]" id="charge<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class='tet'/></td>
												   <td><input type="text" name="amount[]" id="amount<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class="txt"/></td>
												    
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                			