<?php
  include_once("../include/global_inc.php");  
  $s= new Session(); 
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

    <script>
      <?php
        Roles::minAccess(1, "../UI/loginUI.php");
      ?>

    </script>

</head>

  <!-- setting background color -->
  <body style="background-color: var(--dark-color)">
  <!-- Page header title -->
    <div class="equip-title">
        <h1 style="color: var(--primary-color)">My Account</h1>
    </div>
   
  <!-- Login Information -->
    <div class="profile-container">
      <h2 style="color: var(--dark-color); font-size: 27px; margin-bottom: 20px; align-self: center">Login Information</h2>
        <div class="profile-info">
          <!-- USER ID -->
          <h4 style="color: var(--dark-color)">
                  User ID: 
                  <?php
                    echo $s->read('user_id');
                  ?>
          </h4>

          <!-- NAME -->
          <h4 style="color: var(--dark-color)">
                Name: 
                <?php
                  echo $s->read('fname')." ".$s->read('lname');
                ?>
          </h4>

          <!-- EMAIL -->
          <h4 style="color: var(--dark-color)">
                Email:
                <?php
                  echo $s->read('email');
                ?> 
          </h4>
        </div>
    </div>

    <!-- Membership Information -->
    <div class="profile-container">
      <!-- Setting color, font, and position of container title -->
      <h2 style="color: var(--dark-color); font-size: 27px; margin-bottom: 20px; align-self: center">Membership</h2>
        <div class="profile-info">
            <h4 style="color: var(--dark-color)">
              Membership Level: 
                  <?php
                  // displays the name of the role based on the number in the db
                    if($s->read('roles') == 1)
                    {
                      echo "Free Member";
                    }
                    else if($s->read('roles') == 2)
                    {
                      echo "Premium Member";
                    }
                    else if($s->read('roles') == 3)
                    {
                      echo "Representative"; 
                    }
                    else if($s->read('roles') == 4)
                    {
                      echo "Finance Personnel";
                    }
                    else if($s->read('roles') == 5)
                    {
                      echo "Admin";
                    }
                    else {
                      echo "Unregistered";
                    }
                  ?>
            </h4>
          </div>
    </div>

    <!--Shipping Information -->
    <div class="profile-container">
      <h2 style="color: var(--dark-color); font-size: 27px; margin-bottom: 20px; align-self: center">Shipping Information</h2>
        <div class="profile-info">
          <h4 style="color: var(--dark-color)">
            Address: 
                      <?php
                        $userID = $s->read('user_id');
                      // var_dump($userID);
                      $sql = "SELECT COUNT(*) FROM user_address WHERE USER_ID = '$userID'";
                      $result = $dbconn->query($sql);
                      while($row = mysqli_fetch_assoc($result))
                     {
                        $num_rows = $row['COUNT(*)'];
                     }
                      if($num_rows == 0) 
                      {
                        // if there is no stored address for this particular user
                       echo "No address on file";
                      }
                      else 
                    {
                      // if there is a stored address for the user, display address
                        $sql = "SELECT address1, address2, city, st, zip FROM `user_address` WHERE USER_ID = '$userID'";
                        $result = mysqli_query($dbconn, $sql);
                        $rows = $result->fetch_assoc();
                        //var_dump($rows);
                        $address = array($rows);
                        echo ucwords($rows['address1']) . ucwords($rows['address2']) .", ". ucwords($rows['city']) .", ". strtoupper($rows['st']) .", ". $rows['zip'];                      
                    }
                      ?>
          </h4>
        </div>
    </div> 

    <div class="options-container">
            <!-- Edit -->
            <a href="account_tab_edit.php" style="color: var(--primary-color)">Edit</a> 
            <!-- Return Home -->
            <a href="../UI/index.php" style="color: var(--primary-color)">Home</a>    
            <!-- Logout -->
            <a href="logout.php" style="color: var(--primary-color)">Logout</a>
        </div>



              
    <!-- </main> -->

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

  </body>
</html>
