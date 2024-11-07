<?php
include_once('../db/Crud.php');
include_once('../db/connection.php');
$crud = new Crud();
$fdate=$_GET['s_date'];
$tdate=$_GET['e_date'];
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
<h1 align="center">Discharge Patients Report</h1>
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
                            <td align="right" colspan="6" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $tdate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                            <td align="center"><b>Pat No.</b></td>
							<td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Age / Geder</b></td>
                             <td align="center"><b>Mobile No</b></td>
							  <td align="center"><b>Dr Name</b></td>
							  <td align="center"><b>Address</b></td>
							 <td align="center"><b>Admit Date</b></td>
							 <td align="center"><b>Discharge Date</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						// $qry1="select distinct a.mrno, a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,a.ptype,b.conce_type from bill1 a,bill b  where  a.BillNO=b.BillNO and a.BillDate between '$sdate1' and '$edate1' order by a.mrno asc";
						//$qry1="select a.mrno, a.BillNO,a.BillDate,a.PatientName,a.ptype,a.Amount,a.TestName,b.ltype from bill a,testdetails b where a.TestName=b.TestName and a.BillDate between '$fdate1' and '$tdate1'";
						$qry1="select * from ip_pat_admit where Discharge_date between '$fdate' and '$tdate'";
						$result = $crud->getData($qry1);
						$i=1;
						$namt=0;
						$pamt=0;
						$bamt=0;
							foreach($result as $key=>$res){
								
							 $bdate = date('d-m-Y',strtotime($res['bdate']));
							 
							 $pno = $res['PAT_NO'];
							 $pname = $res['pname'];
							 $mrno = $res['PAT_REGNO'];
							 $kk=mysqli_query($link,"select * from patientregister where registerno='$mrno'") or die(mysqli_error($link));
							 $kk1=mysqli_fetch_array($kk);
							 $pname=$kk1['patientname'];
							 $age=$kk1['age'];
							 $address=$kk1['address'];
							 $gender=$kk1['gender'];
							  //$TestName = $res['TestName'];
							 $mobile = $kk1['phoneno'];
							 $adate = $res['ADMIT_DATE'];
							 $ddate = $res['Discharge_date'];
							  $doc_code = $res['doc_code'];
							  	 $kk10=mysqli_query($link,"select * from doct_infor where id='$doc_code'") or die(mysqli_error($link));
							 $kk11=mysqli_fetch_array($kk10);
							 $drname=$kk11['dname1'];
							  $namt=$namt+$namount;
							   $pamt=$pamt+$pamount;
							   $bamt=$bamt+$bamount;
							
							 //$bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $mrno ?></td>
                            <td align="center"><?php echo $pno ?></td>
                            <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $age."/".$gender ?></td>
							<td align="center"><?php echo $mobile ?></td>
                            <td align="center"><?php echo $drname ?></td>
                               <td align="center"><?php echo $address?></td>
							<td align="center"><?php echo date('d-m-Y',strtotime($adate)) ?></td>
							<td align="center"><?php echo date('d-m-Y',strtotime($ddate)) ?></td>
							                        
						</tr>
                       <?php } ?>
					  
							
						
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
