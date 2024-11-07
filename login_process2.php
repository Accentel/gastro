<?php
ob_start();
session_start();
//load the db connection;
require_once 'dashboard/db/connection.php';


if (isset($_POST['submit'])) {
    //read the login form variables
    $user_email = trim($_POST['uname']);

    $password1 = trim($_POST['pwd']);
    $password = md5($password1);

    //check the form validations
    if (empty($user_email) or empty($password)) {
        $errorName = "Please Enter User Name";
        $errorpss = "Please Enter Password";
    } else {
         $sql = "SELECT name1,passowrd FROM login WHERE name1='$user_email'  and passowrd='$password' ";

        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
        $row = mysqli_fetch_assoc($res);
		//$login_type=$row['login_type'];
        $count = mysqli_num_rows($res);

        if ($count == 1 ) {
            $_SESSION['user'] = $user_email;
//redirect the dashboard page
            echo '<script type="text/javascript">
           window.location = "dashboard/pages/dashboard.php"
      </script>';
        } 
		
		
		
		else {
            echo $error = '<div class="alert alert-danger" id="success-alert"><strong>Invalid Username or Password!</strong> </div>';
        }
    }
}
?>