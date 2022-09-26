<!-- This form will verify the entered username and password 
Against values found in the DB.  -->

<?php 

    include_once("../includes/connect.php"); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $username = $_POST['uname'];
        $password = $_POST['pword'];

        echo $username;
        echo ' '.$password; 

    }
    

?>