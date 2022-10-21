<!DOCTYPE html>
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
        <form action= <?php 
            include_once("../classes/User.php");

            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pword = $_POST["pword"];

            $user = new User($fname, $lname, $email, $pword); 
            $user -> createUser(); 
        ?> method="POST">    

            First Name: <input type="text" name="fname"><br>
            Last Name: <input type="text" name="lname"><br>
            Email: <input type="email" name="email"><br>
            New Password: <input type="password" name="pword"><br>
            Verify Password: <input type="password" name="vpword"><br>
            <button type="submit"> Create</button>

        </form>
    </body>
</html>
