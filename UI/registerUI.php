<!DOCTYPE html>

<html lang="en">
    <head>

        <title>Register</title>

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

    <body>
   
        <!-- Registration form that self-calls the method below -->
        <body style="background-color:#171819"></body>
            <div class = "login-container">
                `<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">    
                    <h2 class="modal-title" id="membershipFormLabel">Register</h2>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                    <input type="password" class="form-control" name="pword" placeholder="Password" required>
                    <input type="password" class="form-control" name="vpword" placeholder="Re-type Password" required>
                    <button type="submit" class="form-control" id="submit-button" name="submit">Create Account</button>
                    <label class="text-small text-muted" for="signup-agree"> <a href="loginUI.php">Already Registered? Sign in</a>
                </form>
            </div>`
        
    </body>

</html>

<?php 
   // code to set variables to be used for the User class ""createUser" method.
    include_once("../classes/User.php");

    if (isset($_POST['fname'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pword = $_POST["pword"];

        $user = new User($fname, $lname, $email, $pword); 
        $user -> createUser();


    }
?>