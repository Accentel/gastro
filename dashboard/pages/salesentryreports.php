<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
<script type="text/javascript">
function report()
{
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
      var s_date=document.form.fdate.value;
	  var e_date=document.form.tdate.value;
	   var prdcode=document.form.prdcode.value;
	   var ctype=document.form.ctype.value;
	   var cname=document.form.cname.value;
	   var cname1=document.form.cname1.value;
	  window.open('pdf_salesentry.php?s_date='+s_date+'&e_date='+e_date+'&prdcode='+prdcode+'&ctype='+ctype+'&cname='+cname+'&cname1='+cname1,'mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>
<script type="text/javascript">
function product(){
var fdate=document.form.fdate.value
var tdate=document.form.tdate.value;
var url="get_saleproduct2.php?fdate="+fdate+"&tdate="+tdate;
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

	
}

function stateChanged() 
{ 
	if(xmlHttp.readyState==4)
	{ 
      // alert(	xmlHttp.responseText);
		document.getElementById("prdcode").innerHTML=xmlHttp.responseText;
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
<script>
	function fun1()
	{
		var ctype = document.getElementById("ctype").value;
		if(ctype == "c"){
			document.getElementById("op").style.display='';
			document.getElementById("ip").style.display='none';
		}else if(ctype == "p"){
			document.getElementById("ip").style.display='';
			document.getElementById("op").style.display='none';
		}
	}
</script>	
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Sales Entry Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Sales Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Sales Entry Reports</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Sales Entry Reports</header>
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
								
								<form name="form" method="post" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>From Date</label>
	                                            <input type="date" class="form-control" name="fdate" value="<?php echo $today = date("Y-m-d"); ?>" id="fdate" required="required" >
	                                        </div>
											
											 <div class="form-group">
	                                            <label>To Date</label>
	                                          <input type="date" class="form-control" name="tdate" value="<?php echo $today = date("Y-m-d"); ?>" id="tdate" required="required" >
	                                        </div>
										<div class="form-group">
	                                            <label>Product Name</label>
	                                          <select name="prdcode" id="prdcode" class="form-control" >
		<option value="">--Select Product Name--</option>
			<?php /*?><?php
		$query =  mysql_query("select distinct product_code,prd_name from phr_salent_dtl as a,phr_prddetails_mast as b where a.product_code=b.prd_code ");
		if($query)
		{
			while($row = mysql_fetch_array($query))
			{
		?>
		<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
		<?php
			}
		}
		?>	<?php */?>	
		</select>  </div>
											
											 <div class="form-group">
	                                            <label>Customer Type</label>
												<select name="ctype" id="ctype"  class="form-control" onchange="fun1();">
			<option value="">--Select Type--</option>
			<option value="c">Customer / OP</option>
			<option value="p">IP Patient</option>
			
			</select>
	                                           </div>
											<div class="form-group" style="display:none"  id="ip">
	                                            <label>Customer Type</label>
												<select name="cname" id="cname"  class="form-control">
			<option value="">--Select Consultant--</option>
			<?php
			$query =  mysqli_query($link,"select distinct Consultant_Name from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no ");
			if($query)
			{
				while($row = mysqli_fetch_array($query))
				{
			?>
			<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
			<?php
				}
			}
			?>		
			</select>
	                                           </div>
											   
											   <div class="form-group" style="display:none"  id="op">
	                                            <label>Customer Type</label>
												<select name="cname1" id="cname1"  class="form-control" >
			<option value="">--Select Type--</option>
			
			
			</select>
	                                           </div>
											   
											  
												<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Report" onclick="report();">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
											
											
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