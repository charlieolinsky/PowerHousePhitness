<?php
  include_once("../include/global_inc.php"); 
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Rental Portal</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

  <body>
  <!-- <main>  -->
    <div class="equip-title">
        <h1 style="color: var(--primary-color)">My Account</h1>
    </div>
   
      <!-- <div class = "account-info"> -->
      <div class="about-container">
        <div class="about-info">
          <h4>User ID: 
                  <?php
                    echo Session::read('user_id');
                  ?>
          </h4>
        </div>
      </div>
          <!-- <dl>
              <dt>User ID: 
                <?php
                  echo Session::read('user_id');
                ?>
              </dt> -->
              <dt>Name: 
                <?php
                  echo Session::read('fname')." ".Session::read('lname');
                ?>
              </dt>
              <dt>Email:
                <?php
                  echo Session::read('email');
                ?> 
              </dt>
              <dt>Address: 
                  <?php
                    //Session::dump(); 
                    $userID = Session::read('user_id');
                    //var_dump($userID);
                    $sql = "SELECT address1, city, st, zip FROM `user_address` WHERE USER_ID = '$userID'";
                    $result = mysqli_query($dbconn, $sql);
                    $rows = $result->fetch_assoc();
                    //var_dump($rows);
                    // $address = array($rows);
                    //    echo $address[0];
                    echo $rows['address1'] .", ". $rows['city'] .", ". $rows['st'] .", ". $rows['zip'];
                  ?>
              <dt>Membership Level: 
                <?php
                  if(Session::read('roles') == 1)
                  {
                    echo "Free Member";
                  }
                  else if(Session::read('roles') == 2)
                  {
                    echo "Premium Member";
                  }
                  else if(Session::read('roles') == 3)
                  {
                    echo "Representative"; 
                  }
                  else if(Session::read('roles') == 4)
                  {
                    echo "Finance Personnel";
                  }
                  else if(Session::read('roles') == 5)
                  {
                    echo "Admin";
                  }
                  else {
                    echo "Unregistered";
                  }
                ?>
              <br>
              <a href="account_tab_edit.php">Edit</a>

              <!-- Logout -->
              <a href="logout.php">Logout</a>
              </dt>
            </dl>
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
