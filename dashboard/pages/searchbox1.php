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
                                <div class="page-title">Compare Medicine Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Compare Medicine Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Compare Medicine Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Compare Medicine Report</header>
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
	                                    <div class="col-md-12 col-sm-12">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Medicine Name</label>
												 <input id=\"pname\" list=\"city1\" name="name"  required="required">
<datalist id=\"city1\" >

<?php 
$sql="select distinct product_name from phr_purinv_dtl ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[product_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
	                                           
	                                        </div>
											
											
												<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Compare Medicine" name="submit" >
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
											
											<table width="100%" align="center" border="1" class="table" cellpadding="0" cellspacing="0">	
	
		 
			
			<tr><th align="center"><b><u>SNO </u></b></th>
            
            <th ><b><u>SUPL NAME</u></th> 
            <th ><b><u>PRODUCT NAME</u></th>
            
            <th ><b><u>BATCH NO</u></th>
            <th colspan="3"><b><u>TOTAL QTY </u>
            <th ><b><u>RATE </u></b></th>
            </th>
             <th><b><u>PRICE </u></th>
            
            </tr>
			 <tr> <th></th><th></th><th></th><th></th> <th ><b><u> QTY </u></b></th> <th ><b><u>FREE </u></b></th>
            
            <th>TOTAL </th><th></th>
            <th></th></tr>
            
            
<?php 

if(isset($_POST['submit'])){
$name=$_POST['name'];
 $sql="select  (a.each_pur_rate * a. balance_qty) as final_count,a.PRODUCT_NAME,a.packing_type,a.batch_no,a.mrp,a.exp_date,a.BATCH_NO,
a.s_qty,a.s_free,a.s_rate,a.noitems,a.cost,b.suppl_name,a.S_RATE from phr_purinv_dtl a,phr_supplier_mast as b,phr_purinv_mast c
 where  a.lr_no=c.lr_no  and b.suppl_code=c.suppl_code and a.PRODUCT_NAME='$name' order by final_count";
$res=mysqli_query($link,$sql) or die(mysql_error());
$i=1;
while($row=mysqli_fetch_array($res)){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $row['suppl_name']; ?></td>
<td align="center"><?php echo $row['PRODUCT_NAME']; ?></td>
<td align="center"><?php echo $row['BATCH_NO']; ?></td>

<?php   $x=$row['s_qty']; $x1=$row['s_free'];  $x2=$x+$x1; $r=$row['S_RATE']; ?>

<td align="center"><?php echo $x?> 
</td>
<td align="center"><?php echo $x1?> 
</td>
<td align="center"><?php echo $x2?> 
</td>
<td align="center"><?php echo $row['S_RATE'];?>
<td align="center"><?php echo $row['final_count']; ?> </td>
</tr>
			<?php $i++; } }?><!--	
<tr>
<td colspan="4" align="center"> <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></td>
</tr>-->
		</table>
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