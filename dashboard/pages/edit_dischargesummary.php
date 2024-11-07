<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/update_dischargesummary.php');

include("header.php");?>
<script>
function showHint52()
{
var str=document.getElementById("umrno").value;
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
	
	document.getElementById("patno").value=strar[1];
	
	document.getElementById("patname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("sex").value=strar[5];
	document.getElementById("doa").value=strar[6];
	document.getElementById("dichargedate").value=strar[7];
	document.getElementById("address").value=strar[8];
	document.getElementById("doctors").value=strar[9];
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search67.php?q="+str,true);
xmlhttp.send();
}
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("labre").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","search31.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Discharge Summary Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Discharge Summary Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Discharge Summary Details</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">UMR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="umrno" data-required="1"  id="umrno" placeholder="Enter UMR NO" class="form-control" value="<?php echo $mrno; ?>" onChange="showHint52()" required/> 
													 <strong class="required"><?php if(isset($errorecode)){ echo $errorecode;} ?> </strong></div>
                                            
											<label class="control-label col-md-2">Pat No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" id="patno" placeholder="Enter Patient No" class="form-control" value="<?php echo $patno; ?>" />
													
													</div>
                                            
											
											</div>
											
											
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="age" data-required="1" id="age" value="<?php  echo $age; ?>" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="<?php  echo $sex; ?>" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Admission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Birth" type="text" value="<?php echo $admit; ?>" name="doa" id="doa">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											<label class="control-label col-md-2">Date of Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="text" value="<?php echo $discharge; ?>" name="dichargedate" id="dichargedate">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											</div>
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" value="<?php echo  $patname; ?>" id="patname" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
                                            <label class="control-label col-md-2">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                      <textarea name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="5" ><?php echo $addr; ?></textarea>
		                                             
		                                                <input class="form-control " style="display:none;" size="16" placeholder="Father Name" type="text" value="<?php echo  $fname; ?>"  name="fname" id="fname">
		                                                
	                                            	</div>
	                                            
											
											</div>
											
											
											
											
											
                                                    <textarea style="display:none;" name="doctors" id="doctors" placeholder="Consultant Name" class="form-control-textarea" rows="5" ><?php echo $doctor; ?></textarea>
                                               
											<div class="form-group row">
                                                <label class="control-label col-md-2">Final  Diagnosis
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea name="lab" id="result"  class="form-control ckeditor" rows="10" ><?php echo $finaldiagnosis; ?></textarea>
                                                </div>
												 
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Discharge Advice
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="lab1" id="result1"  class="form-control ckeditor" rows="10" ><?php echo $inreport;?></textarea>
                                                   </div>
												 
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Left Doctor Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <select name="dname" id="dname"  class="form-control">
													  
													
													 <option value="">Select Dr Name</option>
													 <?php
													 $j=mysqli_query($link,"select * from doct_infor");
													 while($j1=mysqli_fetch_array($j)){
													 ?>
													 <option value="<?php echo $ld=$j1['dname1'] ?>" <?php if($file==$ld){ echo 'selected';} ?>><?php echo $j1['dname1'] ?></option>
													 <?php }?>
													 </select>
                                                   </div>
												 
                                            </div>	
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Right Doctor Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <select name="rdname" id="rdname"  class="form-control">
													
													
													 <option value="">Select Dr Name</option>
													 <?php
													 $j=mysqli_query($link,"select * from doct_infor");
													 while($j1=mysqli_fetch_array($j)){
													 ?>
													 <option value="<?php echo $rd=$j1['dname1'] ?>" <?php if($rdoctor==$rd){ echo 'selected';} ?>><?php echo $j1['dname1'] ?></option>
													 <?php }?>
													 </select>
                                                   </div>
												 
                                            </div>	
										
                                                <div class="col-md-4">
                                                    
		                                                
		                                                 <input class="form-control" size="16"  type="hidden"  name="user" id="user" value="<?php echo $ses; ?>">
	                                            <input class="form-control" size="16"  type="hidden"  name="id2" id="id2" value="<?php echo $id2; ?>">
	                                            </div>
                                                 
											</div>
											
											
											
											
											
											
											
											
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="dischargesummarylist.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    

	      <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
			 <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result1');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>