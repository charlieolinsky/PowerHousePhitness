<?php 

    include_once("../includes/connect.php"); 
    include_once("../classes/User.php"); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['pword'];

        $sql = "INSERT INTO users (username, email, hashPassword) VALUES ('$username', '$email', '$password')";

        if ($dbconn->query($sql) === TRUE) {
            header("location: ../forms/login.html");
        } 
        else {
            echo "Error: " . $sql . "<br>" . $dbconn->error;
        }
 
    }
    

?>