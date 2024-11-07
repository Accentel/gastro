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
                                <div class="page-title">Sales Return List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Sales Return List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Sales List</li>
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
					                                                <a href="addsalesereturn.php"  id="addRow" class="btn btn-info">
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
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                                <th> Invoice No </th>
					                                                <th> Customer Name</th>
					                                                <th> Sale Date  </th>
					                                           
					                                                <th> Total Amount </th>
                                                                    
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
															$date=date('Y-m-d');
															$date1=date('Y-m-d', strtotime("-60 days"));
															if($ses=='admin')
															$sq=mysqli_query($link,"select distinct a.lr_no,a.cust_name,a.total,a.sal_date from phr_salreturn_mast as a,
															phr_salreturn_dtl as b  where a.lr_no=b.lr_no order by a.sal_date desc");
															else 
																$sq=mysqli_query($link,"select distinct a.lr_no,a.cust_name,a.total,a.sal_date from phr_salreturn_mast as a,
															phr_salreturn_dtl as b  where a.lr_no=b.lr_no and a.sal_date between '$date1' and '$date'  order by a.sal_date desc");
														
															
															$i=1;
															$cnt=mysqli_num_rows($sq);
															while($r=mysqli_fetch_array($sq)){
																$cust_name=$r[1];
																$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ");
				while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
																?>
															
                                                            
																<tr class="odd gradeX">
                                                             
																	<td class="patient-img">
																			<?php echo $i?>
																	</td>
                                                                    
                                                                    
                                      
                                                                    
                                                                    <td><?php echo $r[0] ?></td>
                                                                    
																	<td><?php echo $cust_name ?></td>
																	<td class="left">
                                                                   
                          <?php echo  $sdate = date('d-m-Y',strtotime($r[3]));

						  //echo date('d-m-Y',strtotime($sdate)) ?>
                                                                </td>
																	<td class="left">
																	<?php echo $r[2] ?>
																	</td>
																
																	
																	
															
																	<td>
																	<!--	<a href="view_purchase_invoice.php?id=<?php echo $r['lr_no']?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a>-->
                                                                        <a href="medbill_sr.php?lr_id=<?php echo $r['lr_no']?>" target="new"><img src="../img/print.png"></a>
                                                                        <!--<a onclick="return confirm('Are you sure you want to delete this item?');" href="../modal/delete_doct.php?id=<?php echo $r['id']?>">
																	
																		<button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
																		</button></a>-->
																	</td>
																</tr><?php $i++;}?>
																
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
	 