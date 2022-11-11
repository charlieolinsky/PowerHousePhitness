<?php
    include_once("../classes/Session.php"); 

    $session = new Session(); 

    echo "STATUS: ".session_status();
    echo "ID: ".session_id(); 
    

    $session -> close(); 

    echo "STATUS: ".session_status()."\n";
    echo "ID: ".session_id(); 







?>