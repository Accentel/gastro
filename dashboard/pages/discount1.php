<?php

include("../db/connection.php");



 $sdate=$_GET['sdate'];

 $edate=$_GET['edate'];

 $sdate1=date('Y-m-d',strtotime($sdate));

 $edate1=date('Y-m-d',strtotime($edate));
$ftime=$_GET['ftime'];
 $ttime=$_GET['etime'];
 $sess=$_GET['sess'];
 $finalfromdate=$sdate1.' '.$ftime;
 $finaltodate=$edate1.' '.$ttime;
 
 

 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

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

                <td class="header">Discount Summary - <?php echo $sdate;?></td>

            </tr>

            <tr>

                <td>&nbsp;</td>

            </tr>

            <tr>

                <td>

                    <table cellpadding="4" cellspacing="0" width="100%" border="1">

                       

                        <tr>

							<td align="center"><b>S.No.</b></td>

							<td align="center"><b>Date.</b></td>

                            <td align="center"><b>Mrno .</b></td>

							<td align="center"><b>Pat Name .</b></td>

                             <td align="center"><b>OP</b></td>

                             <td align="center"><b>IP.</b></td>

							<td align="center"><b>Advance.</b></td>

                            <td align="center" colspan="2"><b>Lab Bill.</b></td>

                            <td align="center" colspan="2"><b>Procedure Lab Bill</b></td>

                          

							      <td align="center" colspan="2"><b>Pharmacy Sale.</b></td>

							 <td align="center" colspan="2"><b>Final Bill.</b></td>

							

                           

                            

							

                            

							

						</tr>

                        <?php 

						

						

						$date=$sdate1;

						$date1=$edate1;

						
if($sess=='admin' and 'achyuth' and 'joshua')

						$af="select * from patientregister a left join daily_amount b on a.reg_id=b.id
where a.pcancel='' and a.date between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') ";
else
  $af="select * from patientregister a left join daily_amount b on a.reg_id=b.id
where a.pcancel='' and b.recv_by='$sess' and a.date between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') ";
						

						$sqg=mysqli_query($link,$af) or die(mysqli_error($link));

							 $i=1;

							 while($r=mysqli_fetch_array($sqg)){

							 ?>

                        <tr>

                            <td align="center"><?php echo $i;?></td>

							<td align="center"><?php $d= $r['registerdate']; echo date('d-m-Y', strtotime($d));?></td>

                             <td align="center"><?php echo $mr=$r['registerno']; ?></td>

							  <td align="center"><?php echo $r['patientname'];?></td>
							 <!-- <td align="center"><?php echo $r[''];?></td>-->

							  <td align="center"><?php echo $op=$r['total'];?></td>

							  

							   <td align="center"><?php 

							    $a1="select sum(adv_amnt) as total from ip_pat_admit where  

							  admit_date between '$date' and '$date1' and 	PAT_REGNO='$mr' ";

							  $sq1=mysqli_query($link,$a1) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq1);

							   

							   echo $ip=$r1['total'];?></td>

							  

							  <td align="center"><?php 

							   $a="select sum(ADV_AMT) as op from adv_collection where  

							  adv_date between '$date' and '$date1' and mrno='$mr' ";

							  $sq=mysqli_query($link,$a) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq);

							   

							   echo $ad=$r1['op'];?></td>

							   

							    <td align="center"><?php 

							   $a="select sum(tamount) as op,sum(discount) as dis from bill where  

							  bdate between '$date' and '$date1' and mrno='$mr' ";

							  $sq=mysqli_query($link,$a) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq);

							   

							   echo $lab=$r1['op'];?></td>

							   <td><?php echo $lab_dic=$r1['dis'];?></td>

							   <td align="center"><?php 

						  $a="select sum(tamount) as op,sum(discount) as dis from bill_proc where  

							  bdate between '$date' and '$date1' and mrno='$mr' ";

							  $sq=mysqli_query($link,$a) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq);

							   

							   echo $plab=$r1['op'];?></td>

							   <td><?php echo $plab_dic=$r1['dis'];?></td>

							   

							   <td align="center"><?php 

							    $a="select sum(bill_total) as bill_total,sum(final_amnt) as final_amnt from phr_salent_mast where  

							  SAL_DATE between '$date' and '$date1' and mrnum='$mr' and status='' ";

							  $sq=mysqli_query($link,$a) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq);

							echo $bill_totalq=$r1['bill_total']; $damt=$r1['final_amnt'];

							 



							 ?></td>

							   <td><?php echo $phr_dis=$bill_totalq-$damt;?></td>

							

							    <td align="center"><?php 

							   $a="select total,concession from final_bill_fin where  

							  doa between '$date' and '$date1' and mrno='$mr'  ";

							  $sq=mysqli_query($link,$a) or die(mysqli_error($link));

							  $r1=mysqli_fetch_array($sq);	

							echo $fin=$r1['total']; 

							 



							 ?></td>

							   <td><?php echo $fin_dic=$r1['concession'];?></td>
</tr>

							 <?php 

							 

							 $opk=$op+$opk;

							  $ipk=$ip+$ipk;

							  $adk=$ad+$adk;

							  $labk=$lab+$labk;

							  $lab_dick=$lab_dic+$lab_dick;

							   $plabk=$plab+$plabk;

							  $plab_dick=$plab_dic+$plab_dick;

							  

							  $bill_totalqk =$bill_totalq+$bill_totalqk ;   

							  $phr_disk =$phr_dis+$phr_disk;

							  $fink=$fin+$fink;

							  $fin_dick=$fin_dic+$fin_dick;

							 $i++;

							 }?>

                  

					   <tr>

                            <td align="center" colspan="4"><b>TOTAL</b></td>

                           

                              <td align="center">

							 <b> <?php 

							

							  echo $opc=$opk;?>

							  </b></td>

                           

							<td align="center">

							  <b><?php 

							

							  echo $ipc=$ipk;?>

							  </b></td>

							 <td align="center"><b>

							 <?php echo $adc=$ad;?></b>

							 </td>

                            <td align="center"><b>

							 <?php echo $lbc=$labk;?></b>

							 </td>

							 <td align="center"><b>

							 <?php echo $lbck=$lab_dick;?></b>

							 </td>

                              <td align="center"><b>

							 <?php echo $plbc=$plabk;?></b>

							 </td>

							 <td align="center"><b>

							 <?php echo $plbck=$plab_dick;?></b>

							 </td>

							  <td align="center"><b><?php echo $purc=$bill_totalqk;?></b></td>

                           

                               <td align="center"><b><?php echo $phc=$phr_disk;?></b></td>

                           <td align="center"><b><?php echo $fink;?></b></td>

						   <td align="center"><b><?php echo $fin_dick;?></b></td>

                            

						</tr>

						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : 

						<?php echo $c=$opc+$ipc+$adc+$lbc+$plbc+$purc+$fink;?>(+)</b></td>

						<td colspan="4" align="center">

						<b> Discount Amount : <?php echo $b=$lbck+$plbck+$phc+$fin_dick;?>(-) </b></td> 

						

						<td colspan="7" align="center">

						<b> Net Amount : <?php echo $c-$b;?> </b></td> 

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

