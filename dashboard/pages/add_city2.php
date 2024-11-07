<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/insert_city2.php');
include("header.php");?>
<script>
  function showUser(str)
{

if (str=="")

  {

  document.getElementById("state").innerHTML="";

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

	document.getElementById("city").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data.php?q="+str,true);

xmlhttp.send();

}

</script>
<script>
  function showUser1(str)
{

if (str=="")

  {

  document.getElementById("city").innerHTML="";

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

	document.getElementById("mandal").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data1.php?q="+str,true);

xmlhttp.send();

}

</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Village  Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Village Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Add Village</header>
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
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
															  <div class="form-group row">
                                                <label class="control-label col-md-3">State
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <select name="state" class="form-control" onchange="showUser(this.value)">
												   <option value="">Select State</option>
												   <?php $sq=mysqli_query($link,"select * from location_states where cname='India' order by state asc");
												   while($r=mysqli_fetch_array($sq)){?>
												   
												   <option value="<?php echo $r['state'];?>"><?php echo $r['state'];?></option>
												   <?php }?>
												   </select>
                                            </div>
                                            </div>
											  <div class="form-group row">
                                                <label class="control-label col-md-3">City/District
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <select name="city" id="city" class="form-control" onchange="showUser1(this.value)">
												  
												   </select>
                                            </div>
                                            </div>
															
                                        <div class="form-group row">
                                                <label class="control-label col-md-3">Mandal
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <select name="mandal" id="mandal" class="form-control" >
												  
												   </select>
                                            </div>
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Village
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" name="village" id="village" class="form-control">
												  
												
                                            </div>
                                            </div>
													<input name="user" id="user" type="hidden"  class="form-control input-height" value="<?php echo $ses; ?>" /> 
													
                                           
                                           
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                                    <a href="city2.php"><button type="button" class="btn btn-danger">Cancel</button></a>
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