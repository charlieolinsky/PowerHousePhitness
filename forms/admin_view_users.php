<!DOCTYPE html>

<?php

// admin should be able to search a user by ID and edit their info or delete account_tab_edit

session_start();
include_once("../classes/User.php");
include_once("../classes/roles.php");
include_once("../sql/connect.php");


if (isset($_POST['getID'])) {
    $id = $_POST['userID'];
    $sql = "SELECT * FROM user_table WHERE USER_ID = '$id'";
    $result = $dbconn->query($sql);
    $user = $result->fetch_assoc();
    //var_dump($user);
} else {
    echo "Error finding user: " . $dbconn->error;
}
//var_dump($user);


?>


<html>
  <head>
    <title>Find or Edit a User</title>
  </head>
<body>
<main> 
<h1>Account Info</h1>
<div class = "account-info">
    <dl>
    <form action="../forms/admin_view_users.php" method="POST">   
            <h3>Find a user</h3>

            <label for="userID"><b>User ID</b></label>
            <input type="name" placeholder="Enter a user ID" name="userID" required>
            <input type="submit" name = "getID" value = "Submit">
            <!-- <button type="submit" class="btn">Submit</button> -->
          </form>
          <br>
        <dt>User ID: 
        <?php
          echo $user['USER_ID'];
        ?>
        </dt>
        <dt>Name: 
        <?php
          echo $user['fname'] . " " . $user['lname'];
        ?>
        </dt>
        <dt>Email:
        <?php
          echo $user['email'];
        ?> 
        </dt>
        <dt>Address: 
        <dt>Member Ship Level: 
        <?php
          if($user['roles'] == 1)
          {
            echo "Free Member";
          }
          else if($user['roles'] == 2)
          {
            echo "Premium Member";
          }
          else if($user['roles'] == 3)
          {
            echo "Representative"; 
          }
          else if($user['roles'] == 4)
          {
            echo "Finance Personnel";
          }
          else if($user['roles'] == 5)
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
