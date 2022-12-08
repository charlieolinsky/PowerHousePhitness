<!DOCTYPE html>

<?php

// admin should be able to search a user by ID and edit their info or delete account

session_start();
include_once("../include/global_inc.php");




if (isset($_GET['getID'])) {
  $id = $_GET['userID'];
  $sql = "SELECT COUNT(*) FROM user_table WHERE USER_ID = '$id'";
  $result = $dbconn->query($sql);
  while($row = mysqli_fetch_assoc($result))
 {
    $num_rows = $row['COUNT(*)'];
 }
  if($num_rows == 0)
  {
    echo "<p align = 'center', style = 'color:red'> USER NOT FOUND"; 
  }
  else 
  {
    $id = $_GET['userID'];
    $_SESSION["get_id"] = $id;
    header("Location: ../forms/admin_edit_users.php");
  }
}





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

<!-- Background color -->
<body style="background-color: var(--dark-color)">
<!-- Align 'main' to the center -->
  <main style="text-align: center">
        <!-- Title of page (postion, color, font, size) -->
          <div class="admin-title" style="margin-top: 100px">
              <h1 style="color: var(--primary-color)">Find a User</h1>
          </div>

          <!-- Conatiner holding all 'find a user' input & info -->
          <div class="inventory-container" style="padding: 20px; margin-top: 115px">
            <dl>
              <!-- form for admin to enter a user id  -->
              <!-- this form calls method from admin_edit_users.php -->
            <form action="../forms/admin_search_users.php" method="GET">   
              <!-- Container title -->
              <h3>Enter User ID</h3>
              <br><br>

              <!-- label and inputs for User ID -->
              <label for="userID"><b>User ID</b></label>
              <input type="name" placeholder="Enter a user ID" name="userID" required>
              <br>
              <!-- Submit button -->
              <input type="submit" class="btn cart-btn mt-3" name="getID" value="Submit">
            </form>
          </div>

</main>
  <!-- Return Admin Home Button -->
    <div style="margin-top:300px; text-align: center">
      <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
    </div>

</body>
</html>
