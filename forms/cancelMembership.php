<?php

    include_once("../include/global_inc.php");
    $s = new Session();
    
    //Anyone above rank 2 will need to be demoted by admin
    Roles::maxAccess(2, "../UI/index.php"); 
 
    $userRank = $s->read('roles');
    $userID = $s->read('user_id');
    
    if($userRank == 2)
    {
        //echo "Downgrade Condtion met";
        
        $sql = $dbconn->prepare("UPDATE user_table SET roles=1 WHERE USER_ID=$userID");
        if(!$sql){
            die("Update Query Failed"); 
        }
        $s->write('roles', 1);

        header("Location: account_tab.php");
        die(); 
    }
    else{
       header("Location: ../UI/services.php#membership");
    }
    

    //echo "Session: ".$s->read('roles');
    //echo "DB: ".print_r($sql2 = $dbconn -> query("SELECT * FROM user_table WHERE USER_ID=$userID"));

?>