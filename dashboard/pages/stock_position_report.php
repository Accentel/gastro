<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	//include("header.php");
?>
<script type="text/javascript">
function getstock(str)
{ 
	
	
	if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}
	var str1=document.form.ptype.value;
	var str2=document.form.Batchno.value;

var str5=document.getElementById("prdnames").value;

	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 

/*********/
   var report2 =str;
  document.getElementById("report2").value=str;
   var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++){
   if (document.form.reporttype[i].checked){
	   report1 = document.form.reporttype[i].value;
   }
  }
 
 
var pass;
if(report1=="All" && report2=="all")
{
pass="All";
} else if(report1=="All" && report2=="All2"){
pass="All2";
} else if(report1=="Datewise")
{
 var fdate=document.form.fdate.value;
var tdate=document.form.tdate.value;
if(fdate==tdate){alert("Dates Should Be defferent ");document.form.fdate.focus();
	return (false);}
pass=''+report1+'&fdate='+fdate+'&tdate='+tdate+'';

}
/*******/
   
	var url="getstock.php";
	url=url+"?prdtype="+str1+"&reporttype="+pass+"&rtype="+str+"&Batchno="+str2+"&prdnames="+str5;
//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
	

}

function stateChanged() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
		
		var str3=document.form.ptype.value;
		document.getElementById("sob").innerHTML=xmlHttp.responseText;
		var stra=document.getElementById("report2").value;	
		if(stra=="all"){
		document.form.action=prdnames(str3)
		}
		
	}
}

function prdnames(str)
{ 
	
	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
  
	var url="getprdnames.php";
	url=url+"?prdtype="+str;
	//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged12;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	

}

function stateChanged12() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
	
		document.getElementById("abc123").innerHTML=xmlHttp.responseText;
		
		
	}
}




function getBatchno()
{ 
	if(document.form.ptype.selectedIndex == 0){//alert("if")
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}
	else{//alert("else")
		document.getElementById("trid4").style.display='';
	var str=document.form.ptype.value;

	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
  
	var url="getBatchno.php";
	url=url+"?prdtype="+str;
	//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
}//else
}

function stateChanged1() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
		/* for (var i=0; i < document.form.report.length; i++){
			 document.form.report[i].checked=false;
		document.getElementById("report").checked = false;	}*/
		document.getElementById("batchno").innerHTML=xmlHttp.responseText;
		
				
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
<script type="text/javascript">
function report()
{
	var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++)
  {
      if (document.form.reporttype[i].checked)
     {
	   report1 = document.form.reporttype[i].value;
      }
  }

var pass;
if(report1=="All")
{
pass="All";
}
else if(report1=="Datewise")
{
 var fdate=document.form.fdate.value;
var tdate=document.form.tdate.value;
if(fdate==tdate)
  {
      alert("Dates Should Be defferent ");document.form.fdate.focus();
	//return (false);
	}

var str ="";
  //for (var i=0; i < document.form.report.length; i++){
   //if (document.form.report[i].checked){
	   str = document.form.report.value;
   //}
  //}
  //alert(str);
var batc ="";
var batc=document.getElementById("batc").value;
//alert(batc);
pass= ''+report1+'&fdate='+fdate+'&tdate='+tdate+'&rtype='+str+'&batno='+batc+'';
//alert(pass);
}

   if(document.form.ptype.value =="")
	{
		alert("Please Select Product Type");
		document.form.ptype.focus();
		//return(false);
	}else{
	var protype=document.form.ptype.value;
	
	var str5=document.getElementById("prdnames").value;
	}
	window.open('PDF_Stockposition.php?ptype='+protype+'&reporttype='+pass+'&prdnames='+str5,'mywindow1','width=1020,height=700,toolbar=no,menubar=no')
	
}
</script>
<script type="text/javascript">
function enabletext()
{
document.form.Batchno.disabled=false;
if(!(document.form.Batchno.value=="-"))
{
//alert(document.myform.classlist.value);
//report();
}

}//enabletext()
function disabletext()
{
document.getElementById("trid4").style.display='none';
//report();


}//disabletext()
function ex1(){

if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}

}
function ex2(){
if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	}

if(document.form.Batchno.selectedIndex == 0){
	alert("Please select Batch Number");
	document.form.Batchno.focus();
	}


}
function selectreport(str)
{
if(str==1){
document.getElementById("trid1").style.display='none';
document.getElementById("trid2").style.display='none';
document.getElementById("trid3").style.display='none';
document.getElementById("trid4").style.display='none';

}
if(str==2){
document.getElementById("trid1").style.display='';
document.getElementById("trid2").style.display='';
document.getElementById("trid3").style.display='';
document.getElementById("trid4").style.display='';
document.getElementById("tridaa").style.display='none';

}}

function chckproduct()
	{
   var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++){
   if (document.form.reporttype[i].checked){
	   report1 = document.form.reporttype[i].value;
   }
  }

var pass;
if(report1=="All")
{
getstock('all')}
}
</script>
</head>
<body>
  <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Stock Position Report</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Stock Position Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Stock Position Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Stock Position Report</header>
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
          
<FORM name="form" > <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
<table width="100%" border="0" class="table" cellspacing="5" cellpadding="0">
   
          <tr>
            <td colspan="4">
			<fieldset>
			<legend><b style=" color:#FF6600 ">Select Any One Of The Options Below </b></legend>
			<div align="center" ><input type="radio" name="reporttype" value="All"  onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
			<input type="radio" name="reporttype" value="Datewise" onclick="javascript:selectreport(2)" /> 
			DateWise

			</div>
			</fieldset>
			</td>
          </tr>
          <tr >
            <td colspan="2" ><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr></tr>
              <tr></tr>
              <tr>
                <td colspan="2"><div class="style2" align="center">(* Marked Fields are Mandatory)</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr  style="display:none" id="trid1">
                <td class="label1"><div align="right">From Date <span class="style2">*</span> : </div></td>
                <td><input name="fdate" type="date" class="form-control" id="fdate" readonly="readonly" value="<?php echo date('d-m-Y'); ?>"/>
                  </td></tr>
              <tr  style="display:none" id="trid2">
                <td class="label1"><div align="right">To Date <span class="style2">*</span> : </div></td>
                <td><input name="tdate" type="date" class="form-control" id="tdate" readonly="readonly" value="<?php echo date('d-m-Y'); ?>"/>
                  </td></tr>
              <tr>
                <td class="label1" color="red"><div align="right">Select Product Type <span class="style2">*</span> : </div></td>
                <td><select name="ptype" id="ptype"  class="form-control"  >
                  <option value="">---Select-----</option>
                    <?php
						$sql = mysqli_query($link,"select distinct(PRDTYPE_NAME),prdtype_code from phr_prdtype_mast ");
						if($sql){
						while($row = mysqli_fetch_array($sql)){
							$prdtypename=$row[0];
							$prdtypecode=$row[1];
					?>
                    <option value="<?php echo $prdtypename ?>" ><?php echo $prdtypename ?></option>
                  <?php } 
				  }?>
                </select></td>
              </tr>
			  
			  
			   <tr  id="tridaa">
                <td class="label1"><div align="right">Select Product Name <span class="style2">*</span> : </div></td>
                <td>
			<div id="abc123">
                   <select name="prdnames" id="prdnames" class="form-control">
                      <option value="">-- Select --</option>
                    </select>
                </div>
                 </td>
              </tr>
			  
              <tr style="display:none" id="trid3">
                <td class="label1"><div align="right">Report Type <span class="style2">*</span> : </div></td>
               <td><input type="radio" name="report" id="report" value="b" onclick="getBatchno();"/>
                  Batch Wise
                  <input type="radio" name="report" id="report" value="e" />
                  Exp.Dt Wise
                  
              </tr>
              <tr> </tr>
              <tr>
                <td height="2"></td>
              </tr>
              <tr style="display:none" id="trid4">
                <td class="label1" ><div align="right">Batch No : </div></td>
                <td><div id="batchno">
                    <select name="Batchno" id="batc"class="select" >
                      <option value="">--Select Batch Number--</option>
                    </select>
                </div></td>
              </tr>
            </table></td>
            </tr><input type="hidden" name="report2" id="report2" value="" />


<tr >
  <td colspan="4" align="center" ><div id="sob">&nbsp;</div>	</td>
    </tr>
	</table>
	 <!-------------------------------------- error dispaly-->
          <table width="100%">
		  
		  <tr>
            
            <td align="center">
			 <input type="button" value = "Report" onclick="window.location.href='javascript:report()'" class="butt" />
			  <input type="button" value = "Close" onclick="window.location.href='dashboard.php'" class="butt"/></td>
          </tr>
        </table></div></div></div>
</form>

</div>

		<?php include('footer.php'); ?>

	</div>
</body>
</html>


<?php 

}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

