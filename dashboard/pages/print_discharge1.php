<?php 
include('../db/Crud.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php
		include("header.php");
	?>
<script language="JavaScript" type="text/javascript">


function prnt(){
	
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 40.7cm;
    padding-top:0px;
	 padding-bottom: 1.5cm;
	  padding-left: 1.5cm;
	   padding-right: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:42px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}

</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="finalbilllist.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
$crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_bill where  id='$bno'";
$t = $crud->getData($k);
foreach($t as $key=>$r){
$id1=$r['id'];
$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
$relation=$r['relation'];
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['doa'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['dichargedate'];
$discharge=date('Y-m-d',strtotime($discharge1));
$surgery1=$r['surgery'];
$surgery=date('Y-m-d',strtotime($surgery1));
$ward=$r['ward'];
$addr=$r['address'];
$doctor=$r['doctors'];
$bill=$r['bno'];
$mobile=$r['mobile'];
$tot_hosp_amnt=$r['tot_hosp_amnt'];
$hosp_paid_amnt=$r['hosp_paid_amnt'];
$hosp_bal_amnt=$r['hosp_bal_amnt'];
$tot_doct_amnt=$r['tot_doct_amnt'];
$tot_doct_paid=$r['tot_doct_paid'];
$tot_doct_bal=$r['tot_doct_bal'];
$tot_lab_amnt=$r['tot_lab_amnt'];
$lab_paid_amnt=$r['lab_paid_amnt'];
$lab_bal_amnt=$r['lab_bal_amnt'];
$tot_pharma_amnt=$r['tot_pharma_amnt'];
$pharma_paid=$r['pharma_paid'];
$pharma_bal=$r['pharma_bal'];
$total=$r['total'];
$paid=$r['paid'];
$due=$r['due'];
    $concession=$r['concession'];
   $namount=$r['namount'];
   $room_days=$r['room_days'];
   $room_rent=$r['room_rent'];
   $room_charges=$r['room_charges'];
$nurs_days=$r['nurs_days'];
$nurs_rent=$r['nurs_rent'];
$nurs_charges=$r['nurs_charges'];
$prof_days=$r['prof_days'];											
$prof_rent=$r['prof_rent'];		
$prof_charges=$r['prof_charges'];									
$inv_days=$r['inv_days'];	
$inv_rent=$r['inv_rent'];
$inv_charges=$r['inv_charges'];	
$phr_days=$r['phr_days'];	
$phr_rent=$r['phr_rent'];
$phr_charges=$r['phr_charges'];
$tot_amt=$r['tot_amt'];
$discount=$r['discount'];
$net=$r['net'];
			}?>
<div><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </div>

<fieldset style="border:1px solid">
<h3 align="center">FINAL BILL DETAILS</h3>
        <table    border="0"  width="90%" style="margin-left:20px;" cellspacing="10">
		<tr>
<td><strong>MRNO</strong></td><td>  :</td>  <td><?php  echo $mrno;?></td>


</tr>
		
		 <tr>
<td  align="left"  style="width:20%"><strong>Patient Name</strong> </td><td style="width:5%"> :</td><td style="width:75%"> <?php echo $pname;  ?></td>



</tr>

 <tr>
<td><strong>Age/Gender</strong></td><td>  :</td> <td><?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td>


</tr>

 <tr>
<td><strong>Consultant Doctor</strong></td><td>  :</td>  <td><?php  echo $doctor;?></td>


</tr>
 
 
 <tr>
<td><strong>Admission Date</strong></td><td>  :</td>  <td><?php echo date('d/m/Y',strtotime($admit));  ?></td>


</tr>
<tr>
<td><strong>Discharge Date</strong></td><td>  :</td>  <td><?php echo date('d/m/Y',strtotime($discharge));  ?></td>


</tr>




<tr>

</tr>
</table>
<hr/>

 <table width="100%" align="left">
 

 
 
 <tr><td colspan="3">
                                                   <table  width="100%" border="1" style="border-left:#FFF; border-right:#FFF; ">
												   <tr >
												   <th>Particulars</th>
												   <th>No.of Days</th>
												   <th>Rate</th>
												   <th >Amount</th>
												   </tr>
												   <?php 
												   $k1="select * from  ifinal_bill_genral where  id1='$bno'";
$t1 = $crud->getData($k1);
foreach($t1 as $key=>$r1){
												   
												   ?>
												 <tr>
												    <td><?php echo $r1['desc1'] ?></td> 
												     <td><?php echo $r1['days'] ?></td> 
												      <td><?php echo $r1['charge'] ?></td> 
												       <td><?php echo $r1['amnt'] ?></td> 
												     
												 </tr>
												   <?php }?>
												   <tr style="border-left:#FFF !important;">
												   <td>
												   
												   
												  </td>
												   <td> </td>
												   <td><b> TOTAL</b> </td>
												   <td style="border-right:#FFF;"> <b><?php echo $tot_amt;?></b></td>
												    
												   </tr>
												   
												  <tr >
												   <td>
												   
												   
												  </td>
												   <td> </td>
												   <td><b> DISCOUNT</b> </td>
												   <td> <b><?php echo $discount;?></b></td>
												    
												   </tr>
												   <tr style="border-bottm:#FFF;">
												   <td>
												   
												   
												  </td>
												   <td> </td>
												   <td><b> GRAND TOTAL</b> </td>
												   <td> <b><?php echo $tot_amt;?></b></td>
												    
												   </tr>
												   
												</table>
												
											
												</table>
												   </fieldset>
  <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $tot_amt;
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
  $rupee= $result . "Rupees  " ;
 ?> 
 </td></tr>
 <tr><td><br><br></td></tr></table>
 
 <div align="center"><b>Rupees: <?php echo $rupee?> Only ...</div>
 
 <!--
 <tr><td colspan="3">
 <hr/>
<h3 align="center">DOCTOR DETAILS</h3>
                                                   <table  width="100%">
												   <tr>
												   <th>Dr.Name</th>
												   <th>No of Days Visit</th>
												   <th>Amount</th>
												   <th>Total</th>
												   </tr>
												   
												   
												   </table>
                                                
 
 </td></tr>
 -->
 
 
        
        
        </table>
        
        </td>
         
        
        </tr>
         
        </table>
		
		
        
        
              
       
        
        </div> 
        </div>   
       
    </div>
    
</div>
</body>
</html>
<?php 
include("footer.php");
}else
{
session_destroy();
session_unset();
header('Location:index.php');
}
?>