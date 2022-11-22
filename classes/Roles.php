<?php 

// IN GLOBAL INCLUDES FILE 
// admin.php, finance.php, rep.php <-- pages for certain people 
// Fin- access inventory, sales. Rep- return, refund, access user info? Admin-odering/shipping receiving?
// CUSTOMERS: view inventory, add cart, check out, access cust serv,
// 0 - non-logged in 
// 1 - freemember 
// 2 - paidmember
// 3 - gen employee / representative
// 4 - financial 
// 5 - admin

// $_SESSION["ACCESS"]["nonLoggedIn"] = isset($_SESSION['role']) && $_SESSION['role'] == '0'; //global from login
// $_SESSION["ACCESS"]["freeMember"] = isset($_SESSION['role']) && $_SESSION['role'] == '1';
// $_SESSION["ACCESS"]["paidMember"] = isset($_SESSION['role']) && $_SESSION['role'] == '2';
// $_SESSION["ACCESS"]["generalEmployee"] = isset($_SESSION['role']) && $_SESSION['role'] == '3';
// $_SESSION["ACCESS"]["financePersonnel"] = isset($_SESSION['role']) && $_SESSION['role'] == '4';
// $_SESSION["ACCESS"]["admin"] = isset($_SESSION['role']) && $_SESSION['role'] == '5';

//var_dump($_SESSION);

// Each page should have access(x, s) where x is the minimum level needed to acces the page. and s is the destination string if denied. 
// Ex) The financial report page should be accesssible to level 4 and 5, therefore it will say access(4),
// The access function dies if your level is less then specified rank, and allows access if you are > or = to rank.


    include_once("../include/global_inc.php");
    class Roles {
        public static function access($minRank, $loc)
        {
            if(!empty(session_id()))
            {
                if(Session::read("roles") < $minRank) 
                {
                    header("Location: ".$loc);
                    die;
                }
            }
            
        }
    }

    


?>