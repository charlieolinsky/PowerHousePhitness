<!DOCTYPE html>

<?php

include_once("../include/global_inc.php");
$s = new Session();

// calling method from user class to reset firstname
if (isset($_POST['fn'])) {
    $fName = ucfirst($_POST["newName"]);
    $id = $s->read('user_id');
    $s->write('fname', $fName);
    User::setFirstName($fName, $id);
}

// calling method from user class to reset lastname
if (isset($_POST['ln'])) {
  $lName = ucfirst($_POST["newLname"]);
  $id = $s->read('user_id');
  $s->write('lname', $lName);
  User::setLastName($lName, $id);
}

// calling method from user class to reset address
if (isset($_POST['add'])) {
  $address = $_POST["newAddress"];
  $id = $s->read('user_id');
  User::setFirstName($address, $id);
}
// calling method from user class to reset password
if (isset($_POST['pass'])) {
  if (strlen($_POST["newPassword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["newPassword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["newPassword"])) {
    die("Password must contain at least one number");
}
  if ($_POST["newPassword"] !== $_POST["vPass"]) {
    die("Passwords must match");
}
  $pass = $_POST["newPassword"];
  $id = $s->read('user_id');
  User::setPassword($pass, $id);
}
//  method to delete user from the db
if (isset($_POST['remove_user']))
{
  $id = $s->read('user_id');
  User::removeUser($id);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>
  <body style="background-color: var(--dark-color)">
  <main> 
    <!-- Title -->
    <div class="equip-title">
          <h1 style="color: var(--primary-color)">My Account</h1>
    </div>

    <!-- Edit Information Form -->
    <div class = "inventory-container">
        <div class="column">
          <!-- First Name -->
          <p style="color: var(--primary-color)">
            First Name: 
            <?php
              echo $s->read('fname');
            ?>
          </p>

          <!-- Edit First Name -->
          <div class="row" style="justify-content: center">
                  <!-- The form -->
              <div class="form-popup" id="myForm">
              <form action="../forms/account_tab_edit.php" method="POST">   

              <!-- <label for="newName"><b>Edit First Name:</b></label> -->
              <input type="name" placeholder="Enter new first name" name="newName" required>
              <br>
              <input type="submit" class="btn edit-btn" name="fn" value="Submit" style="margin-top: 5px">
              </form>
              </div>
          </div>

          <br><br>

          <!-- Last Name -->
          <p style="color: var(--primary-color)">
            Last Name: 
            <?php
              echo $s->read('lname');
            ?>
          </p>

          <!-- Edit Last Name -->
          <div class="row" style="justify-content: center">
              <!-- The form -->
              <div class="form-popup" id="myForm">
              <form action="../forms/account_tab_edit.php" method="POST">  
  
                <!-- <label for="newLname"><b>Edit Last Name:</b></label> -->
                <input type="name" placeholder="Enter new last name" name="newLname" required>
                <br>
                <input type="submit" class="btn edit-btn" name="ln" value="Submit" style="margin-top: 5px">
              </form>
              </div>
          </div>

          <br><br>

          <!-- Change Password Title -->
          <p style="color: var(--primary-color)">
              Change Password
          </p>

          <!-- Change Password -->
          <div class="row" style="justify-content: center">
            <div class="form-popup" id="myForm">
            <form action="../forms/account_tab_edit.php" method="POST">  

              <!-- <label for="newAddress"><b>Password:</b></label> -->
              <input type="password" placeholder="Enter new password" name="newPassword" required>
              <input type="password" placeholder="Confirm password" name="vPass" required>
              <br>
              <input type="submit" class="btn edit-btn" name="pass" value="Submit" style="margin-top: 5px">

           </form>
          </div>
        </div>

      </div>

      <br> 

      <!-- Upgrade & Cancel Links -->
      <div class="column">
          <a href="../UI/services.php#membership">Upgrade Your Membership</a>
          <br>
          <a href="cancelMembership.php">Cancel Your Membership</a>
          <br>
          <form action="../forms/account_tab_edit.php" method="POST">  
          <input type="submit" class="btn cart-btn" name="remove_user" onclick="return confirm('Are you sure you want to delete this account?')" value="Delete Account" style="margin-top: 10px">
      </div>


    </div>

    <!-- Return back button -->
      <div style="margin-top:650px; text-align: center">
            <a href="account_tab.php" class="btn custom-btn bg-color">Return to Account Tab</a>
        </div>

        
     
      <br>

</div>
</main>
</body>
</html>