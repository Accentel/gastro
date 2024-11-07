<?php 
 if (isset($_POST['Submit'])) {
	
           
            $arr = array(
                'mrno' => $_POST['rnum'],
                'applicantsign' => $_POST['pname'],
                'drname' => $_POST['dname'],
				'pname' => $_POST['dname1'],
				
				'office' => $_POST['dname2'],
                'disease' => $_POST['suffer'],
				'user' => $_POST['user'],
                
				
            );
            insert('medicalfitnesscertificate', $arr);
        }
 
 
 
        function insert($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/medicalfitnesscertificatelist.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_medicalfitness.php';";
			print "</script>";
}$link->close();
           
        }

if (isset($_POST['update'])) {

	
           $id=$_POST['id'];
          
                $rnum =$_POST['rnum'];
                $pname = $_POST['pname'];
                $dname = $_POST['dname'];
				$dname1 =$_POST['dname1'];
				
				$dname2= $_POST['dname2'];
                $suffer= $_POST['suffer'];
				
           	include("../db/connection.php");
		
		 $query1="update medicalfitnesscertificate set `mrno`='$rnum',`applicantsign`='$pname',`drname`='$dname',`pname`='$dname1',
		`office`='$dname2',`disease`='$suffer' where id='$id'"; 
		
  
		   
		   
		   
		   if ($link->query($query1) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/medicalfitnesscertificatelist.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/edit_medicalfitnesscertificate.php?id=$id';";
			print "</script>";
}$link->close();
           
        }
		
		
		if (isset($_POST['add_ref_doct'])) {
	
           
            $arr = array(
                'ref_docname' => $_POST['refdoc'],
                'mobile' => $_POST['contno'],
                'address' => $_POST['addr'],
				'email' => $_POST['gmail'],
				
				'refcode' => $_POST['refcode'],
                'iplabshare' => $_POST['labshare'],
				'hospitalamount' => $_POST['hospitalshare'],
				'doctorshare' => $_POST['doctorshare'],
				'doctoramount' => $_POST['doctoamount'],
                'oplabshare' => $_POST['hospitalshare'],
				
                'labamount' => $_POST['labamount'],
				'cdae' => date('Y-m-d'),
				
				'user' => $_POST['user'],
				'hospitalamount' => $_POST['hamo'],
                
				
            );
            insert1('referal_doctor', $arr);
        }
 



 
        function insert1($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/reffer_doctor.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/ref_add_doctor.php';";
			print "</script>";
}$link->close();
           
        }
		
	if (isset($_POST['edit_ref_doct'])) {

	
           $id=$_POST['id'];
          
                $refdoc =$_POST['refdoc'];
                $contno = $_POST['contno'];
                $addr = $_POST['addr'];
				$gmail =$_POST['gmail'];
				
				$refcode= $_POST['refcode'];
               $iplabshare = $_POST['labshare'];
				$hamo= $_POST['hamo'];
				
				$mnum1= $_POST['mnum'];
				$addr1 = $_POST['addr'];
               $fee1 =$_POST['fee'];
				
               $hos_share =$_POST['hospitalshare'];
				$hos_amount= $_POST['hamo'];
				
				$doctorshare = $_POST['doctorshare'];
                $doctoamount = $_POST['doctoamount'];
               $labshare = $_POST['labshare'];
				$labamount = $_POST['labamount'];
				
				$stime = $_POST['stime'];
                $etime =$_POST['etime'];
              $ddt1=$_POST['ddt'];
				$doct_type=$_POST['doct_type'];

			
           	include("../db/connection.php");
			
			
			
			
			
		
		 $query1="update referal_doctor set `ref_docname`='$refdoc',`mobile`='$contno',`address`='$addr',`email`='$gmail',
		`refcode`='$refcode',`iplabshare`='$iplabshare',`hospitalamount`='$hamo',`doctorshare`='$doctorshare',`oplabshare`='$hos_share',
		`labamount`='$labamount' where 		 rid='$id'"; 
		
  
		   
		   
		   
		   if ($link->query($query1) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/reffer_doctor.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/edit_ref_doctor.php?id=$id';";
			print "</script>";
}$link->close();
           
        }	
		
		
		
		if (isset($_POST['add_uom'])) {
	include("../db/connection.php");
           $uname=$_POST['uname'];
$sql = mysqli_query($link,"select * from phr_unit_mast where UNIT_NAME = '$uname'");

$rows = mysqli_num_rows($sql);
if($rows >= 1){
	print "<script>";
	print "alert('unit name already exists');";
	print "self.location='../pages/add_uom.php';";
	print "</script>";
}else {

            $arr = array(
                'UNIT_CODE' => $_POST['unit_id'],
                'UNIT_NAME' => $_POST['uname'],
                'AUTH_BY' => $_POST['ses'],

				
                
				
            );
            insert_uom('phr_unit_mast', $arr);
        }
 



 
        function insert_uom($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/uom.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_uom.php';";
			print "</script>";


		} 
			
		}
		

$link->close();
           
        }

		if (isset($_POST['edit_uom'])) {

	
           $id=$_POST['id'];
          
                $unit_id =$_POST['unit_id'];
                $uname = $_POST['uname'];
          include("../db/connection.php");
		  $query1="update phr_unit_mast set `UNIT_NAME`='$uname' where 		 `UNIT_CODE`='$id'";
		
  
		   if ($link->query($query1) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/uom.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/edit_uom.php?id=$id';";
			print "</script>";
}$link->close();
           
        }	
		
		
		
		
		if (isset($_POST['add_prd_type'])) {
	include("../db/connection.php");
           $ptname=$_POST['ptname'];
$sql = mysqli_query($link,"select * from phr_prdtype_mast where prdtype_name = '$ptname'");

echo $rows = mysqli_num_rows($sql);
//if($rows >= 1){
	//print "<script>";
	//print "alert('Product name already exists');";
	//print "self.location='../pages/add_product_type.php';";
	//print "<script>";
//}else {

            $arr = array(
                'PRDTYPE_NAME' => $_POST['ptname'],
                'REP' => $_POST['rep'],
				'TYPE' => $_POST['ptype'],
				
                 'AUTH_BY' => $_POST['ses'],
				 

				
                
				
            );
            add_prd_type1('phr_prdtype_mast', $arr);
        }
 //echo "hi";



 
        function add_prd_type1($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
             $val = array_values($data);
            echo $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/product_type_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_product_type.php';";
			print "</script>";


		} 
			
	//	}
		

$link->close();
           
        }
		
		if (isset($_POST['update_prd_type'])) {

	
           $id=$_POST['id'];
          $rep=$_POST['rep'];
		  $ptname=$_POST['ptname'];
		  $ptype=$_POST['ptype'];
		  
               
          include("../db/connection.php");
		  $query1="update phr_prdtype_mast set `PRDTYPE_NAME`='$ptname',`REP`='$rep',`TYPE`='$ptype' where 	 `PRDTYPE_CODE`='$id'";
		
  
		   if ($link->query($query1) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/product_type_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/edit_product_type.php?id=$id';";
			print "</script>";
}$link->close();
           
        }	
		
	if (isset($_POST['add_suppliier'])) {
	
           
            $arr = array(
		
			'SUPPL_CODE' => $_POST['SUPPL_CODE'],
                'SUPPL_NAME' => $_POST['SUPPL_NAME'],
                'TYPE' => $_POST['TYPE'],
                'PHONE1' => $_POST['PHONE1'],
				'CITY' => $_POST['CITY'],
				
				'COUNTRY' => $_POST['COUNTRY'],
                'AGR_NO' => $_POST['AGR_NO'],
				'CST_REG_NO' => $_POST['CST_REG_NO'],
				'ECC_NO' => $_POST['ECC_NO'],
				'fsno' => $_POST['fsno'],
                'SUPPL_CODE' => $_POST['SUPPL_CODE'],
				
                'CONTACT_PERSON' => $_POST['CONTACT_PERSON'],  
				
				 'PHONE2' => $_POST['PHONE2'], 
				  'STATE' => $_POST['STATE'], 
				   'ADDR1' => $_POST['ADDR1'], 
				    'AGR_DATE' => $_POST['AGR_DATE'], 
				'APGST_NO' => $_POST['APGST_NO'], 
				    'REMARKS' => $_POST['REMARKS'], 
				'status' => Y, 
				
				
                
				
            );
            add_suppliier1('phr_supplier_mast', $arr);
        }
 



 
        function add_suppliier1($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/supplier_info_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_supplier_info.php';";
			print "</script>";
}$link->close();
           
        }	
		
		
		
		if(isset($_POST['update_suppliier'])){
			$SUPPL_CODE=$_POST['SUPPL_CODE'];
                $SUPPL_NAME=$_POST['SUPPL_NAME'];
                $TYPE=$_POST['TYPE'];
                $PHONE1 = $_POST['PHONE1'];
				$CITY = $_POST['CITY'];
				
				$COUNTRY = $_POST['COUNTRY'];
                $AGR_NO = $_POST['AGR_NO'];
				$CST_REG_NO = $_POST['CST_REG_NO'];
				$ECC_NO =$_POST['ECC_NO'];
				$fsno = $_POST['fsno'];
                $SUPPL_CODE = $_POST['SUPPL_CODE'];
				
                $CONTACT_PERSON = $_POST['CONTACT_PERSON']; 
				
				 $PHONE2= $_POST['PHONE2'];
				  $STATE = $_POST['STATE'];
				   $ADDR1 = $_POST['ADDR1'];
				    $AGR_DATE = $_POST['AGR_DATE']; 
				$APGST_NO = $_POST['APGST_NO'];
				    $REMARKS = $_POST['REMARKS'];
					$id=$_POST['id'];
					include("../db/connection.php");
					 $sq1="update phr_supplier_mast set SUPPL_CODE='$SUPPL_CODE',SUPPL_NAME='$SUPPL_NAME',
					TYPE='$TYPE',ADDR1='$ADDR1',CITY='$CITY',STATE='$STATE',COUNTRY='$COUNTRY',PINCODE='$PINCODE',AREA='$AREA',
					PHONE1='$PHONE1',FAX1='$FAX1',EMAIL='$EMAIL',CONTACT_PERSON='$CONTACT_PERSON',PHONE2='$PHONE2',CATGORY='$CATGORY',
					AGR_NO='$AGR_NO',AGR_DATE='$AGR_DATE',CST_REG_NO='$CST_REG_NO',APGST_NO='$APGST_NO',ECC_NO='$ECC_NO',REMARKS='$REMARKS',fsno='$fsno' 
					where SUP_ID='$id'";
					 if ($link->query($sq1) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/supplier_info_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Update Data into Database ');";
			print "self.location='../pages/edit_supplier_info.php?id=$id';";
			print "</script>";
}$link->close();
           
        }	
			
			
			
			
			
			
			
			
			
			
			
		if (isset($_POST['add_pack'])) {
	include("../db/connection.php");
       

            $arr = array(
                'PACKING_CODE' => $_POST['pid'],
                'PACKING_NAME' => $_POST['pname'],
                'AUTH_BY' => $_POST['ses'],

				
                
				
            );
            insert_pack('phr_packing_mast', $arr);
        }
 



 
        function insert_pack($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
			echo "hi";
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/packing_info_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_packing_info.php';";
			print "</script>";


		} 
			
	
		

$link->close();
           
        }	
			
			
		if(isset($_POST['edit_pack'])){
include("../db/connection.php");
 $PACKING_CODE = $_POST['pid'];
                $PACKING_NAME = $_POST['pname'];
                $id = $_POST['id'];
				$sq="update phr_packing_mast set PACKING_CODE='$PACKING_CODE',PACKING_NAME='$PACKING_NAME' where PACKING_CODE='$id'";
 if ($link->query($sq) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/packing_info_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Update Data into Database ');";
			print "self.location='../pages/edit_packing_info.php?id=$id';";
			print "</script>";


		} 
		}		
			
			
			
			
			
			
		
			
			
			
		if (isset($_POST['add_prd_det'])) {
	include("../db/connection.php");
       

            $arr = array(
                'TYPE' => $_POST['tname'],
                'PRD_NAME' => $_POST['prdname'],
				  'PRD_CODE' => $_POST['prdcode'],
                'UNIT_CODE' => $_POST['unit'],
				  'vattax' => $_POST['vtax'],
                'pack_code' => $_POST['packing'],
				  'mani_by' => $_POST['maniby'],
                'sgst' => $_POST['sgst'],
				  'cgst' => $_POST['cgst'],
                'prd_type_det' => $_POST['gen'],
                //'AUTH_BY' => $_POST['ses'],

				
                
				
            );
            insert_add_prd_det('phr_prddetails_mast', $arr);
        }
 



 
        function insert_add_prd_det($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
			//echo "hi";
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/product_details_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_product_details.php';";
			print "</script>";


		} 
			
	
		

$link->close();
           
        }	
				
			
			if (isset($_POST['edit_prd_det'])) {
	include("../db/connection.php");
       

                $TYPE = $_POST['tname'];
                $PRD_NAME = $_POST['prdname'];
				  $PRD_CODE = $_POST['prdcode'];
                $UNIT_CODE = $_POST['unit'];
				  $vattax = $_POST['vtax'];
                $pack_code = $_POST['packing'];
				  $mani_by = $_POST['maniby'];
                $sgst = $_POST['sgst'];
				  $cgst = $_POST['cgst'];
               
                $id = $_POST['id'];
				 $prd_type_det = $_POST['gen'];

				
            $sql = "update phr_prddetails_mast set TYPE='$TYPE',PRD_NAME='$PRD_NAME',PRD_CODE='$PRD_CODE',
			UNIT_CODE='$UNIT_CODE',vattax='$vattax',pack_code='$pack_code',mani_by='$mani_by',sgst='$sgst',cgst='$cgst',prd_type_det='$prd_type_det' where id='$id'";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='../pages/product_details_list.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Update Data into Database ');";
			print "self.location='../pages/edit_product_details.php?id=$id';";
			print "</script>";


		} 
			
	
		

$link->close();
           
        }		
			
			
		if (isset($_POST['add_cust'])) {
	include("../db/connection.php");
       

            $arr = array(
                'cname' => $_POST['cname'],
                'cmobile' => $_POST['mobileno'],
				  'caddress' => $_POST['addr'],
                'age' => $_POST['age'],
				  'sex' => $_POST['sex'],
                'date1' => date('Y-m-d'),
				 

				
                
				
            );
            insert_add_cust('customer', $arr);
        }
 



 
        function insert_add_cust($table_name, $data) {
			include("../db/connection.php");
 
            $key = array_keys($data);
            $val = array_values($data);
			//echo "hi";
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";  
		   
		   
		   
		   if ($link->query($sql) === TRUE) {
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='../pages/sustomerview.php';";
			print "</script>";
} else {
//echo "Error: " . $sql . "<br>" . $link->error;
print "<script>";
			print "alert('Unable to Insert Data into Database ');";
			print "self.location='../pages/add_customer.php';";
			print "</script>";


		} 
			
	
		

$link->close();
           
        }	
		
		
?>