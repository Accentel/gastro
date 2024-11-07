<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/connection.php');
include("header.php");?>
<?php
//include("config.php");
if(isset($_POST['submit']))
{
$UserName=$_POST['user'];
$Oldpassword=md5($_POST['cpass']);
$Newpassword=$_POST['npass'];
$Confpassword=$_POST['cnpass'];

 $add="select * from login where name1='$UserName'";
 $res=mysqli_query($link,$add) or die("it is not connect to data base".mysqli_error($link));

$row=mysqli_fetch_array($res); 
 $dbname=$row['name1'];
 $dbpass=$row['passowrd'];

if(($dbpass==$Oldpassword) and ($Newpassword==$Confpassword))                     
{
	$Newpassword1=md5($Newpassword);
 $q="update login set passowrd='$Newpassword1',pass1='$Newpassword' where name1='$dbname'";
$rel=mysqli_query($link,$q);
if($rel)
{
print "<script>";
	print "alert('password changed successfylly');";
	print "self.location='changepassword.php';";
	print "</script>";
//header('location:Change-Pass.php');
}
else
{
print "<script>";
	print "alert('Enter Correct Password');";
	//print "self.location='changepassword.php';";
	print "</script>";
}
}
else                  
{
print "<script>";
	print "alert('Enter Correct Password');";
	//print "self.location='changepassword.php';";
	print "</script>";
}
}
?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Change Password</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Change Password</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Change Password</header>
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
                                                <label class="control-label col-md-3">Current password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" name="cpass" id="cpass" class="form-control">
                                            </div>
                                            </div>
											  <div class="form-group row">
                                                <label class="control-label col-md-3">New Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" name="npass" id="npass" class="form-control">
                                            </div>
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Confirm Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" name="cnpass" id="cnpass" class="form-control">
                                            </div>
                                            </div>
															
                                      
													<input name="user" id="user" type="hidden"  class="form-control input-height" value="<?php echo $ses; ?>" /> 
													
                                           
                                           
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="submit" class="btn btn-info">Change Password</button>
                                                    <a href="dashboard.php"><button type="button" class="btn btn-danger">Cancel</button></a>
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