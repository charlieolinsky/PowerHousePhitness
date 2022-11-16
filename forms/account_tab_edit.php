<!DOCTYPE html>

<?php

session_start();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");

// calling method from user class to reset firstname
if (isset($_POST['fn'])) {
    $fName = $_POST["newName"];
    $id = $_SESSION['user_id'];

    //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
    //$user -> setFirstName($name, $id);
    //User::setFirstName($name, $id);
      User::setFirstName($fName, $id);
}

// calling method from user class to reset lastname
if (isset($_POST['ln'])) {
  $lName = $_POST["newLname"];
  $id = $_SESSION['user_id'];

  //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
  //$user -> setFirstName($name, $id);
  //User::setFirstName($name, $id);
    User::setLastName($lName, $id);
}

// calling method from user class to reset email
if (isset($_POST['em'])) {
  $email = $_POST["newEm"];
  $id = $_SESSION['user_id'];

  //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
  //$user -> setFirstName($name, $id);
  //User::setFirstName($name, $id);
    User::setEmail($email, $id);
}

// calling method from user class to reset address
if (isset($_POST['add'])) {
  $address = $_POST["newAddress"];
  $id = $_SESSION['user_id'];

  //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
  //$user -> setFirstName($name, $id);
  //User::setFirstName($name, $id);
    User::setFirstName($address, $id);
}
// calling method from user class to reset password
if (isset($_POST['pass'])) {

  if ($_POST["newPassword"] !== $_POST["vPass"]) {
    die("Passwords must match");
}
  $pass = $_POST["newPassword"];
  $id = $_SESSION['user_id'];

  //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
  //$user -> setFirstName($name, $id);
  //User::setFirstName($name, $id);
    User::setPassword($pass, $id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
  echo "hello";
  $id = $_SESSION['user_id'];
  User::removeUser($id);
}

?>

<html>
  <head>
    <title>My Account Tab</title>
  </head>
<body>
<main> 
<h1>My Account</h1>
<div class = "account-info">
    <dl>
        <dt>First Name: 
        <?php
          echo $_SESSION['fname'];
        ?>
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/account_tab_edit.php" method="POST">   
            <h3>Edit First Name</h3>

            <label for="newName"><b>First Name</b></label>
            <input type="name" placeholder="Enter new first name" name="newName" required>
            <input type="submit" name = "fn" value = "Submit">
            <!-- <button type="submit" class="btn">Submit</button> -->
          </form>
      </div>
        </dt>

        <dt>
        <br>    
        Last Name: 
        <?php
          echo $_SESSION['lname'];
        ?>
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/account_tab_edit.php" method="POST">  
            <h3>Edit Last Name</h3>

            <label for="newLname"><b>Last Name</b></label>
            <input type="name" placeholder="Enter new last name" name="newLname" required>
            <input type="submit" name = "ln" value = "Submit">
          </form>
      </div>
        </dt>


        <dt>
        <br>    
        Email:
        <?php
          echo $_SESSION['email'];
        ?> 
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/account_tab_edit.php" method="DELETE">  
            <h3>Edit Email</h3>

            <label for="newEm"><b>Email</b></label>
            <input type="name" placeholder="Enter new email" name="newEm" required>

            <input type="submit" name = "em" value = "Submit">
          </form>
      </div>
        </dt>

        <dt>
        <br>    
        Address: 
        <?php
          //echo $_SESSION[''];
        ?> 
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/account_tab_edit.php" method="POST">  
            <h3>Edit Address</h3>

            <label for="newAddress"><b>Address</b></label>
            <input type="name" placeholder="Enter new address" name="newAddress" required>

            <input type="submit" name = "add" value = "Submit">
          </form>
      </div>
      <br>
      Password: 
           <!-- The form -->
      <div class="form-popup" id="myForm">
      <form action="../forms/account_tab_edit.php" method="POST">  
            <h3>Change Password</h3>

            <label for="newAddress"><b>Password</b></label>
            <input type="password" placeholder="Enter new password" name="newPassword" required>
            <input type="password" placeholder="Confirm password" name="vPass" required>

            <input type="submit" name = "pass" value = "Submit">
          </form>
      </div>
      <br>
      <!-- <button class="btn delete account">Delete Account</button> -->
      <form action="../forms/account_tab_edit.php" method="POST">  
      <input type="submit" name = "Remove User" value = "Delete Account">
      </dl>
</div>
</main>
</body>
</html>