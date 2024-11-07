<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/insert_entryresult1.php');
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
                                <div class="page-title">Procedure Lab Bill</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Procedure Lab Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Procedure Lab Bill Entry</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Procedure Lab Bill</header>
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
                                        <?php	foreach($rst as $key => $res){
											$bdate1 = str_replace('-', '/', ($res['bdate']));
											$bdate=date('d/m/Y', strtotime($bdate1));
											$tamount=$res['tamount'];
											$discount=$res['discount'];
											$namount=$res['namount'];
											$pamount=$res['pamount'];
											$bamount=$res['bamount'];
											$remarks=$res['remarks'];
											$paymenttype=$res['paymenttype'];
											
											?>
										<div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mrno"   id="mrno" placeholder="Enter MRNO" class="form-control mrno" readonly value="<?php echo $mrno=$res['mrno']; ?>" required /> 
													
													 </div>
                                            
											
                                            
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
												
											
                                                <div class="col-md-4">
												
                                                    <input type="text" name="bno" data-required="1" id="bno" placeholder="Enter Bill No" class="form-control" value="<?php echo $bno1=$res['billno']; ?>" readonly/>
													 <input type="hidden" name="user"  id="user"  class="form-control" value="<?php echo $ses; ?>" />
													 <input type="hidden" name="id"  id="id"  class="form-control" value="<?php echo $crud->my_simple_crypt($res['id'],'e'); ?>" />
													</div>
											
												<label class="control-label col-md-2">Bill Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="text" value="<?php echo $bdate; ?>" name="bdate" id="bdate">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            </div>
												</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pname" data-required="1" id="pname"  placeholder="Enter Patient Name" class="form-control" required value="<?php echo $res['pname']; ?>"/> 
													
													</div>
												<label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="age" data-required="1" id="age"  placeholder="Enter Age" class="form-control" required value="<?php echo $res['age']; ?>"/> 
                                              </div>
											
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="gender" data-required="1" id="gender"   placeholder="Enter Gender" class="form-control" required value="<?php echo $res['gender']; ?>"/> 
													
													</div>
                                            <label class="control-label col-md-2">Doctor Name
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dname"  id="dname" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $res['dname']; ?>"/> </div>
                                            
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Mobile No</label>
                                                <div class="col-md-4">
                                                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile No" class="form-control" value="<?php echo $res['mobile']; ?>"/> </div>
                                                 <label class="control-label col-md-2">Patient Type</label>
                                                <div class="col-md-4">
                                                <input type="text" name="ptype" data-required="1" id="ptype" placeholder="Enter Patient type" class="form-control" value="<?php echo $res['ptype']; ?>"/> </div>
                                          	</div>
											
											
											
											<?php 
													$qt="select * from bill1_proc where bno='$bno1'";
													$q=$crud->getdata($qt);
													foreach($q as $key=>$r){?>
														<?php   $test=$r['testname']; 
													
											 $sql="SELECT  * FROM procedure1 WHERE name = '$test'";
												//$result = mysql_query($sql);
												$rsd=$crud->getData($sql);
												foreach($rsd  as $key=>$r1){
												//$cname = $rs['registerno'];
													echo "<b style='color:red;'>".$test."  Report</b>";
											?>
											<div class="form-group row">
                                               
                                                <div class="col-md-12">
												<input type="hidden" name="tname[]" value="<?php echo $test; ?>"/>
                                                <textarea name="result[]" id="result"  class="form-control ckeditor" ><?php echo $r1['report']; ?></textarea>
												</div>
                                                 
                                          	</div>
												<?php } } ?>
											
											
											
											
											
											
											
											
											
											
											
											<?php }?>
											
                                        											
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="labbillentrylist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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