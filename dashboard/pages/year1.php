<?php
include("../db/connection.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $nsdate=$sdate+1;
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
                <td class="header">Year Wise Summary - <?php echo $sdate;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Month.</b></td>
                             <td align="center"><b>OP</b></td>
                             <td align="center"><b>IP.</b></td>
							<td align="center"><b>Advance.</b></td>
                            <td align="center"><b>Lab Bill.</b></td>
                            <td align="center"><b>Procedure Lab Bill</b></td>
                            <td align="center"><b>Pharmacy Purchase.</b></td>
							      <td align="center"><b>Pharmacy Sale.</b></td>
							 <td align="center"><b>Final Bill.</b></td>
							
                           
                            
							
                            
							
						</tr>
                        
                        <tr>
                            <td align="center">1</td>
                             <td align="center">Apr</td>
                              <td align="center">
							  <?php 
							 $date="$sdate-04-01-"; $date1="$sdate-04-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op3=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip3=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad3=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb3=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb3=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur3=$r['op'];?></td>
							  
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr3=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f3=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">2</td>
                             <td align="center">May</td>
                              <td align="center">
							  <?php 
							 $date="$sdate-05-01-"; $date1="$sdate-05-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op4=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip4=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad4=$r['op'];?></td>
                             <td align="center">
							  <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb4=$r['op'];?>
							 </td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb4=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur4=$r['op'];?></td>
							  
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr4=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f4=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">3</td>
                             <td align="center">June</td>
                              <td align="center">
							  <?php 
							  $date="$sdate-06-01-"; $date1="$sdate-06-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op5=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip5=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad5=$r['op'];?></td>
                             <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb5=$r['op'];?>
							 </td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb5=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur5=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr5=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f5=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">4</td>
                             <td align="center">Jul</td>
                              <td align="center">
							  <?php 
							  $date="$sdate-07-01-"; $date1="$sdate-07-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op6=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip6=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad6=$r['op'];?></td>
                             <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb6=$r['op'];?>
							 </td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb6=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur6=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr6=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f6=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">5</td>
                             <td align="center">Aug</td>
                              <td align="center">
							  <?php 
							 $date="$sdate-08-01-"; $date1="$sdate-08-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op7=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip7=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad7=$r['op'];?></td>
                             <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb7=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb7=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur7=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr7=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f7=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">6</td>
                             <td align="center">Sep</td>
                              <td align="center">
							  <?php 
							   $date="$sdate-09-01-"; $date1="$sdate-09-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op8=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip8=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad8=$r['op'];?></td>
                             <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb8=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb8=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur8=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr8=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f8=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">7</td>
                             <td align="center">Oct</td>
                              <td align="center">
							  <?php 
							 $date="$sdate-10-01-"; $date1="$sdate-10-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op9=$r['op'];?>
							  </td>
                            <td align="center">
							
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip9=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad9=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb9=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb9=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur9=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr9=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f9=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">8</td>
                             <td align="center">Nov</td>
                              <td align="center">
							  <?php 
							  $date="$sdate-11-01-"; $date1="$sdate-11-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op10=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip10=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad10=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb10=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb10=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur10=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr10=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f10=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">9</td>
                             <td align="center">Dec</td>
                              <td align="center">
							  <?php 
							 $date="$sdate-12-01-"; $date1="$sdate-12-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op11=$r['op'];?>
							  </td>
                            <td align="center">
							<?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip11=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad11=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb11=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb11=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur11=$r['op'];?></td>
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr11=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f11=$r['op'];?></td>
                            
						</tr>
					   <tr>
                            <td align="center">10</td>
                             <td align="center">Jan</td>
                              <td align="center">
							  <?php 
							 $date="$nsdate-01-01"; $date1="$nsdate-01-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op=$r['op'];?>
							  </td>
                            <td align="center">
							
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip=$r['op'];?>
							</td>
                            <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad=$r['op'];?>
							</td>
                             <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb=$r['op'];?></td>
                               <td align="center">
							   <?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb=$r['op'];?>
							   </td>
							   
							     <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur=$r['op'];?></td>
							   
                            <td align="center"> <?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f=$r['op'];?></td>
                            
						</tr>
                  <tr>
                            <td align="center">11</td>
                             <td align="center">Feb</td>
                              <td align="center">
							  <?php 
							 $date="$nsdate-02-01"; $date1="$nsdate-02-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op1=$r['op'];?>
							  </td>
                            <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip1=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad1=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb1=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb1=$r['op'];?></td>
							  
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur1=$r['op'];?></td>
							  
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr1=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f1=$r['op'];?></td>
                            
						</tr>
						<tr>
                            <td align="center">12</td>
                             <td align="center">Mar</td>
                              <td align="center">
							  <?php 
							 $date="$nsdate-03-01"; $date1="$nsdate-03-31";
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Patient Register' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $op2=$r['op'];?>
							  </td>
                            <td align="center">
							 <?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='In Patient' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ip2=$r['op'];?>
							</td>
                            <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Advance Collection' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $ad2=$r['op'];?></td>
                             <td align="center"><?php 
							
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $lb2=$r['op'];?></td>
                               <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Procedure Lab Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $plb2=$r['op'];?></td>
							   <td align="center"> <?php 
							  $a="select sum(total) as op from phr_purinv_mast where
							   date(INV_DATE) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $pur2=$r['op'];?></td>
							  
                            <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Pharmacy' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $phr2=$r['op'];?></td>
							   <td align="center"><?php 
							  $a="select sum(amount) as op from daily_amount where
							  amnt_type='Final Bill' and date(date_time) between '$date' and '$date1' ";
							  $sq=mysqli_query($link,$a);
							  $r=mysqli_fetch_array($sq);
							  echo $f2=$r['op'];?></td>
                            
						</tr>
						
					   <tr>
                            <td align="center" colspan="2"><b>TOTAL</b></td>
                           
                              <td align="center">
							 <b> <?php 
							
							  echo $opc=$op+$op1+$op2+$op3+$op4+$op5+$op6+$op7+$op8+$op9+$op10+$op11;?>
							  </b></td>
                           
							<td align="center">
							  <b><?php 
							
							  echo $ipc=$ip+$ip1+$ip2+$ip3+$ip4+$ip5+$ip6+$ip7+$ip8+$ip9+$ip10+$ip11;?>
							  </b></td>
							 <td align="center"><b>
							 <?php echo $adc=$ad+$ad1+$ad2+$ad3+$ad4+$ad5+$ad6+$ad7+$ad8+$ad9+$ad10+$ad11;?></b>
							 </td>
                            <td align="center"><b>
							 <?php echo $lbc=$lb+$lb1+$lb2+$lb3+$lb4+$lb5+$lb6+$lb7+$lb8+$lb9+$lb10+$lb11;?></b>
							 </td>
                            <td align="center"><b>
							 <?php echo $plbc=$plb+$plb1+$plb2+$plb3+$plb4+$plb5+$plb6+$plb7+$plb8+$plb9+$plb10+$plb11;?></b>
							 </td>
							  <td align="center"><b><?php echo $purc=$pur+$pur1+$pur2+$pur3+$pur4+$pur5+$pur6+$pur7+$pur8+$pur9+$pur10+$pur11;?></b></td>
                           
                               <td align="center"><b><?php echo $phc=$phr+$phr1+$phr2+$phr3+$phr4+$phr5+$phr6+$phr7+$phr8+$phr9+$phr10+$phr11;?></b></td>
                           <td align="center"><b><?php echo $fc=$f+$f1+$f2+$f3+$f4+$f5+$f6+$f7+$f8+$f9+$f10+$f11;?></b></td>
                            
						</tr>
						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : <?php echo $c=$opc+$ipc+$adc+$lbc+$plbc+$phc+$fc;?>(+)</b></td>
						<td colspan="4" align="center">
						<b> Pharmacy Purchase Amount : <?php echo $purc;?>(-) </b></td> 
						
						<td colspan="2" align="center">
						<b> Net Amount : <?php echo $c-$purc;?> </b></td> 
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
