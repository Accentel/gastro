<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>

<script type="text/javascript">
function reload()
{
window.location.reload();
}
</script>
<script type="text/javascript">






function save_fun(str,inv,qty){
    
    var qty1=document.getElementById("qty"+str).value;
var prd=document.getElementById("prd_name"+str).value;
//alert(qty1);
var batch=document.getElementById("batch"+str).value;

if((!qty1.match(/^\d+/)) ||  (qty1 < 0) )
        {
        alert("Please only enter numeric characters only for your Quantity!");
        document.getElementById("qty"+str).focus();
document.getElementById("qty"+str).value='';
        }else if(qty1=="" || qty1==null ){
            alert("Enter Modified Qty ");
            document.getElementById("qty"+str).focus();
            }else{
                
           
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("ccc"+str).value=strar[1];
    stateChanged12(str);
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","stock_adjustment_insert.php?inv="+inv+"&qty="+qty+"&qty1="+qty1+"&prd="+prd+"&batch="+batch,true);
xmlhttp.send();
}
    
    
    
    
    
    
    
    
    
    
}
function save_fun2(str,inv,qty)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	//var ttt=document.getElementById('tott').value;
	//alert(ttt);

var qty1=document.getElementById("qty"+str).value;
var prd=document.getElementById("prd_name"+str).value;
//alert(qty1);
var batch=document.getElementById("batch"+str).value;

if((!qty1.match(/^\d+/)) ||  (qty1 < 0) )
        {
        alert("Please only enter numeric characters only for your Quantity!");
        document.getElementById("qty"+str).focus();
document.getElementById("qty"+str).value='';
        }else if(qty1=="" || qty1==null ){
            alert("Enter Modified Qty ");
            document.getElementById("qty"+str).focus();
            }else{
	var url="stock_adjustment_insert.php";
	url=url+"?inv="+inv+"&qty="+qty+"&qty1="+qty1+"&prd="+prd+"&batch="+batch;
window.reload();
	xmlHttp.onreadystatechange=stateChanged12;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
}
	
}

function stateChanged12(str) 
{  	

	

	
	var bb=document.getElementById("ccc"+str).value;
	//alert(bb);
	var s=1;
		 if(bb==s)
		 {
		  //window.reload();
		 //document.getElementById("success").innerHTML="Updated Successfully";
		alert("Successfully Updated");
		window.reload();
		 }
		 else
		 {
		
		//document.getElementById("success").innerHTML="Not Updated ";
		 alert("Not Updated");
		window.reload();
		 }

	
}


function GetXmlHttpObject()
{

var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

</script>	

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Stock Adjustment List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Stock Adjustment List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Stock Adjustment List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                                                            <!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
                               
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
					                        <div class="col-md-12">
					                            <div class="card card-topline-red">
					                                <div class="card-head">
					                                    <header></header>
					                                    <div class="tools">
					                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
						                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
						                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
					                                    </div>
					                                </div>
					                                <div class="card-body ">
					                                    <div class="row">
					                                        <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group">
					                                              
					                                            </div>
					                                        </div>
					                                        <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group pull-right">
					                                                <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
					                                                    <i class="fa fa-angle-down"></i>
					                                                </a>
					                                                <ul class="dropdown-menu pull-right">
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-print"></i> Print </a>
					                                                    </li>
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
					                                                    </li>
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
					                                                    </li>
					                                                </ul>
					                                            </div>
					                                        </div>
					                                    </div>
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                                <th> Prd.Name </th>
					                                                <th> Batch No </th>
					                                                <th> Exp.Dt  </th>
					                                        <th> Aval.Qty  </th>
					                                              <th> Modified.Qty </th> 
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
														$sq=mysqli_query($link,"select * from phr_purinv_dtl order by
														PRODUCT_NAME asc");		
													/*		$sq=mysqli_query($link,"select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.inv_id from phr_purinv_dtl
			  as a,phr_prddetails_mast as b where a.PRODUCT_NAME=b.PRD_NAME and upper(a.product_name) like ('$n%')");*/
															$i=1;
															$tot=mysqli_num_rows($sq);
															
															//$tot=mysql_num_rows($sq);
				$fintot = 0;
			  $row = 0;
			  $i = 1;
															while($r=mysqli_fetch_array($sq)){
																$tot1=$r[4];  
				$fintot=$fintot+$tot1;
				   
				$unitcost=$r[3];  
				$nitem=$r[7];  
				$eachcost=($unitcost/$nitem);

				$eachcost=round(($eachcost*100)/100);$row++;
																?>
															
                                                            
																<tr class="odd gradeX">
                                                             
																	<td class="patient-img">
																			<?php echo $i?>
																	</td>
																	<td><?php echo $r['PRODUCT_NAME'];?>
																	 <input type="hidden" name="prd_name<?php echo $row ?>" id="prd_name<?php echo $row ?>" value="<?php echo $r['PRODUCT_NAME'];  ?>" />
																	</td>
																	<td class="left">
                            <?php echo $r['BATCH_NO'];  ?> <input type="hidden" name="batch<?php echo $row ?>" id="batch<?php echo $row ?>" value="<?php echo $r['BATCH_NO'];  ?>" />
                                                         </td>
																	<td class="left"><?php //echo $r['type'];?>
																	<?php $d=$r['EXP_DATE'];  echo date('d-m-Y',strtotime($d));?>
																	</td>
																<td class="left"><?php echo $r['balance_qty'];  ?></td>
																
																<td><input name="qty<?php echo $row ?>" size="5"   id="qty<?php echo $row ?>" type="text"  /></td>	
															
																	<td>
																	<A href="javascript:save_fun(<?php echo $row ?>,<?php echo $r['balance_qty'];  ?> ,<?php echo $r['inv_id'];  ?> );">
			 <img src="../img/save1.gif" border="0"></A>
															   <div id="aa"> <input type="hidden" name="ccc" id="ccc<?php echo $row ?>" value=""/></div>
					<input type="hidden" name="tott" id="tott" value="<?php echo $tot ?>" />
                     															
																		
																	</td>
																</tr><?php $i++;}?>
																
															</tbody>
					                                    </table>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>
                                    
            <!-- end page content -->
            <!-- start chat sidebar -->
            
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						
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
	 