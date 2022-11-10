<!DOCTYPE html>

<?php

session_start();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");
?>




  <!-- The form -->
  <!-- <div class="form-popup" id="myForm">
          <form action="/action_page.php" class="form-container">
            <h1>Edit Name</h1>

            <label for="fname"><b>Name</b></label>
            <input type="name" placeholder="Enter new name" name="fname" required>

            <button type="submit" class="btn">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
  </div> -->



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
          <!-- A button to open the popup form -->
          <button class="open-button" onclick="openForm()">Edit</button>
           <!-- The form -->
      <div class="form-popup" id="myForm">
          <form action="/action_page.php" class="form-container">
            <h3>Edit Name</h3>

            <label for="fname"><b>Name</b></label>
            <input type="name" placeholder="Enter new name" name="fname" required>

            <button type="submit" class="btn">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
      </div>
        </dt>









        <dt>Email:
        <?php
          echo $_SESSION['email'];
        ?> 
        <button type="button"> Edit </button>
        </dt>
        <dt>Address: 
        <button type="button"> Edit </button>
        </dt>
        <dt>Phone Number: 
        <button type="button"> Edit </button>
        </dt>
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
        <button type="button"> Edit </button>
        </dt>
      </dl>
</div>
</main>
</body>
</html>