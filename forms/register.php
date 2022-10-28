<!DOCTYPE html>



<?php 
    include_once("../classes/User.php");

    if (isset($_POST['fname'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pword = $_POST["pword"];

        $user = new User($fname, $lname, $email, $pword); 
       // $user -> createUserData();
        $user -> createUserLogin(); 
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="../css/register.css">
        
        <title>Register!</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">    

            First Name: <input type="text" name="fname"><br>
            Last Name: <input type="text" name="lname"><br>
            Email: <input type="email" name="email"><br>
            New Password: <input type="password" name="pword"><br>
            Verify Password: <input type="password" name="vpword"><br>
            <button type="submit" name="submit"> Create</button>

        </form>
    </body>

</html>