<!DOCTYPE html>

<?php

session_start();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");



if (isset($_POST['fn'])) {
    $name = $_POST["newName"];
    $id = $_SESSION['user_id'];
    echo $name;
    echo $id;

    //$user = new User($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['pword']); 
    //$user -> setFirstName($name, $id);
    User::setFirstName($name, $id);
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
            <input type="submit" name = "fn" value = "submit">
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
          <form action="/action_page.php" class="form-container">
            <h3>Edit Last Name</h3>

            <label for="fname"><b>Last Name</b></label>
            <input type="name" placeholder="Enter new last name" name="fname" required>

            <button type="submit" class="btn">Submit</button>
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
          <form action="/action_page.php" class="form-container">
            <h3>Edit Email</h3>

            <label for="fname"><b>Email</b></label>
            <input type="name" placeholder="Enter new email" name="fname" required>

            <button type="submit" class="btn">Submit</button>
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
          <form action="/action_page.php" class="form-container">
            <h3>Edit Address</h3>

            <label for="fname"><b>Address</b></label>
            <input type="name" placeholder="Enter new address" name="fname" required>

            <button type="submit" class="btn">Submit</button>
          </form>
      </div>
      </dl>
</div>
</main>
</body>
</html>