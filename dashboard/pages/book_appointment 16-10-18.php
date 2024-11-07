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
                                <div class="page-title">Appointment List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Appointments</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Appointment List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                                                            <!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
                               
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
					                        <div class="col-md-12">
					                            <div class="card card-topline-red">
					                                <div class="card-head">
					                                    <header></header>
					                                    <div class="tools">
					                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
						                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
						                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
					                                    </div>
					                                </div>
					                                <div class="card-body ">
					                                    <div class="row">
					                                        <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group">
					                                                <a href="add_book_appointment.php" id="addRow" class="btn btn-info">
					                                                    Add New <i class="fa fa-plus"></i>
					                                                </a>
					                                            </div>
																
																
																
					                                        </div>
															
															
															
															
															 <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group pull-right">
					                                      <form name="frm" method="post" action='book_appointment.php' >         
					                                         <table><tr>  <td align="right"><b>Search By UMR No. :</b>

<input id=\"prd\" list=\"city1\" name="name1"  class="text"required >
<datalist id=\"city1\" >

<?php  
$sql="select distinct registerno from patientregister order by reg_id desc";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[registerno]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
 <!--<input type="text" name="reg" id="reg"  />--></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(../img/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr></table>
					                                        </div>
					                                    </div>
															
														</form>	
															
					                                       <!-- <div class="col-md-3 col-sm-3 col-xs-3">
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
					                                    </div>-->
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                                <th> Mr No </th>
					                                                <th> Pat Type </th>
					                                                <th> Name  </th>
																	  <th> Age/Sex  </th>
					                                           
					                                                <th> Mobile </th>
																	<th> Date </th>
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
															
															
															
																									
															
															
															
															
															
															
                                                            <?php 
															
															 if(isset($_POST['submit'])){
			 // $n=$_REQUEST['name'];
			   $r=$_POST['name1'];
			  $nam=$r;
			  
			  
															 }
															 
															 
															 if($nam!=''){
															 $sq=mysqli_query($link,"SELECT * FROM patientregister where registerno='$r'");
															 } else {
																 //echo "h111";
																 $d=date('Y-m-d');
																 $sq=mysqli_query($link,"SELECT * FROM patientregister where date='$d' order by reg_id desc ");
																 
																 
																 	 //echo $as="select * from patientregister "; //where date='$d' order by reg_id desc";
																 //echo $sq=mysqli_query($link,$as);
															 }
															
															

	


	
															

															$i=1;
															
															
															
															$cnt=mysql_num_rows($sq);
															while($r=mysqli_fetch_array($sq)){
																
																?>
															
                                                            
																<tr class="odd gradeX">
                                                             
																	<td class="patient-img">
																			<?php echo $i?>
																	</td>
																	<td><?php echo $r['registerno'];?>
																	</td>
																	<td class="left">
                            <?php   
					 $pay_type = $r['pat_type'];
					 if($pay_type=='OP'){ echo 'Out Patient' ; } else if($pay_type=='IP') { echo 'IN Patient'; }
			 else if($pay_type=='Lab') { echo 'Lab'; }else if($pay_type=='Physiotherapy') { echo 'Physiotherapy';
			 }
				
                             ?>                                      </td>
																	<td class="left"><?php echo $r['patientname'];?></td>
																
																	<td><?php echo  $r['age'];?>/<?php echo $r['gender']; ?></td>
																		<td class="left"><?php echo $r['phoneno'];?></td>
																		<td class="left"><?php echo $b=date("d-m-Y", strtotime($r['date']));?></td>
															
																	<td>
																		<a href="patientregister1.php?reg=<?php echo $r['reg_id'];?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a><a onclick="return confirm('Are you sure you want to Print this item?');" href="../modal/print.php?id=<?php echo $r['reg_id'];?>">
																	<img src="../img/print.png">
																		<!--<button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
																		</button>--></a>
																	</td>
</tr><?php  $i++; }?>
																
															</tbody>
					                                    </table>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>
                                    
            <!-- end page content -->
            <!-- start chat sidebar -->
            
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						
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

header('Location:../../index.php');

}

?>
	 