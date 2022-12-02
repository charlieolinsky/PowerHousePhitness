<!DOCTYPE html>

<?php

// admin should be able to search a user by ID and edit their info or delete account

session_start();
include_once("../include/global_inc.php");


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find User</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<body style="background-color: var(--dark-color)">
  <main style="text-align: center">
          <div class="admin-title" style="margin-top: 200px">
              <h1 style="color: var(--primary-color)">Find a User</h1>
          </div>

          <div class="inventory-container" style="padding: 20px; margin-top: 115px">
            <dl>
            <form action="../forms/admin_edit_users.php" method="GET">   
              <h3>Enter User ID</h3>
              <br><br>

              <label for="userID"><b>User ID</b></label>
              <input type="name" placeholder="Enter a user ID" name="userID" required>
              <br>
              <input type="submit" class="btn cart-btn mt-3" name="getID" value="Submit">
              <!-- <input type="submit" name = "getID" value = "Submit"> -->
              <!-- <button type="submit" class="btn">Submit</button> -->
            </form>
          </div>

</main>
  <!-- Return Admin Home Button -->
    <div style="margin-top:300px; text-align: center">
      <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
    </div>

</body>
</html>
