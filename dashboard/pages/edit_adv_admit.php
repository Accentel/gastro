<?php
session_start();
$ses= $_SESSION['user'] ;
if($_SESSION['user'])

{
// Include database connection
include("../db/connection.php");

 include("header.php");

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch record based on the provided ID
    $query = "SELECT * FROM adv_collection WHERE ADV_ID = $id";
    $result = mysqli_query($link, $query);
    
    if(mysqli_num_rows($result) == 1) {
        // Fetch data
        $row = mysqli_fetch_assoc($result);
        $patNo = $row['PAT_NO'];
        $advDate = $row['ADV_DATE'];
        $advAmt = $row['ADV_AMT'];
        $paymentMode = $row['PAYMENT_MODE'];
        $currentDate = $row['CURRENTDATE'];
        $authBy = $row['AUTH_BY'];
        $vocNo = $row['voc_no'];
        $cardNo = $row['card_no'];
        $billNum = $row['bill_num'];
        $admitDate = $row['admit_date'];
        $pname = $row['pname'];
        $age = $row['age'];
        $gender = $row['gender'];
        $mobile = $row['mobile'];
        $rwords = $row['rwords'];
        $mrno = $row['mrno'];
        $time = $row['time'];
        // Similarly fetch other fields
        
        // Now you can use these variables to populate the form fields
    } else {
        echo "Record not found.";
    }
} else {
    echo "ID parameter is missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Adv Admit</title>
    <!-- Include any necessary CSS stylesheets or scripts -->
    <style>
    
        form {
    width: 100%; /* Adjust as needed */
    max-width: 1260px; /* Maximum width for larger screens */
    padding: 10px;
    margin: 0; /* Reset margin */
    margin-left: auto; /* Move the form to the right side */
    border: 1px solid #ccc;
    border-radius: 0px;
    background-color: #f9f9f9;
    box-sizing: border-box; /* Include padding and border in the width */
}


        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 40%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 40%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit Adv Admit</h2>
        <!-- Input fields to display and edit data -->
        <form action="update_adv_admit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="patNo">Patient No:</label>
    <input type="text" name="patNo" id="patNo" value="<?php echo $patNo; ?>"><br>
    <label for="pname">Patient Name:</label>
    <input type="text" name="pname" id="pname" value="<?php echo $pname; ?>"><br>
    <label for="advDate">Adv Date:</label>
    <input type="date" name="advDate" id="advDate" value="<?php echo $advDate; ?>"><br>
    <label for="advAmt">Adv Amount:</label>
    <input type="text" name="advAmt" id="advAmt" value="<?php echo $advAmt; ?>"><br>
    <label for="paymentMode">Payment Mode:</label>
    <input type="text" name="paymentMode" id="paymentMode" value="<?php echo $paymentMode; ?>"><br>
    <label for="age">Age:</label>
    <input type="text" name="age" id="age" value="<?php echo $age; ?>"><br>
    <label for="gender">Gender:</label>
    <input type="text" name="gender" id="gender" value="<?php echo $gender; ?>"><br>
    <label for="mobile">Mobile:</label>
    <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"><br>
    <!-- Add more fields as needed -->
    
        <!-- Submit button -->
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
<?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>