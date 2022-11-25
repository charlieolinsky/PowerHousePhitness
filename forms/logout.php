
<?php
    include_once("../include/global_inc.php");
    
    //Destroys Session
    $s = new Session();
    $s->destroy(); 

    //Send user back to login
    header("Location: login.php");
    die(); 


?>