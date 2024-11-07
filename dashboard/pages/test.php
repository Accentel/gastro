
<script type="text/javascript">
if (document.layers) {
    //Capture the MouseDown event.
    document.captureEvents(Event.MOUSEDOWN);
 
    //Disable the OnMouseDown event handler.
    document.onmousedown = function () {
        return false;
    };
}
else {
    //Disable the OnMouseUp event handler.
    document.onmouseup = function (e) {
        if (e != null && e.type == "mouseup") {
            //Check the Mouse Button which is clicked.
            if (e.which == 2 || e.which == 3) {
                //If the Button is middle or right then disable.
                return false;
            }
        }
    };
}
 
//Disable the Context Menu event.
document.oncontextmenu = function () {
    return false;
};
</script>


<!DOCTYPE html>
<html>
    <body>
        <form name="uses" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            First name:<br>
            <input type="text" name="name" required>
            <br>
            Last name:<br>
            <input type="text" name="email" required><br>
            Password:<br>
            <input type="text" name="password" required><br>
             Mobile:<br>
            <input type="text" name="mobile" required><br>
            <br>
            <input type="submit" name="submit" value="submit">
 
        </form>
        <?php
        /**
         * Author: Abu Hozaifa
         * This is a function to insert data into database using dynamic function
         * Date: 13th Feb 208
         * Database: MySQL
         */
		 	
        if (isset($_POST['submit'])) {
           // define('HOST', 'localhost');
         
           // define('USER', 'root');
            //define('PASSWORD', '');
			  //define('DATABASE', 'raj');
      //mysql_connect(HOST, USER, PASSWORD,DATABASE);
        //  mysqli_select_db(DATABASE);
//	include("../db/connection.php");





            $arr = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
				'phone' => $_POST['mobile'],
            );
            insert('users', $arr);
        }
 
        function insert($table_name, $data) {
			
include("../db/connection.php");
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";
			
			if ($link->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $link->error;
}$link->close();
			
            //$status = mysqli_query($conn,$sql);
            //if ($status) {
               // echo 'Insered Successfully';
           // } else {
                //echo 'Unable to Insert Data into Database';
				//mysql_error($status);
           // }
        }
        ?>
    </body>
</html>