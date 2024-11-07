<?php

session_start();

 $ses= $_SESSION['user'] ;

 if($_SESSION['user'])
{
 ?>

<?php include("header.php");?>

<script>

function card_pop(b,a,str){

	if(a==1){

	window.open('../modal/reg_card_printc.php?opno='+b+'&a='+a+'','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');

	}

	if(a==2){

	window.open('../modal/reg_card_printc.php?opno='+b+'&a='+a+'&age='+str+'','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');

	

	}

	}



</script>

			 <!-- end sidebar menu -->

			<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">IP RETURN LIST</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li><a class="parent-item" href="#">IP RETURN LIST</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">IP RETURN LIST</li>

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

					                                        <div class="col-md-3 col-sm-3 col-xs-3">

					                                            <div class="btn-group">

					                                                <a href="ip_return.php" id="addRow" class="btn btn-info">

					                                                    Add New <i class="fa fa-plus"></i>

					                                                </a>

					                                            </div>

					                                        </div>

															

															<div class="col-md-6 col-sm-6 col-xs-6">

					                                            <div class="btn-group">

					                                               

																	<form name="frm" method="post" action="">

																<table align="center"><tr><td width="">Search </td><td>

																

																 <input id=\"pname\" list=\"city1\" placeholder="MRNO" class="form-control"  name="mr_num"  >

<datalist id=\"city1\" >



<?php 

$sql="select distinct mrno from ipreturn ";  // Query to collect records

$r=mysqli_query($link,$sql) or die(mysql_error());

while ($row=mysqli_fetch_array($r)) {

echo  "<option value=\"$row[mrno]\"/>"; // Format for adding options 

}

////  End of data collection from table /// 



echo "</datalist>";?></td>





<td>

																

																	<input type="submit" name="submit" value="Search" class="btn btn-info"></td></tr></table>

																	</form>

					                                            </div>

																

					                                        </div>

					                                        <div class="col-md-3 col-sm-3 col-xs-3">

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

																	 <th> Name  </th>

					                                                <th> Mr No </th>

																	<th>Amount </th>

					                                                <th> Action </th>

					                                            </tr>

					                                        </thead>

					                                        <tbody>

                                                            

                                                            <?php 

																								

															if(isset($_POST['submit'])){

																$mr_num=$_POST['mr_num'];

																
$k="select * from ipreturn  where mrno='$mr_num'  order by id desc";
															}else{
																$k="select * from ipreturn ";
															}

															$sq=mysqli_query($link,$k) or die(mysqli_error($link));
									$i=1;

															$cnt=mysqli_num_rows($sq);

															while($r=mysqli_fetch_array($sq)){
$id=$r['id'];
																?>
																<tr class="odd gradeX">
																	<td class="patient-img">

																			<?php echo $i?>

																	</td>

																	<td><?php  echo  $r['pname'];  ?></td>

																	<td class="left">	<?php echo $r['mrno'];?>

                                                             </td>

																	<td class="left"><?php echo $r['ramount'];?></td>

																	<td>

																		

																		

																		<a onclick="window.open('iprprint.php?id=<?php echo $id?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">

																	

																		

																	<img src="../img/print.png">

																		<!--<button class="btn btn-danger btn-xs">	

																			<i class="fa fa-trash-o "></i>

																		</button>--></a>

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

	 