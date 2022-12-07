<?php

// THIS INCLUDES ERROR HANDLING- password requirements, verify match, checks if a field was left empty 

class User {

//properties
private $id;
private $firstName; 
private $lastName;
private $address;
private $email;
private $phoneNumber;
private $password;
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
    
    /********************Check Fields from the register form ***************/
    if (strlen($_POST["fname"]) > 30) { // makes max length for first name = 30
        die("<p align = 'center', style = 'color:red'> Name must not exceed 30 characters");
    }

    if (!ctype_alpha($_POST["fname"])) { // verifies first name contains letters only 
        die("<p align = 'center', style = 'color:red'> Name may only contain letters");
    }

    if (strlen($_POST["lname"]) > 30) { // makes max length for last name = 30
        die("<p align = 'center', style = 'color:red'> Last name must not exceed 30 characters");
    }

    if (!ctype_alpha($_POST["lname"])) { // verifies last name contains letters only 
        die("<p align = 'center', style = 'color:red'> Name may only contain letters");
    }

    if (strlen($_POST["pword"]) < 8) { // makes min length for password = 8
        die("<p align = 'center', style = 'color:red'> Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["pword"])) { // verifies password contains at least one letter 
        die("<p align = 'center', style = 'color:red'> Password must contain at least one letter");

    }
    
    if ( ! preg_match("/[0-9]/", $_POST["pword"])) { // verifies password contains at least one number
        die("<p align = 'center', style = 'color:red'> Password must contain at least one number");
    }
    
    if ($_POST["pword"] !== $_POST["vpword"]) { // verifies passwords match
        die("<p align = 'center', style = 'color:red'> Passwords do not match");
    }


    /******Include Security Class*********************/
    
    include_once("../classes/SecurityService.php");
    $password_hash = SecurityService::hp($_POST['pword']);

    
    /***********Begin Query ************************/
    include_once("../sql/connect.php");  

    // added new user to the database
    $stmt = $dbconn -> prepare("INSERT INTO user_table (email, passcode, fname, lname)
            VALUES (?,?,?,?)"); // these are placeholders to be filled in on line 75
    
    if (!$stmt){   
        die("SQL error: " . $dbconn->error);
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
                        header("Location: ../UI/loginUI.php");
                        exit;
                    } catch (mysqli_sql_exception $e) {
                        if ($e->getCode() == 1062) {
                           echo "<p align = 'center', style = 'color:red'> EMAIL ALREADY IN USE";
                        }
                    }                  
}

public static function removeUser($id)
{
    include("../sql/connect.php");

    //Disable foreign key checks to allow for user deletion 
    $DB_EDIT_1 = $dbconn->query("SET FOREIGN_KEY_CHECKS=0");
    if(!$DB_EDIT_1){echo "DB_EDIT_1 Failed: Foreign Key Error";}

    //Query - deleting user from db
    $sql = "DELETE FROM user_table WHERE USER_ID = $id;"."DELETE FROM user_address WHERE USER_ID = $id";
    if ($dbconn->multi_query($sql) === TRUE) {
        //echo "Record updated successfully";
        header("Location: ../UI/loginUI.php"); //ui/index.php
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
    
    //Re-enable foriegn key checks 
    $DB_EDIT_2 = $dbconn->query("SET FOREIGN_KEY_CHECKS=1");
    if(!$DB_EDIT_2){echo "DB_EDIT_2 Failed: Foreign Key Error";}

    die();
}
public static function adminRemoveUser($id)
{
    include("../sql/connect.php");
    // deleting user from db
    $sql = "DELETE FROM user_table WHERE USER_ID = $id";
    if ($dbconn->query($sql) === TRUE) {
        header("Location: ../forms/admin_search_users.php"); //ui/index.php
        exit;
    } else {
        echo "Error updating record: " . $dbconn->error;
    }

}
public static function setFirstName($fn, $id)
{  
    // method for a user or admin to re-set name
    include("../sql/connect.php");

    $sql = $dbconn->query("UPDATE user_table SET fname = '$fn' WHERE USER_ID = '$id'");     
}
public static function setLastName($ln, $id)
{ 
    // method for a user or admin to re-set last name
    include("../sql/connect.php");

    $sql = $dbconn->query("UPDATE user_table SET lname = '$ln' WHERE USER_ID = '$id'");
}
public static function setPassword($pass, $id)
{      
    // method for a user or admin to re-set password
    include("../sql/connect.php");

    $password_hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = $dbconn->query("UPDATE user_table SET passcode = '$password_hash' WHERE USER_ID = '$id'");
}
public static function setMembershipLevel($role, $id)
{    
    // method for admin to change a users role
    include("../sql/connect.php");

    $sql = $dbconn->query("UPDATE user_table SET roles = '$role' WHERE USER_ID = '$id'");
}
}
?>