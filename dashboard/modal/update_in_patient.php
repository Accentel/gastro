<?php
ob_start();
include("../db/connection.php");

if (isset($_POST['submit'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Retrieve form data
    $pregno = $_POST['rnum'];
    $pno = $_POST['patno'];
    $sno = $_POST['sno'];
    $adate = isset($_POST['admitdate']) ? date("Y-m-d", strtotime($_POST['admitdate'])) : null;
    $atime = $_POST['time'];
    $bedno = $_POST['bedsno'];
    $dstatus = 'ADMITTED';
    $bstatus = 'NOT PAID';
    $cashcredit = $_POST['pat_type'] ?? '';
    $ctype = $cashcredit == "credit" ? ($_POST['concession_type'] ?? '') : '';
    $concardno = $cashcredit == "credit" ? ($_POST['conce_card'] ?? '') : '';
    $insutype = $cashcredit == "credit" ? ($_POST['insutype'] ?? '') : '';
    $amt = $_POST['adm_fee'];
    $conamt = $_POST['conce_fee'];
    $allotby = $_POST['emp_name'] ?? '';
    $aname = $_POST['emp_name'] ?? '';
    $doccode = $_POST['docname'];
    $dcost = $_POST['diet_cost'] ?? 0;
    $mrcost = $_POST['mr_charge'];
    $sex = $_POST['sex'];
    $advdate1 = $_POST['adv_date'] ?? '2023-05-23';
    $advdate = date("Y-m-d", strtotime($advdate1));
    $advamt = $_POST['rupees'] ?? 0;
    $roomrents = $_POST['roomrents'] ?? 0;
    $room_location = $_POST['room_location'];
    $adate = $_POST['admitdate'];
    $tot = $amt - $conamt + $mrcost + $dcost + $roomrents;
    $bal = $tot - $advamt;
    $adt = $_POST['admitdate'];
    $pname = $_POST['pname'];
    $age = $_POST['age'];
    $roomsno = $_POST['roomsno'];
    $room_type = $_POST['room_type'];
    $pkg = "No";
    $pay_type = $_POST['pay_type'] ?? '';
    $amt = $_POST['adm_fee'];

    // echo "Received Gender: " . $sex . "<br>";

    // Fetch current patient data
    $qry9 = mysqli_query($link, "SELECT PAT_REGNO, BED_NO, room_loc, room_type, room_no FROM ip_pat_admit WHERE pat_no='$pno'");
    if ($qry9) {
        $row9 = mysqli_fetch_array($qry9);
        $oldbedno = $row9['BED_NO'];
        $oldregno = $row9['PAT_REGNO'];
        $old_room_loc = $row9['room_loc'];
        $old_room_type = $row9['room_type'];
        $old_room_no = $row9['room_no'];
    } else {
        die("Query failed: " . mysqli_error($link));
    }
// Update gender and patient name in patientregister table
$updateQuery = "UPDATE patientregister SET gender='$sex', age='$age', patientname='$pname' WHERE registerno='$pregno'";
$updateResult = mysqli_query($link, $updateQuery);
if (!$updateResult) {
    die("Update query failed: " . mysqli_error($link));
}


    // Handle bed updates based on conditions
    if ($bedno != $oldbedno && $oldregno != $pregno) {
        $a = "UPDATE beds SET status='in' WHERE id='$oldbedno' AND ltype='$old_room_loc' AND rtype='$old_room_type' AND roomno='$old_room_no'";
        $qry4 = mysqli_query($link, $a);
        if (!$qry4) {
            die("Update beds query failed: " . mysqli_error($link));
        }

        $qry5 = mysqli_query($link, "UPDATE patientregister SET pat_type='OP', status='' WHERE registerno='$oldregno'");
        if (!$qry5) {
            die("Update patientregister query failed: " . mysqli_error($link));
        }
    } else if ($bedno != $oldbedno && $oldregno == $pregno) {
        $ax = "UPDATE beds SET status='in' WHERE id='$oldbedno' AND ltype='$old_room_loc' AND rtype='$old_room_type' AND roomno='$old_room_no'";
        $qry41 = mysqli_query($link, $ax);
        if (!$qry41) {
            die("Update beds query failed: " . mysqli_error($link));
        }
    }

    // Update ip_pat_admit table
    $qry = mysqli_query($link, "UPDATE ip_pat_admit SET pat_regno='$pregno', ADMIT_DATE='$adate', ADMIT_TIME='$atime', BED_NO='$bedno', DIS_STATUS='ADMITTED', BILL_STATUS='NOT PAID',
        CONCESSION_TYPE='$ctype', CONCESSION_CARDNO='$concardno', AMOUNT='$amt', CONS_AMT='$conamt', ALLOT_BY='$allotby', CURRENTDATE=now(), AUTH_BY='$aname', doc_code='$doccode', cash_credit='$cashcredit',
        diet_cost='$dcost', MR_COST='$mrcost', room_loc='$room_location', room_type='$room_type', room_no='$roomsno', room_rent='$roomrents', tot='$tot', adv_amnt='$advamt', bal='$bal' WHERE pat_no='$pno'");
    if ($qry) {
        $qry1 = mysqli_query($link, "UPDATE ip_pat_bed SET BED_NO='$bedno', START_DATE='$adate', START_TIME='$atime', ALLOTED_BY='$allotby', CURRENTDATE=now(), AUTH_BY='$aname' WHERE pat_no='$pno' AND sno=$sno");
        if ($qry1) {
            $a1 = "UPDATE beds SET status='out' WHERE id='$bedno' AND ltype='$room_location' AND rtype='$room_type' AND roomno='$roomsno'";
            $qry2 = mysqli_query($link, $a1);
            if ($qry2) {
                echo "<script>";
                echo "alert('Successfully updated');";
                echo "self.location='../pages/inpatient.php';";
                echo "</script>";
            } else {
                die("Update beds status query failed: " . mysqli_error($link));
            }
        } else {
            die("Update ip_pat_bed query failed: " . mysqli_error($link));
        }
    } else {
        die("Update ip_pat_admit query failed: " . mysqli_error($link));
    }
} else {
    die("Form not submitted correctly");
}

ob_get_flush();
?>
