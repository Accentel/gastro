<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/lablist.php');
include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class="pull-left">
                                <div class="page-title">Lab Bill List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                                <li class="active">Lab Bill</li>
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
                                <ul class="nav customtab nav-tabs" role="tablist">
	                                <li class="nav-item"><a href="#tab1" class="nav-link active"  data-toggle="tab" >List View</a></li>
	                                
	                            </ul>
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
					                                                <a href="labbill.php" id="addRow" class="btn btn-info">
					                                                    Add New <i class="fa fa-plus"></i>
					                                                </a>
					                                            </div>
					                                        </div>
					                                                   <div class="col-md-6 col-sm-6 col-xs-6" class="pull-right">
					                                           
					                                                <form method="post" action="">
					                                                    <div class="form-group row">
					                                                    <div class="col-md-4 col-sm-4 pull-right"> 
					                                                    
					                                                    				 <input id=\"pname\" list=\"city1\" placeholder="MRNO " class="form-control"  name="mr_num"  >
<datalist id=\"city1\" >

<?php 
$sql="select distinct mrno,pname from bill ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[pname]/$row[mrno]\"/>"; // Format for adding options 
}


echo "</datalist>";?>
					                                                    
					                                                    
					                                                    </div>
					                                                    <div class="col-md-1 col-sm-1 pull-right"><input type="submit" name="submit" class="form-cntrol" value="Go"/></div>
					                                    </div>
					                                    </form>
					                                           
					                                        </div>
					                                    </div>
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>ID</th>
																	<th> Mr No </th>
																	<th> Bill No </th>
					                                                <th> Name </th>
					                                                <th> Total </th>
					                                                <th> Paid </th>
					                                                <th> Balance </th>
					                                             
<th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
															<?php $i=1;
															
if(isset($_POST['submit'])){
															    $date1=$_POST['mr_num'];
															    $date = substr($date1, strrpos($date1, '/' )+1)."\n";
															    $date=trim($date);
															    
															    $query = "SELECT * FROM bill where mrno='$date' ";
															    
															}else{
															    $date=date('Y-m-d');
															    
															    $query = "SELECT * FROM bill where bdate='$date' and status=''";
															}
                                                            
                                                           $result = $crud->getData($query);
															foreach ($result as $key => $res) { ?>
																<tr class="odd gradeX">
																	<td ><?php echo $i; ?></td>
																	<td><?php echo $res['mrno']; ?></td>
																	<td class="left"><?php echo $res['billno']; ?></td>
																	<td class="left"><?php echo $res['pname']; ?></td>
																	<td class="left"><?php echo $res['namount']; ?></td>
																	
																	<td><?php echo $res['pamount'] ?></td>
																	<td class="left"><?php echo $res['bamount']; ?></td>
																	<td>
																		<a href="edit_labbill.php?id=<?php echo $crud->my_simple_crypt($res['billno'],'e'); ?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a href="due_labbill.php?id=<?php echo $crud->my_simple_crypt($res['id'],'e'); ?>"  >
																			<img src="../img/income.png" />
																		</a>
																		<a  onclick="window.open('print_labbill2.php?id=<?php echo ($res['id']); ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" class="btn btn-primary btn-xs">
																			<i class="fa fa-print"></i></a>
																			<?php if($ses=='admin'){?>
																	<a  onclick="return confirm('Are you sure you want to Print this item?');" href="delete_lab.php?id=<?php echo $res['id'];?>"><button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
															</button></a><?php }?>
																		
															</td>
																</tr>
																
															<?php $i++; }?>
																							
															</tbody>
					                                    </table>
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