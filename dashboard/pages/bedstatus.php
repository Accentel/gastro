<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/locations.php');
include("header.php");?>
<script>
function showtest(str){
	
	if(str=="Yes"){
		document.getElementById('gtest1').style.display="block";
	}else{
		document.getElementById('gtest1').style.display="none";
	}
	
	
	
}
function showuser(str)
{
	
		
if (str=="")
  {
  document.getElementByName("section").innerHTML="";
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
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("rtype").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_rtype.php?q="+str,true);
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
                                <div class="page-title">Bed Status </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Ward</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Bed Status </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Bed Status</header>
                                     <i class="material-icons" style="color:green;width:32px;height:32px;">hotel</i> Available Beds  &nbsp; &nbsp;&nbsp;<i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i>Reserved Beds
                                </div>
                                <div class="card-body" id="bar-parent">
												
								
                                    <?php  foreach($result as $key=>$p){ $lid=$p['id'];?>
									 <div><b><?php echo $p['lname']; ?></b></div>
									 <?php 
									  $r="select * from roomtype where ltype='$lid'";
									 $result1 = $crud->getData($r);
									  foreach($result1 as $key=>$p1){ $rid=$p1['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p1['rtype']; ?></b></div>
									  <?php 
									  $r2="select * from rooms where ltype='$lid' and rtype='$rid'";
									 $result2 = $crud->getData($r2);
									  foreach($result2 as $key=>$p2){ $romid=$p2['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $p2['roomno']; ?></div>
									  
									   <?php 
									  $r3="select * from beds where ltype='$lid' and rtype='$rid' and roomno='$romid'";
									 $result3 = $crud->getData($r3);
									  foreach($result3 as $key=>$p3){ $bid=$p3['id'];?>
									   <?php if($p3['status']=='out'){?>
									   &nbsp;&nbsp;&nbsp;<a href="#" title="<?php echo $p3['bedno']; ?>"><i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i></a>&nbsp;&nbsp;&nbsp; 
									   <?php }else{?>
									  &nbsp;&nbsp;&nbsp;<a href="#" title="<?php echo $p3['bedno']; ?>"><i class="material-icons" style="color:green;">hotel</i> </a>&nbsp;&nbsp;&nbsp;
									   <?php }?>
									  
									  <?php 
									  
									  }
									  }
											  
									  }
									  
									  }?>
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