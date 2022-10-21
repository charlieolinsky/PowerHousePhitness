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
        <form action="../classes/User.php" method="POST">    
       
           <!--method="POST"... onsubmit="return createUser()" -->
            
            First Name: <input type="text" name="fname"><br>
            Last Name: <input type="text" name="lname"><br>
            Email: <input type="email" name="email"><br>
            New Password: <input type="password" name="pword"><br>
            Verify Password: <input type="password" name="vpword"><br>
            <button type="submit">Create</button>

        </form>
    </body>
</html>