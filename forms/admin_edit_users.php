<?php

session_start();
//$session = new Session();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");


if ($_SESSION["get_id"]) {
    $id = $_SESSION['get_id'];
    // echo $get_id;
    $sql2 = "SELECT * FROM user_table WHERE USER_ID = '$id'";
    $result2 = $dbconn->query($sql2);
    $user = $result2->fetch_assoc();
}

// calling method from user class to reset role 
if (isset($_GET['role'])){
    $id = $_GET["id"];
    $role = $_GET["newRole"];
    User::setMembershipLevel($role, $id);
    header("Location: ../forms/admin_edit_users.php?userID=".$id."&getID=Submit");
}
// calling method from user class to reset firstname
if (isset($_GET['fn'])) {
    $id = $_GET["id"];
    $fName = ucfirst($_GET["newName"]);
    User::setFirstName($fName, $id);
    header("Location: ../forms/admin_edit_users.php?userID=".$id."&getID=Submit");
}

// calling method from user class to reset lastname
if (isset($_GET['ln'])) {
  $id = $_GET["id"];
  $lName = ucfirst($_GET["newLname"]);
  User::setLastName($lName, $id);
  header("Location: ../forms/admin_edit_users.php?userID=".$id."&getID=Submit");
}
// calling method from user class to reset password
if (isset($_GET['pass'])) {
  if (strlen($_GET["newPassword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_GET["newPassword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_GET["newPassword"])) {
    die("Password must contain at least one number");
}
  if ($_GET["newPassword"] !== $_GET["vPass"]) {
    die("Passwords must match");
}
  $id = $_GET["id"];
  $pass = $_GET["newPassword"];
    User::setPassword($pass, $id);
}

if (isset($_GET['remove_user']))
{
  $id = $_GET["id"];
  User::adminRemoveUser($id);
  header("Location: ../forms/admin_edit_users.php?userID=".$id."&getID=Submit");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<!-- Setting background color -->
<body style="background-color: var(--dark-color)">
<!-- align all 'main' components to center -->
<main style="text-align: center">
        <!-- Page Title -->
        <div class="admin-title">
            <h1 style="color: var(--primary-color)">
            <?php
              echo $user["fname"];
            ?> 

            <?php
              echo $user["lname"];
            ?>

            - Account Info</h1>
        </div>

        <!-- Container for user info -->
        <div class="inventory-container" style="margin-top: 400px">
          <div class="column"> 
              <h5>
                <!-- Display User ID -->
                User ID: 
                <?php
                  echo $id;
                ?>
                <br><br>
                <!-- Display User Role -->
                User Role: 
                <?php
                  echo $user['roles'];
                ?>   
              </h5>

              <!-- Edit User Role Input -->
              <form action="../forms/admin_edit_users.php" method="GET">   
                <div class="row">
                  <div class="form-popup" id="myForm">
                      <input type="name" placeholder="Enter new role value" name="newRole" required>
                      <input type="name" placeholder="Confirm user ID" name="id" required>
                  </div>
                </div>

                <!-- Edit User Role Submit Button -->
                <input type="submit" class="btn edit-btn" name = "role" value = "Submit" style="margin-top: 10px">
              </form>

              <br>

              <!-- Display First Name -->
              <h5>
                First Name: 
                <?php
                  echo $user["fname"];
                ?>
              </h5>

              <!-- Edit User First Name Input -->
              <form action="../forms/admin_edit_users.php" method="GET">   
                <div class="row">
                  <div class="form-popup" id="myForm">
                      <!-- <label for="newName"><b>Edit First Name</b></label> -->
                      <input type="name" placeholder="Enter new first name" name="newName" required>
                      <input type="name" placeholder="Confirm user ID" name="id" required>
                      <!-- <input type="submit" name = "fn" value = "Submit"> -->
                  </div>
                </div>

                <!-- Edit First Name Submit Button -->
                <input type="submit" class="btn edit-btn" name = "fn" value = "Submit" style="margin-top: 10px">
              </form>

              <br>

              <!-- Display Last Name -->
              <h5>
                Last Name: 
                <?php
                  echo $user["lname"];
                ?>
              </h5>

              <!-- Edit User Last Name Input -->
              <form action="../forms/admin_edit_users.php" method="GET">  
                <div class="row">
                  <div class="form-popup" id="myForm">
                        <input type="name" placeholder="Enter new last name" name="newLname" required>
                        <input type="name" placeholder="Confirm user ID" name="id" required>
                    </div>
                </div>

                <!-- Edit Last Name Submit Button -->
                <input type="submit" class="btn edit-btn" name = "ln" value = "Submit" style="margin-top: 10px">
              </form>

              <br>

              <!-- Change Password Title -->
              <h5>Change Password</h5>

              <!-- Edit Password Input-->
              <form action="../forms/admin_edit_users.php" method="GET">  
                <div class="row">
                  <div class="form-popup" id="myForm">
                    <input type="password" placeholder="Enter new password" name="newPassword" required>
                    <input type="password" placeholder="Confirm password" name="vPass" required>
                  </div>
                </div>

                <!-- Confirm User ID Input -->
                <div class= "row" style="justify-content: center; margin-top: 5px">
                  <input type="name" placeholder="Confirm user ID" name="id" required>
                </div>

                <!-- Change Password Submit Button -->
                <input type="submit" class="btn edit-btn" name = "pass" value = "Submit" style="margin-top: 10px">
              </form>
            
              <br><br>

              <!-- Change Password Title -->
              <h5>Delete Account</h5>

              <!-- Delete Account Label and Button -->
              <div class="column" style="justify-content: center">
                <form action="../forms/admin_edit_users.php" method="GET">  
                <input type="name" placeholder="Confirm user ID" name="id" required>
                <br>
                <input type="submit" class="btn edit-btn" style="margin-top: 5px" name = "remove_user" onclick="return confirm('Are you sure you want to delete this account?')" value = "Delete Account">
              </div>

          </div>
        </div>

        <!-- Return to search & Return to Admin portal buttons -->
        <div style="margin-top:850px">
          <a href="admin_search_users.php" class="btn custom-btn bg-color">Return to Search</a>
          <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
        </div>
</main>
</body>
</html>