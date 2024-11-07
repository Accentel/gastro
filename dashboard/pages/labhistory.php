<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/connection.php');
include("header.php");?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Lab History </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Lab History</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Lab History</header>
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
                                                <label class="control-label col-md-3">Mr No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" name="mrno" data-required="1" id="mrno" placeholder="Enter Department Name" class="form-control mrno" value="" required/>
													
													<span class="required"><?php if(isset($errordname)){echo $errordname;} ?></span>
                                            </div>
											<div class="col-md-2">
                                                     <button type="submit" name="submit" class="btn btn-info">Report</button>
                                            </div>
                                            </div>
                                           
											
										</div>
                                    </form>
									
									 <div class="col-md-12">
									<table class="table">
									<tr>
									<td>S No</td>
									<td>Bill No</td>
									<td>Bill Date</td>
									<td>Test Name</td>
									</tr>
									<?php 
									if(isset($_POST['submit'])){
									$mrno=$_POST['mrno'];
									
									$t=mysqli_query($link,"select * from bill where mrno='$mrno'") or die(mysqli_error($link));
									$i=1;
									while($t1=mysqli_fetch_array($t)){
									?>
									<tr>
									<td><?php echo $i; ?></td>
									<td><a onclick="window.open('print_result1.php?id=<?php echo $t1['billno']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"><?php echo $bn=$t1['billno']; ?></a></td>
									<td><?php echo $t1['bdate']; ?></td>
									<td>
									<?php 
									
									$m=mysqli_query($link,"select * from bill1 where bno='$bn'") or die(mysqli_error($link));
									while($m1=mysqli_fetch_array($m)){
										
										echo $m1['testname']."<br/>";
										
									}
									
									?>
									
									
									</td>
									</tr>
									<?php $i++; }} ?>
									
									<table>
									</div>
									
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
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
			<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>   
			<script>
			$(function() {
    
    //autocomplete
    $(".mrno").autocomplete({
        source: "set9.php",
        minLength: 1
    });    


;})
			</script>
	   <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>