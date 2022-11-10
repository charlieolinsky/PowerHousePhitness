<?php

// THIS INCLUDES ERROR HANDLING- password requirements, verify match, checks if a field was left empty 

class User {
//properties
private $id;
private $firstName; 
private $lastName;
private $address; // mailing/billing address ?
private $email;
private $phoneNumber;
private $password; //username will be email
private $lockerNumber; // default null -------------> table for locker # and combo pairs?
private $lockerCombo; // deafult null
private $membershipLevel; // default 1 (free member)

//methods
public function _User($n, $ln, $em, $pass)
{
    $this->firstName = $n;
    $this->lastName = $ln;
    $this->email = $em;
    $this->password = $pass;
}

public function createUser(){
    if (empty($_POST["fname"])) {
        die("Name is required");
    }
    if (empty($_POST["lname"])) {
        die("Name is required");
    }
    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }
    
    if (strlen($_POST["pword"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["pword"])) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["pword"])) {
        die("Password must contain at least one number");
    }
    
    if ($_POST["pword"] !== $_POST["vpword"]) {
        die("Passwords must match");
    }
    
    //Hashing object 
    //or
    //hashing in session class 
    $password_hash = password_hash($_POST["pword"], PASSWORD_DEFAULT);
    
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    $sql = "INSERT INTO user_login (email, passcode, fname, lname)
            VALUES (?,?,?,?)";

   $stmt = $mysqli->stmt_init();
    
    if ( ! $stmt->prepare($sql)) {   
        die("SQL error: " . $mysqli->error);
    }
    
    $stmt->bind_param("ssss",
                      $_POST["email"],
                      $password_hash,
                      ucfirst($_POST["fname"]),
                      ucfirst($_POST["lname"])); // upper case first letter 
     
                      try {
                        $stmt->execute();
                        header("Location: login.php");
                        exit;
                    } catch (mysqli_sql_exception $e) {
                        if ($e->getCode() == 1062) {
                            die("The email you entered is already in use");
                        }
                    }                  
}
// require forms on admin page 
public function removeUser($id) //move this to admin page ?
{
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db); 
    $sql = "DELETE FROM user_login WHERE USER_ID = ?";
}
public function setFirstName()
{  
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    $sql = "UPDATE user_login SET fname = ? WHERE user_id = ?";   

}
function setLastName()
{ 
      include_once("../sql/connect.php");
      $mysqli = new mysqli ($server, $dbusername, $password, $db);  
      
      $sql = "UPDATE user_login SET lname = ? WHERE user_id = ?";  
}
function setEmail()
{
      include_once("../sql/connect.php");
      $mysqli = new mysqli ($server, $dbusername, $password, $db);  
      
      $sql = "UPDATE user_login SET email = ? WHERE user_id = ?";  
}
function setPassword()
{      
  include_once("../sql/connect.php");
  $mysqli = new mysqli ($server, $dbusername, $password, $db);  
  
  $sql = "UPDATE user_login SET passcode = ? WHERE user_id = ?";  
}
function setMembershipLevel()
{    
  include_once("../sql/connect.php");
  $mysqli = new mysqli ($server, $dbusername, $password, $db);  
  
  $sql = "UPDATE user_login SET roles = ? WHERE user_id = ?";  
}
// 
function setAddress()
{   
    include_once("../sql/connect.php");
    $mysqli = new mysqli ($server, $dbusername, $password, $db);  
    
    $sql = "UPDATE user_address SET .................. = ? WHERE user_id = ?";  
}
}
?>