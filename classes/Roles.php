<?php 

// ADD TO GLOBAL INCLUDES FILE 
// admin.php, finance.php, rep.php <-- pages for certain people 
// every page with restrictions will need to include access.php 
// Fin- access inventory, sales. Rep- return, refund, access user info? Admin-odering/shipping receiving?
// CUSTOMERS: view inventory, add cart, check out, access cust serv,
// 0 - non-logged in 
// 1 - freemember 
// 2 - paidmember
// 3 - gen employee 
// 4 - financial 
// 5 - admin

$_SESSION["ACCESS"]["nonLoggedIn"] = isset($_SESSION['role']) && $_SESSION['role'] == '0'; //global from login
$_SESSION["ACCESS"]["freeMember"] = isset($_SESSION['role']) && $_SESSION['role'] == '1';
$_SESSION["ACCESS"]["paidMember"] = isset($_SESSION['role']) && $_SESSION['role'] == '2';
$_SESSION["ACCESS"]["generalEmployee"] = isset($_SESSION['role']) && $_SESSION['role'] == '3';
$_SESSION["ACCESS"]["financePersonnel"] = isset($_SESSION['role']) && $_SESSION['role'] == '4';
$_SESSION["ACCESS"]["admin"] = isset($_SESSION['role']) && $_SESSION['role'] == '5';

//echo "Free member? ";
//var_dump($_SESSION);

function access($rank)
{ 
    if(!isset($_SESSION["ACCESS"]))
    {
        header("Location: denied.php");
        die;
    }
    if(!$_SESSION["ACCESS"]["ADMIN"])
    {
        header("Location: denied.php");
        die;
    }

}

?>