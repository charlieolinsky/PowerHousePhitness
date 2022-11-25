<?php
  include_once("../include/global_inc.php");  
  $s= new Session(); 
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

    <script>
      <?php
        Roles::access(1, "../UI/loginUI.php");
      ?>

    </script>

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
                    //Query Address Table
                    if ($dbconn -> connect_errno) {
                      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                      exit();
                    }

                    $id = $s->read("user_id");
                    $result = $dbconn -> query("SELECT * FROM user_address WHERE USER_ID=$id");

                    //not sure, something like this
                    if ($result->num_rows > 0) {
                      echo "Address 1: ".$result[0]."<br>";
                      echo "Address 2: <br>";
                      echo "City: <br>";
                      echo "State: <br>";
                      echo "Zipcode: <br>";
                      echo "Billing Address: ";
                      while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                      }
                    } else {
                      echo "No Address Info Found";
                    }

                    
                    
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
