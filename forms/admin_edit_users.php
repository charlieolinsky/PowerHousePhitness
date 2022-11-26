<!DOCTYPE html>

<?php

//session_start();
//$session = new Session();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");

// keeps rerunning through lines 13-21??
// loses the value of 'id' and 'user'when hit submit 

if (isset($_GET['getID'])) {
    $id = $_GET['userID'];
    $sql = "SELECT * FROM user_table WHERE USER_ID = '$id'";
    $result = $dbconn->query($sql);
    $user = $result->fetch_assoc();
    //var_dump($user);
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

<html>
  <head>
    <title>My Account Tab</title>
  </head>
<body>
<main> 
<h1>Account Info</h1>
<div class = "account-info">
    <dl>
    <dt>User ID: 
        <?php
          echo $id;
        ?>   
    </dt>
    <br>
    <dt>User Role: 
        <?php
          echo $user['roles'];
        ?>   
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/admin_edit_users.php" method="GET">   
            <label for="newRole"><b>Edit Role</b></label>
            <input type="name" placeholder="Enter new role" name="newRole" required>
            <input type="name" placeholder="Confirm user ID" name="id" required>
            <input type="submit" name = "role" value = "Submit">
          </form>
      </div>
    </dt>
    <br>
        <dt>First Name: 
        <?php
            echo $user["fname"];
        ?>
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/admin_edit_users.php" method="GET">   
            <label for="newName"><b>Edit First Name</b></label>
            <input type="name" placeholder="Enter new first name" name="newName" required>
            <input type="name" placeholder="Confirm user ID" name="id" required>
            <input type="submit" name = "fn" value = "Submit">
            <!-- <button type="submit" class="btn">Submit</button> -->
          </form>
      </div>
        <br>    
        Last Name: 
        <?php
          echo $user["lname"];
        ?>
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/admin_edit_users.php" method="GET">  
            <label for="newLname"><b>Edit Last Name</b></label>
            <input type="name" placeholder="Enter new last name" name="newLname" required>
            <input type="name" placeholder="Confirm user ID" name="id" required>
            <input type="submit" name = "ln" value = "Submit">
          </form>
      </div>
        <br>    
            <label for="newAddress"><b>Change Password</b></label>
            <input type="password" placeholder="Enter new password" name="newPassword" required>
            <input type="password" placeholder="Confirm password" name="vPass" required>
            <input type="name" placeholder="Confirm user ID" name="id" required>

            <input type="submit" name = "pass" value = "Submit">
          </form>
      </div>
      <br>
      <!-- <button class="btn delete account">Delete Account</button> -->
      <form action="../forms/admin_edit_users.php" method="GET">  
      <input type="name" placeholder="Confirm user ID" name="id" required>
      <input type="submit" name = "remove_user" value = "Delete Account">
      </dl>
</div>
</main>
</body>
</html>