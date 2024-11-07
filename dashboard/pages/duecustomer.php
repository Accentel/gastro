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
                                <div class="page-title">Due List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Due List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Due List</li>
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
					                                            <!--<div class="btn-group">
					                                                <a href="addsalesentry1.php" target="new" id="addRow" class="btn btn-info">
					                                                    Add New <i class="fa fa-plus"></i>
					                                                </a>
					                                            </div>-->
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
					                                            	 <th class="TH1">PATIENT/CUSTOMER NAME </th>
				 <th class="TH1">CUSTOMER TYPE </th>
                  <th class="TH1">AGE</th>
                  <th class="TH1">GENDER</th>
                  <th class="TH1">SALE DATE</th>
				     <th class="TH1">DUE AMOUNT </th>
                     <th class="TH1">PAY DUE</th>
                    <!--  <th class="TH1">PRINT </th>-->
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
															
															
															
															
															  <?php
					include("../db/connection.php");
					 if(isset($_REQUEST['submit'])){
					$adate = $_REQUEST['searchname'];
					if($adate != ""){
					$ad = date('Y-m-d',strtotime($adate));
					$sqls=mysql_query("SELECT id,cust_name,age,sex,(total_amount-paid_amount),sal_date,if(customer_type='c','Customer','Patient') from due_patients as b ,phr_salent_mast as p where b.lr_no=p.lr_no and total_amount <> paid_amount and sal_date='$ad'");
					}
					if($sqls){
					$tot=mysql_num_rows($sqls);
					while($row=mysql_fetch_array($sqls)){
						$id1=$row[0];
						
						$cust_name=$row[1];
						$age=$row[2];
						$gender=$row[3];
						$saledate=date('d-m-Y', strtotime($row[5]));
						$ctype=$row[6];
						$dueamount=$row[4];
						
					$rs1=mysql_query("Select patientname from patientregister where registerno='$cust_name' ");
					while($rw1 = mysql_fetch_array($rs1)){ $cust_name =$rw1[0];}
					$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				//if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
					?>
                <tr height="25px"><td><?php echo $cust_name ?></td><td><?php echo $ctype?></td><td><?php echo $age?></td><td><?php echo $gender?></td><td><?php echo $saledate?></td><td><?php echo $dueamount?></td><td><a href="due_patient_edit.php?pat_no=<?php echo $id1?>"><img src="images/edit.gif" /></a></td><td><a href="duecustomerbill1.php?id1=<?php echo $id1?>"><img src="images/print.png" /></a></td></tr>
				<?php //}
				}
				}}
				else{
					//$a="SELECT * FROM `phr_salent_mast` WHERE bal<=-1";
					
					$date=date('Y-m-d');
															$date1=date('Y-m-d', strtotime("-60 days"));
															if($ses=='admin')
					
				$sqls=mysqli_query($link,"SELECT * FROM `phr_salent_mast` WHERE bal<=-1");
				else 
				$sqls=mysqli_query($link,"SELECT * FROM `phr_salent_mast` WHERE bal<=-1 and sal_date between '$date1' and '$date'");

					if($sqls){
					$tot=mysqli_num_rows($sqls);
					while($row=mysqli_fetch_array($sqls)){
						$id1=$row[0];
						
						$cust_name=$row[2];
						$age=$row[12];
						$gender=$row[13];
						$saledate=date('d-m-Y', strtotime($row[5]));
						$ctype=$row[10];
						$dueamount=abs($row[21]);
						
					$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ");
					while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
					$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				//if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
				?>
				<tr height="25px"><td><?php echo $cust_name ?></td><td><?php echo $ctype?></td><td><?php echo $age?></td><td><?php echo $gender?></td><td><?php echo $saledate?></td>
				<td><?php echo $dueamount?></td><td><a href="due_patient_edit.php?pat_no=<?php echo $id1?>"><img src="../img/edit.gif" /></a></td>
				<!--<td><a href="duecustomerbill1.php?id1=<?php echo $id1?>"><img src="images/print.png" /></a></td>--></tr>
				<?php }
				}} ?>
															
															
															
                                                           
																
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
	 