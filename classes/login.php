<!-- This form will verify the entered username and password 
Against values found in the DB.  -->

<?php 

    include_once("../sql/connect.php"); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //Retrieve Username and Password from form 
        $username = $_POST['uname'];
        $password = $_POST['pword']; 
    
        //if user exists, fetch their row in user table
        $sql = "SELECT id FROM users WHERE username = '$username' and hashPassword = '$password'";
        $result = mysqli_query($dbconn, $sql);

        //redirect based on result of query 
        if($result == TRUE) {
            header("location: ../forms/welcome.html");
        }else {
            echo "Your Login Name or Password is invalid";
         }

    }
    

?>