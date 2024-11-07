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
                                <div class="page-title">Search Medicine Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Search Medicine Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Search Medicine Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Search Medicine Report</header>
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
                                                    <input type="submit" class="btn btn-info" value="Search Medicine" name="submit" >
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
											
											<table width="100%" align="center" border="0" class="table" cellpadding="0" cellspacing="0">	
	
		 
			<tr><th align="center"><b><u>SNO </u></b></th><th ><b><u>PRODUCT NAME</u></th><th><b><u>TOTAL QTY </u></th></tr> 
<?php 

if(isset($_POST['submit'])){
$name=$_POST['name'];
 $sql="select PRODUCT_NAME,sum(balance_qty) as T_QTY  from phr_purinv_dtl where PRODUCT_NAME='$name' group by PRODUCT_NAME";
$res=mysqli_query($link,$sql) or die(mysql_error());
$i=1;
while($row=mysqli_fetch_array($res)){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $row['PRODUCT_NAME']; ?></td>

<td align="center"><?php echo $row['T_QTY']; ?></td>


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