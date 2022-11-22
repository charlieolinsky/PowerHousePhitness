<?php

    include_once("../include/global_inc.php");

    $sampleData = "Wouldnt want anyone to see this from a browser..."; 

    $safe = new SecurityService(session_id(), $dbconn); 
    $safe -> safeCookie('sampleKey', $sampleData); 

    echo nl2br("Cookie Data: ").print_r($_COOKIE); 
?>