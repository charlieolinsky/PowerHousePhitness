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

  <body>
  <!-- <main>  -->
    <div class="equip-title">
        <h1 style="color: var(--primary-color)">My Account</h1>
        <a href="../UI/index.php">Return Home</a>
    </div>
   
      <!-- <div class = "account-info"> -->
      <div class="about-container">
        <div class="about-info">
          <h4>User ID: 
                  <?php
                    echo $s->read('user_id');
                  ?>
          </h4>
        </div>
      </div>
          <!-- <dl>
              <dt>User ID: 
                <?php
                  echo $s->read('user_id');
                ?>
              </dt> -->
              <dt>Name: 
                <?php
                  echo $s->read('fname')." ".$s->read('lname');
                ?>
              </dt>
              <dt>Email:
                <?php
                  echo $s->read('email');
                ?> 
              </dt>
              <dt>Address: 
                  <?php
                    $userID = $s->read('user_id');
                   // var_dump($userID);
                    $sql = "SELECT address1, address2, city, st, zip FROM `user_address` WHERE USER_ID = '$userID'";
                    $result = mysqli_query($dbconn, $sql);
                    $rows = $result->fetch_assoc();
                    //var_dump($rows);
                    $address = array($rows);
                    //echo $address[0];
                    if (!$rows['address1']==NULL){
                    echo ucwords($rows['address1']) . ucwords($rows['address2']) .", ". ucwords($rows['city']) .", ". strtoupper($rows['st']) .", ". $rows['zip'];
                    }
                    else 
                    {
                      echo "";
                    }
                  ?>
              <dt>Membership Level: 
                <?php
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
              <br>

              <!-- Edit -->
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
