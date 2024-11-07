<?php
session_start();
$ses = $_SESSION['user'];
if ($_SESSION['user']) {
    // Include database connection
    include("../db/connection.php");
    include("header.php");

    // Check if ID is provided in the URL
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Retrieve form data
        $patNo = $_POST['patNo'];
        $pname = $_POST['pname'];
        $advDate = $_POST['advDate'];
        $advAmt = $_POST['advAmt'];
        $paymentMode = $_POST['paymentMode'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        // Add more fields as needed

        // Update record in the database
        $query = "UPDATE adv_collection SET PAT_NO='$patNo', pname='$pname', ADV_DATE='$advDate', ADV_AMT='$advAmt', PAYMENT_MODE='$paymentMode', age='$age', gender='$gender', mobile='$mobile' WHERE ADV_ID='$id'";
        $result = mysqli_query($link, $query);

        if ($result) {
            // Redirect back to the edit page with the same ID and any existing hash fragment
            $redirectUrl = "advancebilllist.php";
            if (!empty($_SERVER['HTTP_REFERER'])) {
                $redirectUrl .= '#' . parse_url($_SERVER['HTTP_REFERER'], PHP_URL_FRAGMENT);
            }
            header("Location: $redirectUrl");
            exit(); // Stop executing the rest of the script
        } else {
            echo "Error updating record: " . mysqli_error($link);
        }
    } else {
        echo "ID parameter is missing.";
    }

    include("footer.php");
} else {
    session_destroy();
    session_unset();
    header('Location:../../index.php');
}
?>
