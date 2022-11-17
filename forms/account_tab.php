<!DOCTYPE html>

<?php

session_start();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");
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
        <dt>User ID: 
        <?php
          echo $_SESSION['user_id'];
        ?>
        </dt>
        <dt>Name: 
        <?php
          echo $_SESSION['fname'] . " " . $_SESSION['lname'];
        ?>
        </dt>
        <dt>Email:
        <?php
          echo $_SESSION['email'];
        ?> 
        </dt>
        <dt>Address: 
          <?php
          
          ?>
        <dt>Member Ship Level: 
        <?php
          if($_SESSION['role'] == 1)
          {
            echo "Free Member";
          }
          else if($_SESSION['role'] == 2)
          {
            echo "Premium Member";
          }
          else if($_SESSION['role'] == 3)
          {
            echo "Representative"; 
          }
          else if($_SESSION['role'] == 4)
          {
            echo "Finance Personnel";
          }
          else if($_SESSION['role'] == 5)
          {
            echo "Admin";
          }
        ?>
        <br>
        <a href="account_tab_edit.php">Edit</a>
        </dt>
      </dl>
</div>
</main>
</body>
</html>