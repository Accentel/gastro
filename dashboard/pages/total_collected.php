<?php
include("../db/connection.php");
 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $partic=$_GET['partic'];
 $ftime=$_GET['ftime'];
 $ttime=$_GET['etime'];
 $sess=$_GET['sess'];
 $finalfromdate=$sdate1.' '.$ftime;
 $finaltodate=$edate1.' '.$ttime;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Patients Report</title>
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
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 


 
?>
<table >
<tr><td ><img src="../img/raajtop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Daily Collected Amount  List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="5" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>Bill.No.</b></td>
                           
                          <td align="center"><b>UMR No.</b></td>
                          <td align="center"><b>Pat Name.</b></td>
                           <td align="center"><b>Doct Name.</b></td>
                           <td align="center"><b>Payment Type</b></td>
                           
                            
                            
                              
                               <td align="center" colspan="2"><b>Amount.</b></td>
                                 <td align="center"><b>Payment Mode</b></td>
                            
                            <td align="center"><b>Received By</b></td>
							
                           
                            
							
                            
							
						</tr>
                        <?php
						
                     if($partic!=''){
                         if($sess=='admin')
						 $x1="select * from daily_amount where amnt_type='$partic' and date1 between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') order by id desc";
						 else
						 $x1="select * from daily_amount where amnt_type='$partic' and recv_by='$sess' and date1 between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30')  order by id desc";
						$qry=mysqli_query($link,$x1);
						
					 } else  {
					     if($sess=='admin')
						$qry=mysqli_query($link,"select * from daily_amount where date1 between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') order by id desc");
						else
						$qry=mysqli_query($link,"select * from daily_amount where recv_by='$sess' and date1 between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') order by id desc");
					 }
					 
					
						if($qry){
						$i=0;
						$am2=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['mrnum'];
							 $amount = $res['amount'];
							  $amnt_type=$res['amnt_type'];
							 
						
							 $recv_by=$res['recv_by'];
							$date1 = $res['date1'];
							$pay_tpe=$res['pay_type'];
							$amnt_desc=$res['amnt_desc'];
							$bill_num=$res['bill_num'];
							$date=date('Y-m-d',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $bill_num ?></td>
                             <?php /*?><td align="center"><?php echo $date; ?></td><?php */?>
                             <td align="center"><?php echo $bno; ?></td>
                             <?php 
							  $sd="select * from patientregister where registerno='$bno' and bill_num='$bill_num'";
							 $ss=mysqli_query($link,$sd);
							 $r=mysqli_fetch_array($ss);
							 $pat=$r['patientname'];?>
                          
                           
                           <?php if(($amnt_type=='Advance Collection') ){ 
						    $a="select d.dname1,e.patientname from daily_amount a,ip_pat_admit b,adv_collection c,doct_infor d,patientregister e
			 where   a.amnt_type='Advance Collection'  and a.bill_num='$bill_num' and  c.bill_num='$bill_num'  and c.PAT_NO=b.PAT_NO and d.id=b.doc_code and e.registerno='$bno'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname1'];
							 ?>
                            <td align="center"><?php echo $rk['patientname']; ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                           <?php }else if(($amnt_type=='Patient Register') and  ($amnt_desc=='Patient Register Canceled') ){ 
						    $a="select * from daily_amount  where   amnt_type='Patient Register' and amnt_desc='Patient Register Canceled' and mrnum='$bno'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $kj=mysqli_query($link,"select * from patientregister where registerno='$bno'");
							 $kj1=mysqli_fetch_array($kj);
							 $dname=$kj1['doctorname'];
							 ?>
                            <td align="center"><?php echo $kj1['patientname']; ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                           <?php }else if(($amnt_type=='Patient Register') and  ($amnt_desc=='Patient Register Existing') ){ 
						    $a="select * from daily_amount  where   amnt_type='Patient Register' and amnt_desc='Patient Register Existing' and mrnum='$bno'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $kj=mysqli_query($link,"select * from patientregister where registerno='$bno'");
							 $kj1=mysqli_fetch_array($kj);
							 $dname=$kj1['doctorname'];
							 ?>
                            <td align="center"><?php echo $kj1['patientname']; ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                           <?php }else if(($amnt_type=='IP Return Amount')  ){ 
						    $a="select * from daily_amount  where   amnt_type='IP Return Amount' and amnt_desc='IP Return Amount' and mrnum='$bno'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $kj=mysqli_query($link,"select * from patientregister where registerno='$bno'");
							 $kj1=mysqli_fetch_array($kj);
							 $dname=$kj1['doctorname'];
							 ?>
                            <td align="center"><?php echo $kj1['patientname']; ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                           <?php } else if($amnt_type=='In Patient'){ 
						    $a="select * from daily_amount  where   amnt_type='In Patient' and mrnum='$bno'";
						    $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $mrno=$rk['mrnum'];
							 $ops=mysqli_query($link,"select * from patientregister where registerno='$mrno'");
							 $ops1=mysqli_fetch_array($ops);
							 $dname=$ops1['doctorname'];
							 $pat1=$ops1['patientname'];
							 ?>
                            <td align="center"><?php echo $pat1 ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                         
                           
                           
                           
                           
                           <?php } else if(($amnt_type=='Lab Bill') or ($amnt_type=='Lab Due Bill') ){ 
                               if($bno!='')
						    $a="select dname,pname from bill where mrno='$bno'";
						    else
						     $a="select dname,pname from bill where bdate='$date' and pamount='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           
                           <?php } else if(($amnt_type=='Lab Canceled') ){ 
                               if($bno!='')
						    $a="select dname,pname from bill where mrno='$bno'";
						    else
						     $a="select dname,pname from bill where bdate='$date' and pamount='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           
                           <?php } else if(($amnt_type=='Procedure Lab Bill') or ($amnt_type=='Procedure Due Bill') ){ 
                               if($bno!='')
						    $a="select dname,pname from bill_proc where mrno='$bno'";
						    else
						    $a="select dname,pname from bill_proc where bdate='$date' and pamount='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php }else if(($amnt_type=='Procedure Lab Canceled') ){ 
                               if($bno!='')
						    $a="select dname,pname from bill_proc where mrno='$bno'";
						    else
						    $a="select dname,pname from bill_proc where bdate='$date' and pamount='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php }
                            else if($amnt_type=='Daycare Bill'){ 
                               if($bno!='')
						    $a="select dname,pname from daycarebill where mrno='$bno'";
						    else
						    $a="select dname,pname from daycarebill where bdate='$date' and pamount='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['dname'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php }
                           else if($amnt_type=='Final Bill'){ 
                               if($bno!='')
						    $a="select pname,doctors from final_bill_fin where mrno='$bno'";
						    
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['doctors'];
							 $PatientName=$rk['pname'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php } else if($amnt_type=='Pharmacy'){ 
                               if($bno!='')
						    $a="select cust_name,consultant_name from phr_salent_mast where mrnum='$bno'";
						    else
						    $a="select cust_name,consultant_name from phr_salent_mast where sal_date='$date' and final_paid='$amount'";
                           $ssk=mysqli_query($link,$a);
                           $rk=mysqli_fetch_array($ssk);
						 $pu=mysqli_query($link,"select * from patientregister where registerno='$bno'");
                           $pu1=mysqli_fetch_array($pu);
                           $PatientName=$pu1['patientname'];
							 $dname=$rk['consultant_name'];
							 //$PatientName=$rk['cust_name'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php }
                           else if($amnt_type=='Pharmacy Return'){ 
                               
						    $a="select cust_name,consultant_name from phr_salreturn_mast where sal_date='$date' and total='$amount'";
                           $ssk=mysqli_query($link,$a);
							 $rk=mysqli_fetch_array($ssk);
							 $dname=$rk['consultant_name'];
							 $PatientName=$rk['cust_name'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $dname; ?></td>
                           <?php }
                           else {?>
							   <td align="center"><?php echo $r['patientname']; ?></td>
						 <td align="center"><?php echo $r['doctorname']; ?></td><?php }?>
                           
                             <td><?php echo $amnt_type; ?></td>
                             
                              <td align="center"><?php 
                              
                               if(($amnt_desc=='Advance Collection') or ($amnt_desc=='Final Bill')or ($amnt_desc=='Pharmacy') or ($amnt_desc=='Patient Register Existing') or ($amnt_desc=='In Patient') or ($amnt_desc=='Patient Register') or ($amnt_desc=='Lab Bill') or ($amnt_desc=='Lab Due Bill') or ($amnt_desc=='Procedure Lab Bill') or ($amnt_desc=='Procedure Due Bill'))
                               {
                                 echo  $am=$amount;
                               }else{
                                   $am=0;
                               }
                               ?></td>
                               <td align="center"><?php 
                               if(($amnt_desc=='Patient Register Canceled')  or ($amnt_desc=='Lab Canceled') or ($amnt_desc=='Procedure Lab Canceled') or ($amnt_desc=='IP Return Amount') )
                               {
                                 echo  $amt2=$amount;
                               }else{
                                   $amt2=0;
                               }
                               
                                ?></td>
                            
                            <td align="center"><?php echo $pay_tpe; ?></td>
                            <td align="center"><?php echo $recv_by; ?></td>
                             
                        
                            
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   $am1=$am+$am1;
					   $am2=$amt2+$am2;
					   } }?>
                       
                       
                       <tr><td colspan="5" align="right"><strong>Total</strong></td>
                       <td colspan="1" align="center"><strong><?php echo $am1?></strong></td><td colspan="1"><strong><?php echo $am2?></strong></td>
                       <td colspan="3"><strong><?php echo $am1-$am2?></strong></td>
                       </tr>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
