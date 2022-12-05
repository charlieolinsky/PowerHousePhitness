<!DOCTYPE html>
<html lang="en">
<head>

     <title>Login</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="./css/bootstrap.min.css">
     <link rel="stylesheet" href="./css/font-awesome.min.css">
     <link rel="stylesheet" href="./css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="./css/tooplate-php-style.css">
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>
<!-- form for login which self-calls the method below -->
<body style="background-color:#171819"></body>
<login-title>P H P</login-title>
    <div class = "login-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 class="modal-title" id="membershipFormLabel">Login</h2>
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="pword" placeholder="Password" required>
            <button type="submit" class="form-control" id="submit-button" name="submit">Login</button>
            <label class="text-small text-muted" for="signup-agree"> <a href="registerUI.php">Create an Account</a> 
            <br>
            <label class="text-small text-muted" for="signup-agree"> <a href="index.php">Return Home</a>
        </form>
    </div>

    
       

   <!-- SCRIPTS -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/smoothscroll.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    // goes through the db to get all data from the person with the email entered
    $sql = sprintf("SELECT * FROM user_table
                    WHERE email = '%s'",
                    $_POST["email"]);
    
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    
    //checks that the hashed password entered matches whats in the database for the given email
    if ($user) {
        if (password_verify($_POST['pword'], $user['passcode'])) {
            include_once('../include/global_inc.php');
            
            // creating session variables 
            $session = new Session();
            $session->write("user_id", $user["USER_ID"]);
            $session->write("email", $user["email"]);
            $session->write("roles", $user["roles"]);
            $session->write("fname", $user["fname"]);
            $session->write("lname", $user["lname"]);
            $session->write("pword", $user["passcode"]); 
            
            // if passwords match, brings you to the home page 
            header("Location: index.php"); 
            die();
        }
    }
    //if passwords dont match, error message
    echo "<p align = 'center', style = 'color:red'> LOGIN FAILED"; 

}

?>


