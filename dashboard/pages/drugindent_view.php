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
                                <div class="page-title">Drug Indent List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Drug Indent List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Drug Indent List</li>
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
					                                                <a href="add_drugindent.php" id="addRow" class="btn btn-info">
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
					                                            	<TH>#.</TH><TH>TYPE</TH><TH>STAFF NAME</TH><TH>FROM DATE </TH><TH>PHA EMP</TH>
					                                        
					                                               
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
															
															$sq=mysqli_query($link,"SELECT * from drugindent    order by id desc");
															$i=1;
															$cnt=mysqli_num_rows($sq);
															while($res=mysqli_fetch_array($sq)){
																$aid = $res['id'];
			   $mrno=$res['mrno'];
			  $pname=$res['pname'];
			   $fdate=$res['fdate'];
			    $tdate=$res['tdate'];
													 $x=mysqli_query($link,"select * from empdepartment where empid='$mrno'") or die(mysql_error());
			
			$k=mysql_fetch_array($x);
			$dept_name=$k['dept_name'];			?>
															
                                                            
															
															
															 <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <td><?php echo $dept_name;?></td>
             <td><?php echo $pname;?></td>
             <td><?php echo $fdate; ?></td>
             <td><?php echo $tdate; ?></td>
             
            
            
             <td style="text-align:center;">
             <a href="edit_drugindent.php?id=<?php echo $aid?>"><img src="../img/edit.gif" /></a></td>
             <td style="text-align:center;"><a onclick="return confirm('Are you sure you want to delete this item?');" href="drugindent_delete.php?id=<?php echo $aid; ?>"><img src="../img/delete.gif"></a></td>
			 <td style="text-align:center;"><a href="drugindent_print.php?id=<?php echo $aid; ?>"><img src="../img/print.png"></a></td></tr>
          
															
																
																	
															
																
														<?php $i++;}?>
																
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
	 