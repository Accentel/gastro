<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/connection.php');
include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class="pull-left">
                                <div class="page-title">Lab Bill Entry List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                                <li><a class="parent-item" href="#">Lab</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                                <li class="active">Lab Entry Bill</li>
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
					                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></header>
					                                    <div class="tools">
					                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
						                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
						                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
					                                    </div>
					                                </div>
					                                <div class="card-body ">
					                                    <div class="row">
					                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:400px;">
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
					                                                 <th> Mobile </th>
					                                                <th> Total </th>
					                                                <th> Paid </th>
					                                                <th> Balance </th>
					                                             
					                                                <th> Add </th>
																	  
					                                                
					                                                  <th> Print </th>
																	  
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
															
															
															
															$result=mysqli_query($link,"select * from bill  order by id desc") or die(mysqli_error($link));
															$i=1;	
															while($res=mysqli_fetch_array($result)) { ?>
																<tr class="odd gradeX">
																	<td ><?php echo $i; ?></td>
																	<td><?php echo $res['mrno']; ?></td>
																	<td class="left"><?php echo $bno=$res['billno']; ?></td>
																	<td class="left"><?php echo $res['pname']; ?></td>
																	<td class="left"><?php echo $res['mobile']; ?></td>
																	<td class="left"><?php echo $res['namount']; ?></td>
																	
																	<td><?php echo $res['pamount'] ?></td>
																	<td class="left"><?php echo $res['bamount']; ?></td>
																	<td>
																										
													<a href="entry_labbill.php?id=<?php echo ($res['billno']); ?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-plus"></i>
																		</a>														
																											
																			</td>													
																		<td>
																	<?php
																	$rt=mysqli_query($link,"select * from resultentry3 where bno='$bno'") or die(mysqli_error($link));
																	$rc=mysqli_num_rows($rt);
																	if($rc > 0){
																	?><a href="javascript:void(0);"  data-href="getContent.php?id=<?php echo $bno; ?>" class="openPopup"><i class="fa fa-print"></i></a>
																		 
																		
																	<?php }else{}?>
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
		<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Print Test Names</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>

        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	   <script>
	   $(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>
	   <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>