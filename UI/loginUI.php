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

<!-- <section class="login" id="login">
    <p style="background-image:url('../images/login-bg.jpg') ;"
     hero d-flex flex-column justify-content-center align-items-center  
    <div class="bg-overlay">
         <div class="center">
            <div class="flex-container">
                <div class="team-info">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <input type="text" class="form-control" name="passoword" placeholder="Password">
    
                </div>
            </div>
         </div> 
    </div>
 </section>  -->

<body style="background-color:#171819"></body>
<login-title>P H P</login-title>

    <!-- <div class="flex-container">
        <div class="modal-body">
            <input type="text" class="form-control" name="Username" placeholder="Username" required>

            <input type="tel" class="form-control" name="Password" placeholder="Password" required>

            <button type="submit" class="form-control" id="submit-button" name="submit">Login</button>
        </div>
    </div> -->
    <div class = "login-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <!-- <div class="modal-content">
                <div class="modal-header"> -->
                    <h2 class="modal-title" id="membershipFormLabel">Login</h2>
                <!-- </div>
            </div>  -->
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="pword" placeholder="Password" required>
            <button type="submit" class="form-control" id="submit-button" name="submit">Login</button>
            <!-- <label class="custom-control-label text-small text-muted" for="signup-agree"> <a href="#">Sign Up Now</a> -->
            <label class="text-small text-muted" for="signup-agree"> <a href="registerUI.php">Create an account</a> 
            <br>
            <label class="text-small text-muted" for="signup-agree"> <a href="services.php#membership">Not a member? Click to join</a>
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

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    $sql = sprintf("SELECT * FROM user_table
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    //var_dump($user);
    //exit;
    
    if ($user) {
        if (password_verify($_POST['pword'], $user['passcode'])) {
            include_once('../include/global_inc.php');
            
            $session = new Session();
            $session->write("user_id", $user["USER_ID"]);
            $session->write("email", $user["email"]);
            $session->write("roles", $user["roles"]);
            $session->write("fname", $user["fname"]);
            $session->write("lname", $user["lname"]);
            $session->write("pword", $user["passcode"]); 
    
            // $_SESSION["email"] = $user["email"];
            // $_SESSION["role"] = $user["roles"]; //global var from db
            // $_SESSION["fname"] = $user["fname"];
            // $_SESSION["lname"] = $user["lname"];
            // $_SESSION["pword"] = $user["passcode"];
            
            header("Location: index.php"); //ui/index.php
            exit;
        }
    }
    echo "LOGIN FAILED"; 
    $is_invalid = true;
}

?>


