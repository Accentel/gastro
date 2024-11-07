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
<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 
<script language="javascript">

function Addrow()
{
    var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="itemcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			
			var select12="minlevel"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Min Order Level Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="itemcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="itemcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		return (false);

		}
		}
		}
		}
		



	   var supcode=document.getElementById("supcode").value
	   //alert(count);
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	// var oCell = document.createElement("TD");
   // oCell.innerHTML= "<div align='center' ><input  type='text' name='itemcode"+Row+"' id='itemcode"+Row+"' class='textbox1'   size='8' onclick=window.open('Supplier_itemcode_pop.jsp?rowid="+Row+"&supcode="+supcode+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly class=textbox> </div>"; 
	//row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='itemname"+Row+"' id='itemname"+Row+"' class='textbox1'   size='8'> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='uom"+Row+"' id='uom"+Row+"'class='textbox1' size='8'  > </div>"; 
     row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='minlevel"+Row+"' id='minlevel"+Row+"' class='textbox1'  > </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='rate"+Row+"' id='rate"+Row+"'class='textbox1'  > </div>"; 
     row.appendChild(oCell);




     document.getElementById("rows").value=Row;
//sameinvcodes(Row);


   }//addrow()


function deleteRow()
{
  var tbl = document.getElementById('TABLE1');
  var lastRow = tbl.rows.length;
var rowss=document.getElementById("rows").value;

  if (lastRow > 1){ tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function check()
	{
if(document.form.supcode.value=="")
{
alert("Please Click On SupplierCode");
return false;
}

 var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="itemcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			
			var select12="minlevel"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Min Order Level Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="itemcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="itemcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		return (false);

		}
		}
		}
		}

	//alert("else update")
	document.form.action="supplier_items_update.php"
	document.form.submit()

	
}//check
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Supplier Items</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="add_supplier_items.php">Supplier Items</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Supplier Items</li>
                            </ol>
                        </div>
                    </div>
				<?php 	
				
				 $a="select max(lr_no) from phr_purinv_mast";
				$sql = mysqli_query($link,$a);
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}
		?>			
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Supplier Items</header>
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
								
								 <form name="form" method="post" action="insert_purchase_invoice.php" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Supplier Code</label>
	                                            <input type="text" class="form-control" name="supcode"   onclick="window.open('supplier_item_popup.php','mywindow','width=500,height=550,toolbar=no,resizable=yes,menubar=no,scrollbars=yes')"  required="required" id="supcode" >
	                                        </div>
											
										
											
											<div class="form-group">
                                            <label>Category</label>
                                   <input type="text"  class="form-control" name="category"  id="category" >
									   </div>
											
											
											
											
										
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Supplier Name</label>
	                                            <input type="text" class="form-control" name="supname" required  id="supname" >
                                        </div>
										
										
									<input type="hidden" name="mvalue"/>
                                        
										
										<div class="form-group">
	                                          <br /><br /><br />
	                                        </div>  
										
										
										
										
									  
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="table-scrollable">
								<table id="t1" width="99%">
			<tr><td colspan="2" width="100%"><div id="itemdetails" ></div></td>
                <td><input name="hidden" type="hidden" id="htnDcode" runat="server" />
                    <input type="hidden" runat="server" id="htncount" name="htncount1" />
                    <input type="hidden"  runat="server" id="count" name="count" value="1" />
                    <input type="hidden"  runat="server" id="htnt" name="str" />
                    <input name="cnt" type="hidden" id="cnt">
				</td>
           </tr>
            	   
           
					                                        </thead>
					                                        <tbody>
                                                           
															
                                                            
																
																
															</tbody>
					                                    </table>
														</table>
											
													</div>	
												<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-3 col-sm-3">
	                                        <!-- text input -->
											
																			
	                                    </div>
										
										
	                                    
                                        <!-- textarea -->
										
										
										
                               
										
									
								
										
										
										
										<script>
function adjttotal(){
var sum=0;
var ntot=document.getElementById("nettot").value;

if(ntot=="" || ntot==null){
document.getElementById("gtot").value="0";
}
else{
var ad=document.getElementById("adjt").value;
var rn=document.getElementById("round").value;
if(ad=="" || ad==null){ad=0;}
if(rn=="" || rn==null){rn=0;}
ntot=eval(ntot)+eval(ad);
//alert(sum);
var ss=eval(ntot)-eval(rn);
document.getElementById("gtot").value=ss;
//document.getElementById("paid").value=ss;
}
}

</script>

<script>
function krk(){
	
	var gtot=document.getElementById("gtot").value;
	var paid=document.getElementById("paid").value;
	
	var ss=eval(gtot)-eval(paid);
document.getElementById("bal").value=ss;
}</script>

 <script type="text/javascript">
		$(function(){
$('#paid').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#gtot').val());
    $('#bal').val(totalpoints - balance);
});



});//]]>  
</script>
										
                                       
                                 
                                	</div></div>
														
									<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-3 col-sm-3">
	                                        <!-- text input -->
											<div class="form-group"></div>
											<div class="form-group"> </div>	
										
	                                    </div>
										
										
	                                   
									
									
                                	</div>
									
									
                                </div>					
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <!--<input type="submit" class="btn btn-info" name="submit" onclick="save1()" value="Submit" name=" ">-->
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Close</button>
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