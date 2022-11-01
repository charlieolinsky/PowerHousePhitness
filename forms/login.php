<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    $sql = sprintf("SELECT * FROM user_login
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    //var_dump($user);
    //exit;
    
    if ($user) {
        if (password_verify($_POST['password'], $user['passcode'])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["USER_ID"];
            $_SESSION["user_name"] = $user["email"];
            $_SESSION["role"] = $user["roles"]; //global var from db
            
           header("Location: ../ui/index.php"); //forms/welcome.php
            exit;
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
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
    
</body>
</html>