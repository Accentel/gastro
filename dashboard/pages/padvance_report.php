<?php
include("../db/Crud.php");
$crud = new Crud();
 $advid=$crud->my_simple_crypt($_GET['adv_no'],'d');
include('../db/connection.php');
  //$m="SELECT H.PAT_NO,H.ADV_DATE,H.ADV_AMT,H.PAYMENT_MODE,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,M.age,M.gender,A.BED_NO ,d.dname1,bb.ROOM_NO,H.AUTH_BY FROM adv_collection as H,ip_pat_admit as A,patientregister as M ,doct_infor as d,bed_details as bb WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno AND H.ADV_ID='$advid' and d.id=A.doc_code and A.BED_NO=bb.BED_NO";
   //$m="select distinct H.PAT_NO,H.ADV_DATE,H.ADV_AMT,H.PAYMENT_MODE,H.mrno,A.PAT_REGNO,A.ADMIT_DATE,H.pname,H.age,H.gender,A.BED_NO ,H.AUTH_BY,H.bill_num,A.doc_code,A.room_loc,A.room_type,A.room_no from adv_collection H,ip_pat_admit A   where  H.PAT_NO=A.PAT_NO AND H.ADV_ID='$advid'";
$m="select * from padv_collection where ADV_ID='$advid'";
   $qry=mysqli_query($link,$m) or die(mysqli_error($link));
$count=mysqli_num_rows($qry);
if($qry){
$row = mysqli_fetch_array($qry);
	$mrno=$row['mrno'];
	//$ADMIT_DATE=$row['ADMIT_DATE'];
	//$patno = $row['PAT_NO'];
	$advdate = date('d-m-Y',strtotime($row['ADV_DATE']));
	$advamt = $row['ADV_AMT'];
	$pmode = $row['PAYMENT_MODE'];
	//$pregno = $row['PAT_REGNO'];
	//$admitdate = date('d-m-Y',strtotime($row['ADMIT_DATE']));
	$patname = $row['pname'];
	$age = $row['age'];
	$gender = $row['gender'];
	//$bedno = $row['BED_NO'];
	//$docname = $row['dname1'];
	//$roomno = $row['room_no'];
	$authby = $row['AUTH_BY'];
	//$doc_code= $row['doc_code'];
	$bill_no=$row['bill_num'];
	//$r1=mysqli_query($link,"select * from doct_infor where id='$doc_code'");
	//$res1=mysqli_fetch_array($r1);
	//$dname=$res1['dname1'];
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="../js/actb.js"></script>
<script language="javascript" type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/sortable.js"></script>


<title>Hospital Management System</title>

<script language="JavaScript" type="text/javascript">
function abc(){
document.getElementById('prt').style.display='none';
document.getElementById('cls').style.display='none';
window.print();
window.close();

}
function closs()
{
window.close();
}
</script>
</head>
        
<body >

 <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $advamt;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $rupee= $result . "Only  " ;
 ?> 
<form name="form" autocomplete="off">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>
               
               <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
                    <tr>
                        <td  colspan="6"><img src="../img/raajtop.png" style="width:100%; height:120px;"/></td>
                    </tr>
                   
                </table>
            </td>
            </tr>
        </table>
            </td>
        </tr> 
  <tr>
    <td colspan="2">
     <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="95%" border="0" align="center" style="vertical-align:text-top;color:#000;" cellpadding="1" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
             
             <tr>
			 <td width="20%"><div align="left"><b>Bill No</b></div></td>
			<td>: <?php echo $bill_no ?></td>
          <td width="20%"><div align="left"><b> </b>
            </div></td>
            
            <td > </td>
            
			</tr>
             
             <tr>
			 <td width="20%"><div align="left"><b>MR No</b></div></td>
			<td>: <?php echo $mrno ?></td>
          <td width="20%"><div align="left"><b> Bill_Date </b>
            </div></td>
            
            <td >: <?php echo  date('d-m-Y',strtotime($advdate)); ?></td>
            
			</tr>
     
          <tr>
			 <td width="20%"><div align="left"><b>Patient Name</b></div></td>
			<td>: <?php echo $patname ?></td>
                     <td ><div align="left"><b>Age/Sex</b></div></td>
			<td >: <?php echo $age ?>/<?php echo $gender ?></td>
			</tr>
     
			      
            <td  ><div align="left"><b>Advance Amount</b></div></td>
			<td>: <?php echo $advamt ?></span></u></td>
            </tr>
            
          
         
        </table></td>
      </tr>
      
      
      
       <tr ><td align="center"  colspan="2" valign="top" style=" border-top: #000000 1px solid;color:#000;"><table width="80%" border="0" align="center" v>
        <tr><td valign="top"><div align="left"><b>Rupees:</b>&nbsp;<?php echo $rupee ?></div></td>
</tr></table></td></tr>
    
     <tr ><td align="center"  colspan="2" valign="top" style=" border-top: #000000 0px solid;color:#000;"><table width="80%" border="0" align="center" v>
        <tr><td valign="top"><div align="left"><b>Prepared By:</b>&nbsp;<?php echo $authby ?></div></td><td valign="top"><div align="right"><b>Printed Date:</b>&nbsp;<?php echo date('d-m-Y');?></div></td></tr></table></td></tr>
    </table></td>
  </tr>
     <tr>
          <td height="100" colspan="3" align="right" style="color:#000;"><b>SIGNATURE &nbsp;&nbsp;</b></td>
      </tr>
	<tr><td align="center"><input type="button" value="Print" id="prt" onclick="abc();"/> <input type="button" value="Close" id="cls" onclick="window.close();"/></td></tr>
</table>

</form>
</body>
</html>
<?php
}

?>