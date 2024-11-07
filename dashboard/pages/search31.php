<?php
//include("config.php");
?>

<?php
//ob_start();
include_once("../db/Crud.php");
$crud = new Crud();
 $q=$_GET["q"];?>

 <table width="100%">
 <tr>
 <th>S No</th>
 <th>Bill No</th>
 <th>Bill Date</th>
 <th>Test Names</th>

 </tr>
 <?php
$sql1 = "select distinct bno,cdate from bill1 where mrno='$q'";
 $rsd1=$crud->getData($sql1);
 $i=1;
	foreach($rsd1  as $key=>$row1){
							
							
							$bno = $row1['bno'];
							$bdate = $row1['cdate'];
						
							
							
						?>
						<tr >
                            <td valign="top" align="left"><?php echo $i?></td>
                            <td valign="top" align="center"><?php echo $bno ?></td>
							<td valign="top" align="center"><?php echo $bdate  ?></td>
							
							<td valign="top" align="center" >
							<table width="100%">
								<?php
									$sql2 = "select distinct TestName from bill1 where bno='$bno'";
									$r=$crud->getData($sql2);
									$sum = 0;
									foreach($r  as $key=>$row2){
								?>
								<tr>
								<td align="top" style="padding-left:20px;"><?php echo $row2['TestName'] ?></td>
								
								</tr>
								<?php
									} 
								 
								 ?>
								 </table>
							
							</td>
                           
                            </tr>
							<?php $i++; } ?>
 </table>

