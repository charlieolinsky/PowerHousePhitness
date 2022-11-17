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
    
    $sql = "INSERT INTO user_table (email, passcode, fname, lname)
            VALUES (?,?,?,?)";

   $stmt = $mysqli->stmt_init();
    
    if ( ! $stmt->prepare($sql)) {   
        die("SQL error: " . $mysqli->error);
    }
    $fname = ucfirst($_POST["fname"]);
    $lname = ucfirst($_POST["lname"]);

    $stmt->bind_param("ssss",
                      $_POST["email"],
                      $password_hash,
                      $fname,
                      $lname); // upper case first letter 
     
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
public static function removeUser($id)
{
    include("../sql/connect.php");

    $sql = "DELETE FROM user_table WHERE USER_ID = $id";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
}
public static function setFirstName($fn, $id)
{  
    include("../sql/connect.php");

    $sql = "UPDATE user_table SET fname = '$fn' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    
    // Old code that gave errors 
    // $sql = $dbconn -> prepare("UPDATE user_table SET fname = '$fn' WHERE USER_ID = '$id'");    
 
    // $stmt = $mysqli->stmt_init();
    
    // if ( ! $stmt->prepare($sql)) {   
    //     die("SQL error: " . $mysqli->error);
    // } 
    // $stmt->bind_param("si", $fn, $id);
    //                     $stmt->execute();
    //                     header("Location: welcome.php");
    //                     exit;                 
}
public static function setLastName($ln, $id)
{ 
    include("../sql/connect.php");

    $sql = "UPDATE user_table SET lname = '$ln' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
}
public static function setEmail($em, $id)
{
    include("../sql/connect.php");

    $sql = "UPDATE user_table SET fname = '$em' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        } 
}
public static function setPassword($pass, $id)
{      

    include("../sql/connect.php");

    $password_hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "UPDATE user_table SET passcode = '$password_hash' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        } 
}
public static function setMembershipLevel($role, $id)
{    
    //NOT DONE
    var_dump($id);
    include("../sql/connect.php");

    $sql = "UPDATE user_table SET roles = '$role' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            echo "Record updated successfully";
            //header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
}
// 
public static function setAddress()
{   
    //NOT DONE 
    include("../sql/connect.php");

    $sql = "UPDATE user_table SET fname = '$fn' WHERE USER_ID = '$id'";
        if ($dbconn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            header("Location: ../forms/login.php"); //ui/index.php
            exit;
        } else {
            echo "Error updating record: " . $dbconn->error;
        } 
}
}
?>