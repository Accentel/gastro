<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include("header.php");?>

<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Lab Bill</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Lab Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Lab Bill Entry</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Lab Bill</header>
                                    <?php 
     										include('../db/connection.php');	
											include('../db/insert_rentryresult.php');
											?>
                                     
				                       
                                </div>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <?php	
										
										$id=$_GET['bno'];
										$test=$_GET['test'];
										$uy=mysqli_query($link,"select  * from bill where billno='$id'") or die(mysqli_error($link));
											$res=mysqli_fetch_array($uy);
											
											$bdate=$res['bdate'];
											
											
											?>
										<div class="form-body">
										
                                       
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4"> 
                                                    <input type="text" name="pname" data-required="1" id="pname"  readonly placeholder="Enter Patient Name" class="form-control" required value="<?php echo $res['pname']; ?>"/> 
													<input type="hidden" name="bno" data-required="1" id="bno" readonly  placeholder="Enter Patient Name" class="form-control" required value="<?php echo $res['billno']; ?>"/> 
                                                  
													
													</div>
												<label class="control-label col-md-2">Age/Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
												<input type="text" name="age" data-required="1" id="age" readonly  placeholder="Enter Age" class="form-control" required value="<?php echo $res['age']; ?>"/> 
                                              </div>
											 <div class="col-md-2">
                                                    <input type="text" name="gender" data-required="1" readonly id="gender"   placeholder="Enter Gender" class="form-control" required value="<?php echo $res['gender']; ?>"/> 
													
													</div>
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Reference
                                                    <span class="required"> * </span>
                                                </label>
                                               <div class="col-md-4">
                                                    <input type="text" name="dname"  readonly id="dname" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $res['dname']; ?>"/> </div>
                                            
                                            <label class="control-label col-md-2">Bill Date
                                                    
                                                </label>
                                               <div class="col-md-4">
                                                    <input type="text" readonly name="bdate"  id="bdate" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $res['bdate']; ?>"/> 
												<input type="hidden" name="tname"  id="tname"  class="form-control" value="<?php echo $test; ?>"/> 	
													
													</div>
                                             
											
											</div>
											
                                          	
                                          <div class="form-group row">
                                                
                                                
                                                <div class="col-md-12">
                                                <table class="table table-border">
												<tr>
												<th>Invegastia</th>
												<th>Results</th>
												<th>Units</th>
												<th>Normal Range Value</th>
												</tr>
												<?php 
													$qt="select * from labtest2 where tname='$test'";
													$q=mysqli_query($link,$qt) or die(mysqli_error($link));
													$c=mysqli_num_rows($q);
													if($c >0){
													foreach($q as $key=>$r){
													 $test=$r['tname']; 
													 $tit=$r['title'];
													 $ty="select * from resultentry3 where title='$tit' and tname='$test' and bno='$id'";
													 $u=mysqli_query($link,$ty) or die(mysqli_error($link));
													 $u1=mysqli_fetch_array($u);
													 $rest=$u1['result'];
													?>
													<tr>
													<td><input type="hidden" name="heading[]" id="heading" value="<?php echo $r['heading'] ?>"/><input type="hidden" name="invg[]" id="inv" value="<?php echo $r['title'] ?>"/><?php echo $r['title'] ?></td>
													<td><input type="text" name="result[]" value="<?php echo  $rest; ?>"/></td>
													<td><input type="hidden" name="units[]" id="units" value="<?php echo $r['units'] ?>"/><?php echo $r['units'] ?></td>
													<td><input type="hidden" name="descr[]" id="descr" value="<?php echo $r['description'] ?>"/><?php echo $r['description'] ?></td>
													</tr>
												<?php  }
													}else{ ?>
														
													<tr>
													<td colspan="4" align="center">No Test Results Found</td>
													</tr>	
														
														
												<?php	}
													?>
												
												</table>
												 </div>
												 
												 
                                          	</div>	
                                   
											
											
                                        			
                                        			
                                        			
                                        			
                                        			
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <button type="button" class="btn btn-default" onClick="window.close();">Cancel</button>
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
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>