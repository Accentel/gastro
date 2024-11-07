<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/insert_employee.php');
include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Employee Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Employee Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Employee Information</header>
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
                                                <label class="control-label col-md-2">Upload Photo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="file" name="file" data-required="1" value="" id="file"  class="form-control" /> 
													<input type="hidden" name="user" data-required="1" value="<?php echo $ses; ?>" id="user"  class="form-control" /> 
													</div> 
                                            
											
                                                
                                            
											
											</div>
										
										
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">Employee Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="ecode" data-required="1" value="<?php if(isset($ecode)){ echo $ecode;}  ?>" id="ecode" placeholder="Enter Employee Code" class="form-control" required/> 
													 <strong class="required"><?php if(isset($errorecode)){ echo $errorecode;} ?> </strong></div>
                                            
											<label class="control-label col-md-2">Employee Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="ename" data-required="1" id="ename" placeholder="Enter Employee Name" class="form-control" value="<?php if(isset($ename)){ echo $ename;} ?>" />
													<strong class="required"><?php if(isset($errorename)){ echo $errorename;} ?> </strong>
													</div>
                                            
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Designation
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="designation" data-required="1" value="<?php if(isset($designation)){ echo $designation;} ?>" id="designation" placeholder="Enter Employee designation" class="form-control " required/>
													<strong class="required"><?php if(isset($errordesignation)){ echo $errordesignation;} ?> </strong>
													</div>
                                            <label class="control-label col-md-2">Join Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Join Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="jdate" id="jdate">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	</div>
	                                            
	                                            </div>
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Qualification
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="qualification" data-required="1" id="qualification" value="<?php if(isset($qualification)){ echo $qualification;} ?>" placeholder="Enter Employee Qualification" class="form-control" required/> 
													<strong class="required"><?php if(isset($errorqualification)){ echo $errorqualification;} ?> </strong>
													</div>
                                            <label class="control-label col-md-2">Department
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control " name="department" id="department" required>
                                                        <option value="1">Select Department</option>
                                                        <?php foreach($result as $key=>$res){?>
															<option value="<?php echo $res['id'] ?>"><?php echo $res['deptname']; ?></option>
															
														<?php }	?>
                                                    </select>
	                                            
	                                            </div>
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Birth
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               
 <input class="form-control " size="16" placeholder="Date of Birth" type="date" value="" name="dob" id="dob">
													   <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	</div>
	                                            
	                                            </div>
											<label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="radio" name="gender" value="Male" <?php if(isset($gender)){ echo $gender;} ?>  />&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female"   />&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Others"   />&nbsp;&nbsp;Others 
													
													<strong class="required"><?php if(isset($errorgender)){ echo $errorgender;} ?> </strong>
													</div>
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Mobile No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mobile" data-required="1" id="mobile" maxlength="10" value="<?php if(isset($mobile)){ echo $mobile;} ?>" placeholder="Enter Employee Mobile No" class="form-control" required/> 
													<strong class="required"><?php if(isset($errormobile)){ echo $errormobile;} ?> </strong>
													</div>
                                           
										   <label class="control-label col-md-2">Alternate Mobile No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="amobile" data-required="1" id="amobile" maxlength="10" value="<?php if(isset($amobile)){ echo $amobile;} ?>" placeholder="Enter Employee Mobile No" class="form-control" required/> 
													<strong class="required"><?php if(isset($erroramobile)){ echo $erroramobile;} ?> </strong>
													</div>
										   
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Aadhar No
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="aadhar" data-required="1" id="aadhar" placeholder="Enter Employee Aadhar No" class="form-control" /> </div>
                                            <label class="control-label col-md-2">Account No
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="accountno" data-required="1" id="accountno" placeholder="Enter Employee Account No" class="form-control" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Bank Name
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="bname" data-required="1" id="bname" placeholder="Enter Employee Bank Name" class="form-control" /> </div>
                                            <label class="control-label col-md-2">Branch
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="branch" data-required="1" id="branch" placeholder="Enter Employee Branch" class="form-control" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Email
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"> </div>
                                               </div>

 <label class="control-label col-md-2">Salary
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="salary" data-required="1" id="salary" placeholder="Enter Employee Salary" class="form-control" /> </div>
                                            
											
											   </div>
                                            </div>
											
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Current Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="caddress" id="caddress" placeholder="Current Address" class="form-control-textarea" rows="5" ></textarea>
                                                </div>
												 <label class="control-label col-md-2">Permanent Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="pddress" id="paddress" placeholder="Permanent Address" class="form-control-textarea" rows="5" ></textarea>
                                                </div>
                                            </div>
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="employeeslist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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