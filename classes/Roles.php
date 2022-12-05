<?php 
 
// Fin- access inventory, sales. Rep- return, refund, access user info? Admin-odering/shipping & receiving
// CUSTOMERS: view inventory, add cart, check out, access cust serv,
// 0 - Non-logged in 
// 1 - Free Member 
// 2 - Premium Member
// 3 - General Employee
// 4 - Finance Personnel 
// 5 - Admin


// Each page should have access(x, s) where x is the minimum level needed to acces the page. and s is the destination string if denied. 
// Ex) The financial report page should be accesssible to level 4 and 5, therefore it will say access(4, s),
// The access function dies if your level is less then specified rank, and allows access if you are > or = to rank.


    include_once("../include/global_inc.php");
     
    class Roles {
        // method to denote minimum rank to access the page 
        public static function minAccess($minRank, $loc)
        {
            $s = new Session();
            if(session_status() == PHP_SESSION_ACTIVE)
            {
                if($s->read("roles") < $minRank) 
                {
                    header("Location: ".$loc);
                    die();
                }
            }
            
        }
        // method to denote maximum rank to access the page 
        public static function maxAccess($maxRank, $loc)
        {
            $s = new Session();
            if(session_status() == PHP_SESSION_ACTIVE)
            {
                if($s->read("roles") > $maxRank) 
                {
                    header("Location: ".$loc);
                    die();
                }
            }
            
        }
    }

    


?>