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
        if (password_verify($_POST['password'], $user['passcode'])) {
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
            
            header("Location: ../UI/index.php"); //ui/index.php
            die();
        }
    }
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for = "email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
    
</body>
</html>