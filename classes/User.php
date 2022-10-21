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
function createUser(){

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
    
    if ($_POST["pword"] !== $_POST["vword"]) {
        die("Passwords must match");
    }
    
    $password_hash = password_hash($_POST["pword"], PASSWORD_DEFAULT);
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "INSERT INTO basic_users (id, firstName, lastName, address, email, phoneNumber, password, lockerNumber, lockerCombo, membershipLevel)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = $mysqli->stmt_init();
    
    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    
    $stmt->bind_param("sss",
                      $_POST["name"],
                      $_POST["email"],
                      $password_hash);
                      
    if ($stmt->execute()) {
    
        header("Location: signup-success.html");
        exit;
        
    } else {
        
        if ($mysqli->errno === 1062) {
            die("email already taken");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
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
function setFirstName($n)
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