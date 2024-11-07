<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
					<?php
$d=date('Y-m-d');					
 $a="SELECT * FROM `patientregister` where date='$d'";
					$sq=mysqli_query($link,$a);
					$r=mysqli_fetch_array($sq);
					$cnt=mysqli_num_rows($sq);?>
					
                    <!-- start widget -->
					<div class="row">
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-purple">
	                            <a href='book_appointment.php'><h3 class="text-white box-title">New Appointments <span class="pull-right">(ToDay)
								<i class="fa fa-caret-up"></i> <?php echo $cnt?></span></h3>
	                            <div id="sparkline7"><canvas style="display: inline-block; width: 267px; height: 70px; vertical-align: top;"></canvas> <br></div>
								</a>
	                        </div>
	                    </div>
						<?php
					
  $a="SELECT * FROM `ip_pat_admit`
 where DIS_STATUS='ADMITTED' and ADMIT_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$ip=mysqli_num_rows($sq);
						
					?>
						<?php
					
  $a="SELECT * FROM `phr_salent_mast` where  SAL_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$phar=mysqli_num_rows($sq);
				
				$l="select * from bill where bdate='$d'";
				$lb=mysqli_query($link,$l);
				$lbc=mysqli_num_rows($lb);
				$d1="select * from daycarebill where bdate='$d'";
				$db=mysqli_query($link,$d1);
				$dbc=mysqli_num_rows($db);
				$p="select * from physiotherapybill where bdate='$d'";
				$pb=mysqli_query($link,$p);
				$pbc=mysqli_num_rows($pb);		
					?>
					
					
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-danger">
	                            <h3 class="text-white box-title">InPatients<span class="pull-right">(ToDay)<i class="fa fa-caret-up"></i> <?php echo $ip?></span></h3>
	                            <div id="sparkline12"><canvas style="display: inline-block; width: 367px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h4 class="text-white box-title">Lab Bill <span class="pull-right"><i class="fa fa-caret-up"></i><?php echo $lbc?></span></h4>
								<h4 class="text-white box-title">Daycare Bill <span class="pull-right"><i class="fa fa-caret-up"></i><?php echo $dbc; ?></span></h4>
								<h4 class="text-white box-title">Physiotherapy Bill<span class="pull-right"><i class="fa fa-caret-up"></i><?php echo $pbc; ?></span></h4>
	                            
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-success">
	                          <a href='salesentry_list.php'>  <h3 class="text-white box-title">Pharmacy Today <span class="pull-right"><i class="fa fa-caret-up"></i> <?php echo $phar?></span></h3>
	                            <div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
								</a>
	                        </div>
	                    </div>
                	</div>
					
					
					
					<!-- end widget -->
					<!-- chart start -->
                    	<!--<div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="card card-box">
	                              <div class="card-head">
	                                  <header>HOSPITAL SURVEY</header>
	                                  <div class="tools">
	                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
	                                 </div>
	                              </div>
	                              <div class="card-body no-padding height-9">
									<div class="row">
									    <canvas id="bar-chart"></canvas>
									</div>
								</div>
	                          </div>
				            </div>
				            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="card card-box">
		                              <div class="card-head">
		                                  <header>HOSPITAL SURVEY</header>
		                                  <div class="tools">
		                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
											<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
		                                 </div>
		                              </div>
		                              <div class="card-body no-padding height-9">
										<div class="row">
										    <canvas id="myChart"></canvas>
										</div>
									</div>
		                          </div>
				            </div>
                    </div>-->
                     <!-- Chart end -->
                     <!-- start new patient list -->
					 
					 		
                     <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Beds Status</header>
                                    <i class="material-icons" style="color:green;width:32px;height:32px;">hotel</i> Available Beds  &nbsp; &nbsp;&nbsp;<i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i>Reserved Beds
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body" id="bar-parent">
												
								
                                    <?php 
include('../db/locations.php');

									foreach($result as $key=>$p){ $lid=$p['id'];?>
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
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>ToDay Booking List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row">
									
                                       
	

									   <ul class="to-do-list ui-sortable" id="sortable-todo">
									   <marquee behavior="scroll" direction="up" scrolldelay="150">  <?php
					
 $a="SELECT * FROM `patientregister` where date='$d' ";
//$a="SELECT * FROM `patientregister` order by reg_id desc limit 0,10 ";
					$sq=mysqli_query($link,$a);
					$i=1;
					while($r=mysqli_fetch_array($sq)){
						
					?>
									  
                                            <li class="clearfix">
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="None" id="todo-check1">
                                                    <label for="todo-check1"></label>
                                                </div>
                                               <a href='patientregister1.php?reg=<?php echo $r['reg_id'];?>'> <p class="todo-title"><?php echo $r['registerno'];?> - <?php echo $r['patientname'];?></a>
                                                </p></a>
                                                <div class="todo-actionlist pull-right clearfix">
                                                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                            </li>
					<?php }?></marquee>
                                        </ul>
                                    </div>
                                   <!-- <div class="box-footer">
					                <form action="#" method="post">
					                  <div class="input-group">
					                    <input type="text" name="message" placeholder="Enter your ToDo List" class="form-control">
					                    <span class="input-group-btn">
					                    <button type="submit" class="btn btn-warning btn-flat">Add</button>
					                    </span> </div>
					                </form>
					               </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end new patient list -->
                     <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
		                                  <header>In Patient List</header>
		                                  <div class="tools">
		                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
											<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
		                                 </div>
		                              </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row table-padding">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="btn-group">
                                               <a href="add_in_patient_admit.php" id="addRow" class="btn btn-info">
                                                    Add New <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="btn-group pull-right">
                                                <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </a> 
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="example4">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th>Patient Name</th>
                                                <th>Assigned Doctor</th>
												<th>Mobile</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                          

<?php
					
  $a="SELECT b.patientname,a.doc_code,a.ADMIT_DATE,a.ADMIT_TIME,b.phoneno FROM `ip_pat_admit` a,patientregister b
 where a.DIS_STATUS='ADMITTED' and b.registerno=a.PAT_REGNO order by a.PAT_ID desc limit 0,6 ";
					$sq=mysqli_query($link,$a);
					$i=1;
					while($r=mysqli_fetch_array($sq)){
						
					?>
						
									  <tr class="odd gradeX">
                                                <td>
                                                    <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> <?php echo $r['patientname'];?> </td>
												<td> <?php echo $r['phoneno'];?> </td>
                                                <td>
                                               				<?php
	$did=$r['doc_code'];
	
	$sql = mysqli_query($link,"select * from doct_infor where id='$did'");
	if($sql)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$did = $row['id'];
			echo $dname = $row['dname1'];
		}
	}
?>
                                                </td>
                                                <td class="center"> <?php echo $r['ADMIT_DATE'];?> </td>
                                                <td class="center"> <?php echo $r['ADMIT_TIME'];?> </td>
                                                
		</tr><?php }?>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-4 col-sm-12">
                             <div class="card card-box">
                                 <div class="card-head">
                                     <header>Doctors List</header>
                                 </div>
                                 <div class="card-body ">
                                 <div class="row">
								 <?php $sqq=mysqli_query($link,"select * from doct_infor order by id desc limit 0,8");
								 while($r1=mysqli_fetch_array($sqq)){
									 $gender=$r1['gender'];
									 ?>
								 
                                        <ul class="docListWindow">
                                            <li>
                                                <div class="prog-avatar">
												<?php if($gender=='Female'){?>
                                                    <img src="../img/doc/doc1.jpg" alt="" width="40" height="40">
												<?php } else {?>
												     <img src="../img/doc/doc2.jpg" alt="" width="40" height="40">
												
												<?php }?>
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Dr.<?php echo $r1['dname1'];?></a> -(<?php echo $r1['desc1'];?>)
                                                    </div>
                                                        <div>
                                                           
                                                        </div>
                                                </div>
								 </li>
                                            
                                        </ul><?php }?>
                                        <div class="text-center full-width">
                                            <a href="doctor.php">View all</a>
                                        </div>
                                    </div>
                                 </div>
                             </div>
						</div>
					</div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon"  data-toggle="tab"> <i class="material-icons">chat</i>Chat
                                    <span class="badge badge-danger">4</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_3" class="nav-link tab-icon"  data-toggle="tab"> <i class="material-icons">settings</i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Start Doctor Chat --> 
 						<div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel" id="quick_sidebar_tab_1">
                        	<div class="chat-sidebar-list">
	                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd" data-wrapper-class="chat-sidebar-list">
	                                <div class="chat-header"><h5 class="list-heading">Online</h5></div>
	                                <ul class="media-list list-items">
	                                    <li class="media"><img class="media-object" src="../img/doc/doc3.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">John Deo</h5>
	                                            <div class="media-heading-sub">Spine Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">5</span>
	                                        </div> <img class="media-object" src="../img/doc/doc1.jpg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Rajesh</h5>
	                                            <div class="media-heading-sub">Director</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="../img/doc/doc5.jpg" width="35" height="35" alt="...">
	                                        <i class="away dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jacob Ryan</h5>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-danger">8</span>
	                                        </div> <img class="media-object" src="../img/doc/doc4.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Kehn Anderson</h5>
	                                            <div class="media-heading-sub">CEO</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="../img/doc/doc2.jpg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Sarah Smith</h5>
	                                            <div class="media-heading-sub">Anaesthetics</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="../img/doc/doc7.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Vlad Cardella</h5>
	                                            <div class="media-heading-sub">Cardiologist</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                                <div class="chat-header"><h5 class="list-heading">Offline</h5></div>
	                                <ul class="media-list list-items">
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-warning">4</span>
	                                        </div> <img class="media-object" src="../img/doc/doc6.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jennifer Maklen</h5>
	                                            <div class="media-heading-sub">Nurse</div>
	                                            <div class="media-heading-small">Last seen 01:20 AM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="../img/doc/doc8.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Lina Smith</h5>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                            <div class="media-heading-small">Last seen 11:14 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">9</span>
	                                        </div> <img class="media-object" src="../img/doc/doc9.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jeff Adam</h5>
	                                            <div class="media-heading-sub">Compounder</div>
	                                            <div class="media-heading-small">Last seen 3:31 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="../img/doc/doc10.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Anjelina Cardella</h5>
	                                            <div class="media-heading-sub">Physiotherapist</div>
	                                            <div class="media-heading-small">Last seen 7:45 PM</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                            </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
													the delay. i sent mail to you. let me know if it is ok or not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn deepPink-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						<div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
	                            <div class="chatpane inner-content ">
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Position</div>
					                        <div class="setting-set">
					                           <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
	                                                <option value="left" selected="selected">Left</option>
	                                                <option value="right">Right</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Header</div>
					                        <div class="setting-set">
					                           <select class="page-header-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed" selected="selected">Fixed</option>
	                                                <option value="default">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Menu </div>
					                        <div class="setting-set">
					                           <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
	                                                <option value="accordion" selected="selected">Accordion</option>
	                                                <option value="hover">Hover</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Footer</div>
					                        <div class="setting-set">
					                           <select class="page-footer-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed">Fixed</option>
	                                                <option value="default" selected="selected">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                </div>
									<div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Notifications</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-1">
									                  <input type = "checkbox" id = "switch-1" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Show Online</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-7">
									                  <input type = "checkbox" id = "switch-7" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Status</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-2">
									                  <input type = "checkbox" id = "switch-2" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">2 Steps Verification</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-3">
									                  <input type = "checkbox" id = "switch-3" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                </div>
                                    <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                    <div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Location</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-4">
									                  <input type = "checkbox" id = "switch-4" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Save Histry</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-5">
									                  <input type = "checkbox" id = "switch-5" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Auto Updates</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-6">
									                  <input type = "checkbox" id = "switch-6" 
									                     class = "mdl-switch__input" checked>
									               	</label>
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
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
        <!--<script src="http://radixtouch.in/templates/admin/redstar/source/assets/assets/jquery.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/popper/popper.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.blockui.min.js" ></script>
    
  
	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.slimscroll.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.waypoints.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.counterup.min.js" ></script>

	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/app.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/layout.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/theme-color.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/material/material.min.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/Chart.bundle.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/utils.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data.js" ></script>
    
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data3.js" ></script>
     <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/jquery.sparkline.js" ></script>
      <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/sparkline-data.js" ></script>-->
    
	   	   <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>