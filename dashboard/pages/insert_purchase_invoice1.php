<?php
include("../db/connection.php");
session_start();

$ses=$_SESSION['name1'];

$dept_code=0;
$provalue=0;
$admin=$_REQUEST['authby'];
 $lrno=$_REQUEST['lrno'];
 $p1=$_REQUEST['nitem'];
$rows=$_REQUEST['rows'];
 $stotal=$_REQUEST['total'];
$disc=$_REQUEST['disc'];
 $vatadd=$_REQUEST['vatadd'];
 echo $nettot=$_REQUEST['nettot'];
echo $total=round($_REQUEST['gtot']);
$recby=$_REQUEST['recby'];

$supcode=$_REQUEST['supcode'];
$grn=$_REQUEST['grnno'];
$ptype=$_REQUEST['ptype'];
$invno=$_REQUEST['invno'];
$invdt=date('Y-m-d', strtotime($_REQUEST['invdate']));
$recdt=date('Y-m-d', strtotime($_REQUEST['recdate']));
$recby=$_REQUEST['recby'];
 $total=round($_REQUEST['gtot']);
$admin = $_REQUEST['authby'];
$bankname=$_REQUEST['bankname'];
$chequeno=$_REQUEST['chequeno'];
$paid=$_REQUEST['paid'];
$bal=$_REQUEST['bal']; 
$adjt=$_REQUEST['adjt'];
$round=$_REQUEST['round'];
$name1=$_REQUEST['recby'];
//$qry=mysqli_query($link,"insert into phr_purinv_mast values($sno,'$supcode','$ptype','$invno','$invdt',now(),'$admin','$recby','$total','$recdt','$grn','$bankname','$chequeno','$date3','$paid','$bal','0','$adjt','$round')");


  $a="update phr_purinv_mast set total='$total',rec_by='$recby',SUPPL_CODE='$supcode',PUR_TYPE='$ptype',SUPPL_INV_NO='$invno',
INV_DATE='$invdt',AUTH_BY='$admin',REC_BY='$recby',rec_date='$recdt',grn='$grn',bankname='$bankname',chwqueno='$chequeno',paid='$paid',bal='$bal',adjust='$adjt',round='$round' where lr_no='$lrno'";
$qry=mysqli_query($link,$a);
if($qry)
{
	$count = $_REQUEST['rows'];
	$cnt = count($_REQUEST['pname']);
$cnt2 = count($_REQUEST['vatamt']);
if ($cnt > 0 && $cnt == $cnt2) {
    $insertArr = array();
    for ($i=0; $i<$cnt; $i++) {

		//$pcode=$_REQUEST['pcode'][$i];
		$pname=$_REQUEST['pname'][$i];
		$maniby=$_REQUEST['maniby'][$i];
		$noi=$_REQUEST['noi'][$i];
		//$packing=$_REQUEST['packing'][$i];
		$batch=$_REQUEST['batch'][$i];
		$mrp=$_REQUEST['mrp'][$i];
		//$mfgdt1="30-".$_REQUEST['mfgdate'][$i];
		//$expdt1="30-".$_REQUEST['expdate'][$i];
		
		
		 $mfgdt1=$_REQUEST['mfgdate'][$i];
		$expdt1=$_REQUEST['expdate'][$i];
		
		//$mfgdt = date('Y-m-d',strtotime($mfgdt1));
		//$expdt = date('Y-m-d',strtotime($expdt1));
		
		  $mfgdt2=$_REQUEST['mfgdate'.$i];
		  $expdt2=$_REQUEST['expdate'.$i]; 
		 $m="30-";
		 $mfgdt1= $m."".$mfgdt1; 
		  $expdt1= $m."".$expdt1; 
		
		 $mfgdt = date('Y-m-d',strtotime($mfgdt1));
		 $expdt = date('Y-m-d',strtotime($expdt1)); 
		
		$sqty=$_REQUEST['sqty'][$i];
		$sfree=$_REQUEST['sfree'][$i];
		$srate=$_REQUEST['srate'][$i];
		$value=$_REQUEST['value'][$i];
		$vat=$_REQUEST['vat'][$i];
		$vatamt=$_REQUEST['vatamt'][$i];
$invid=$_REQUEST['invid'][$i];
$sgst=$_REQUEST['sgst'][$i];
$cgst=$_REQUEST['cgst'][$i];
$mrp_tab=$_REQUEST['mrp_tab'][$i];
$sal_tab=$_REQUEST['sal_tab'][$i];
$tqty=$_REQUEST['tqty'][$i];
$sal_ftab=$_REQUEST['sal_ftab'][$i];

//$dsc=$_REQUEST['dsc'][$i];
//$dscamt=$_REQUEST['dscamt'][$i];
		$cst=0;
		$bal_qty=0;
		$bal_qty=$tqty+$sfree;
		//bal_qty=bal_qty+;
		$dis=$_REQUEST['disc'];
$q=mysqli_query($link,"select * from phr_purinv_dtl where lr_no='$lrno'");
$p=mysqli_fetch_array($q);
$inv_id=$p['inv_id'];
$lrno1=$p['lr_no'];
if($_REQUEST['pname'][$i]!=""){
if(($inv_id=$invid)){
 $pp="update  phr_purinv_dtl set   product_name='$pname',batch_no='$batch',mrp='$mrp',exp_date='$expdt',s_qty='$sqty',s_free='$sfree',s_rate='$srate',
 value='$value',vat='$vat',vat_amt='$vatamt',currentdate=now(),auth_by='$admin',mfg_date='$mfgdt',noitems='$noi',
 balance_qty='$bal_qty',manu_by='$maniby',tqty='$tqty',each_pur_rate='$sal_tab',each_mrp_rate='$mrp_tab',feach_pur_rate='$sal_ftab' where lr_no='$lrno' and inv_id='$invid' ";
$sql1=mysqli_query($link,$pp);

}else{
 $mk="insert into phr_purinv_dtl(lr_no,product_name,batch_no,mrp,exp_date,s_qty,s_free,s_rate,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,balance_qty,manu_by,sgst,cgst,tqty,each_pur_rate,each_mrp_rate,feach_pur_rate)
 values($lrno,'$pname','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$value','$vat','$vatamt',now(),'$admin','$mfgdt','$noi','$bal_qty','$maniby','$sgst','$cgst','$tqty','$sal_tab','$mrp_tab','$sal_ftab')";
 $sql1=mysqli_query($link,$mk) or die(mysqli_error($link));
}

}

		
	

				
		}//for
}	

if($sql1)
{
	print "<script>";
	print "alert('successfully Updated');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
	
}
}
?>