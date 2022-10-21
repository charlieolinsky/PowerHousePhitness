<?php
// attempting to connect login to user db
$is_invalid = false; //variable initialized to false 

if ($_SERVER["REQUEST_METHOD"] === "POST") { //method becomes 'post' once the user submits the form
    
    include_once("../sql/connect.php");
    
    $sql = sprintf("SELECT * FROM basic_users
                    WHERE email = 'email'"); 

                  // $mysqli->real_escape_string($_POST["email"]));
    
    //$result = $mysqli->query($sql);
    $result = mysqli_query($dbconn, $sql);
    
    $user = $result->fetch_assoc(); // return the record as associated array
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("location: ../forms/welcome.html");
            exit;
        }
    }
    
    $is_invalid = true; // if we reach this point, email or pass invalid, throws error in html
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../css/"> -->
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
</html
