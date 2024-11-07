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

<script type="text/javascript">
function save_fun(str,id)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	//var ttt=document.getElementById('tott').value;
	//alert(ttt);

var qty1=document.getElementById("vat"+str).value;
var qty2=document.getElementById("sgst"+str).value;
var qty3=document.getElementById("cgst"+str).value

//if(qty1=="" || qty1==null){alert("Enter Modified Qty ");document.getElementById("vat"+str).focus(); return;}

//alert(qty1);
//if(qty1 < 0)
//{
//alert("Modified.Qty is not less than zero");
//document.getElementById("vat"+str).focus();
//document.getElementById("vat"+str).value='';
//document.getElementById("sgst"+str).focus();
//document.getElementById("sgst"+str).value='';
//document.getElementById("cgst"+str).focus();
//document.getElementById("cgst"+str).value='';

//return ;


//}
//alert(qty1);
//alert(qty2);
//alert(qty3);

	var url="product_insert.php";
	url=url+"?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&id="+id;
//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged12;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
	
}

function stateChanged12() 
{  	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
	
	document.getElementById("aa").innerHTML=xmlHttp.responseText;
	
	var bb=document.getElementById("ccc").value;
	//alert(bb);
	var s=1;
		 if(bb==s)
		 {
		  reload();
		 //document.getElementById("success").innerHTML="Updated Successfully";
		alert("Successfully Updated");
		
		 }
		 else
		 {
		 reload();
		//document.getElementById("success").innerHTML="Not Updated ";
		 alert("Not Updated");
		
		 }
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
								<form name="frm" method="post" >               
<table align="right" cellspacing="2" class="table">
<tr>
   <td  class="label1"><strong>Product Type Name</strong> <span class="style2">*</span> : </td>
	<td >
	<strong><select name="tname" id="tname" required  class="text">
	<option value=""> -- Select Type -- </option>
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
	</select></strong></td> 
    <td align="left"><input name="submit" type="submit" value="" style="background:url(../img/go1.gif);width:42px;height:22px;border-style:none;" /></td>

    </tr>
	<tr><td colspan="3"><hr></td></tr>
	</table>
</form>
								<div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                                <th> Prd.Name </th>
					                                                <th>GST(%)  </th>
					                                                <th> SGST(%) </th>
					                                           
					                                               <th> CGST(%) </th>
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
															if(isset($_POST['submit'])){
																 $n=$_POST['tname'];
																  $a="select * from  phr_prddetails_mast where `TYPE`='$n'";
																$sq=mysqli_query($link,$a);
															} $i=1;
															$tot=mysqli_num_rows($sq);
				$fintot = 0;
			  $row = 0;
			  $i = 1;
															$cnt=mysqli_num_rows($sq);
															while($res=mysqli_fetch_array($sq)){
																$id=$res['id'];
		 //$prdtype_code=$row['PRD_NAME'];
		 $prd_name=$res['PRD_NAME'];
	 	// $unit_code=$row[2];
		$vat=$res['vattax']; 
		// $pck_id=$row[4];
		 $type_name=$res['TYPE'];
		 $sgst=$res['sgst'];
		 $cgst=$res['cgst'];
																
																?>
															
                                                            
																<tr class="odd gradeX">
                                                             
																	<td class="patient-img">
																			<?php echo $i?>
																	</td>
																	<td><?php echo $res['PRD_NAME'];?>
																	</td>
																	<td class="left">
                          <select name="vat<?php echo $row ?>" id="vat<?php echo $row ?>" class="form-control">
	<option> --- Select GST Tax --- </option>
	 <option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
             <option value="5" <?php if($vat=='5'){echo "selected";}  ?>>5</option>
	<option value="12" <?php if($vat=='12'){echo "selected";}  ?>>12</option>
	<option value="18" <?php if($vat=='18'){echo "selected";}  ?>>18</option>
    <option value="28" <?php if($vat=='28'){echo "selected";}  ?>>28</option>
       </select>                           </td>
																	<td class="left"> <select name="sgst<?php echo $row ?>" id="sgst<?php echo $row ?>"  class="form-control">
	<option> --- Select SGST Tax --- </option>
	 <option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
	<option value="2.5" <?php if($sgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($sgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($sgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($sgst=='14'){echo "selected";}  ?>>14</option>
       </select>   </td>
																
																<td class="left">
																	<select name="cgst<?php echo $row ?>" id="cgst<?php echo $row ?>">
	<option> --- Select CGST Tax --- </option>
	 <option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
	<option value="2.5" <?php if($cgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($cgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($cgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($cgst=='14'){echo "selected";}  ?>>14</option></td>
       </select>   
															
																	<td>
																	<A href="javascript:save_fun(<?php echo $row ?>,<?php echo $id ?> );"><img src="../img/save1.gif" border="0"></A>
																	<input type="hidden" name="ccc" id="ccc" value=""/>
																	<input type="hidden" name="tott" id="tott" value="<?php echo $tot ?>" />
																	
																		<!--<a href="edit_product_details.php?id=<?php echo $r['id']?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a><a onclick="return confirm('Are you sure you want to delete this item?');" href="../modal/delete_product_det.php?id=<?php echo $r['id']?>">
																	
																		<button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
																		</button></a>-->
																	</td>
																</tr><?php $i++;}?>
																
															</tbody>
					                                    </table>
					                                    </div>
					
					
					
              
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