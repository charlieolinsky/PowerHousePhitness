<!-- Original copy of Christina's account_tab.php with no UI applied -->
<?php
  include_once("../include/global_inc.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account Tab</title>
</head>

<body>
  <main> 
    <h1>My Account</h1>
      <div class = "account-info">
          <dl>
              <dt>User ID: 
                <?php
                  echo Session::read('user_id');
                ?>
              </dt>
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
                  ?>
              <dt>Member Ship Level: 
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
    </main>
  </body>
</html>
