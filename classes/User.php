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
// setters/getters
function getFirstName()
{
    return $this->firstName;
}
function getLastName()
{
    return $this->lastName;
}
function getId()
{
    return  $this->id;
}
function getAddress()
{
    return $this->getAddress;
}
function getEmail()
{
    return $this->email;
}
function getPhoneNumber()
{   return $this->phoneNumber;

}
function getPassword()
{   return $this->password;

}
function getLockerNumber()
{   return $this->lockerNumber;

}
function getLockerCombo()
{   return $this->lockerCombo;

}
function getMembershipLevel()
{   return $this->membershipLevel;

}
public function setFirstName($n)
{
    $this->firstName = $n;
}
function setLastName($n)
{
    $this->lastName = $n;
}
function setId($id)
{
    $this->id = $id;
}
function setAddress($add)
{
    $this->address = $add;
}
function setEmail($em)
{
    $this->email = $em;
}
function setPhoneNumber($pn)
{
    $this->phoneNumber = $pn;
}
function setPassword($pass)
{   $this->password = $pass;

}
function setLockerNumber($pass)
{   $this->password = $pass;

}
function setLockerCombo($pass)
{   $this->password = $pass;

}
function setMembershipLevel($pass)
{   $this->password = $pass;

}
function userDetails() // make this echo?
{
    return "Name: $this->name\n ID: $this->id\n Address: $this->address\n Email: $this->email\n Phone Number: $this->phoneNumber\n";
}
}
?>