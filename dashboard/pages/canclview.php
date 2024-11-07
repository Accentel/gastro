<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('../db/Crud.php');
include_once('../db/connection.php');
$crud = new Crud();
$fdate=$_GET['s_date'];
$tdate=$_GET['e_date'];
$ctype =$_GET['ctype'];
//$fdate21=str_replace('/', '-', ($fdate));
//$fdate1=date('Y-m-d',strtotime($fdate21));
//$tdate21=str_replace('/', '-', ($tdate));
//$tdate1=date('Y-m-d',strtotime($tdate21));


?>
<script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
<div><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </div>
<h1 align="center">Cancellation Patients Report</h1>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $fdate?> </td>
                            <<td align="right"  ></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $tdate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>name</b></td>
                            <td align="center"><b>Mr No</b></td>
							<td align="center"><b>Reg No/Bill No</b></td>
                            <td align="center"><b>Date</b></td>
						</tr>
                        <?php 
                                $d=date('Y-m-d');
                                $date=date('Y-m-d');
                                $date1=date('Y-m-d', strtotime("-60 days"));
                        
                                // if($ctype == 'op')
                                //   echo  $sq = mysqli_query($link,"select * from patientregister  where  pcancel='Canceled' and date between '$fdate' and '$tdate'");
                                //         else if($ctype == 'lab')
                                //   echo  $sq = mysqli_query($link,"select * from bill where bill_cancel='Cancel' and date between '$fdate1' and '$tdate'");
                                //         else if($ctype == 'procedure')
                                //   echo  $sq = mysqli_query($link,"select * from bill_proc where bill_cancel='Cancel'and date between '$fdate1' and '$tdate'");
 	
                                if($ctype == 'op')
                                    $sq=mysqli_query($link,"select * from patientregister where pcancel='Canceled'  and date between '$fdate' and '$tdate'  ");
                                    else if($ctype == 'lab')
                                    $sq=mysqli_query($link,"select * from bill where bill_cancel='Cancel'  and cdate between '$fdate' and '$tdate'  ");
                                    else if($ctype == 'procedure')
                                    $sq=mysqli_query($link,"select * from bill_proc where bill_cancel='Cancel' and cdate between '$fdate' and '$tdate' ");



                                $i=0;
                                $cnt=mysqli_num_rows($sq);
                                while($r=mysqli_fetch_array($sq)){
                                    $i++;

                                if($ctype == 'op'){
                                    ?>
                                
															
                        <tr>
                            <td align="center"><?php echo $i?></td>
                             <td align="center"> <?php   
												echo   $h=$r['patientname'];
												    $o = $r['reg_id'];
													$t = $r['tokenno']; ?> 
                              </td>
                            <td align="center"><?php echo $r['registerno'];?></td>
                            <td align="center"><?php echo $r['tokenno'];?></td>
                            <td align="center"><?php echo $r['date']?></td>
							
							                        
						</tr>
                       <?php }
                       
                       else if($ctype =='lab'){
                        ?>
                        <tr>
                            <td align="center"><?php echo $i?></td>
                             <td align="center"> <?php   
												echo  $h=$r['pname'];
												?>
												 
                              </td>
                            <td align="center"><?php echo $r['mrno'];?></td>
                            <td align="center"><?php echo $r['billno'];?></td>
                            <td align="center"><?php echo $r['cdate']?></td>
							
							                        
						</tr>
                        <?php

                       }
                       

                       else if($ctype =='procedure'){
                        ?>
                        <tr>
                            <td align="center"><?php echo $i?></td>
                             <td align="center"> <?php   
												echo  $h=$r['pname'];
												   ?>
                              </td>
                            <td align="center"><?php echo $r['mrno'];?></td>
                            <td align="center"><?php echo $r['billno'];?></td></td>
                            <td align="center"><?php echo $r['cdate']?></td>
							
							                        
						</tr>
                        <?php
                       }
                       
                       
                    } 
                       
                       ?>
					  
							
						
                    </table>
                </td>
            </tr>
			
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onClick="window.close();"/></td>
</tr>
        </table>
