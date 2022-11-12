<?php
    include_once("../include/global_inc.php"); 

    $session = new Session(); 

    echo "<h1>Test 1</h1><br>";
    echo ("STATUS: ".session_status()."<br>"); 
    echo ("ID: ".session_id()."<br>"); 

    echo ("Cookie Parameters: <br>");

    //setcookie();

    $parameters = $session->params();
    foreach($p as $value){
        echo "$value <br>";
    }
    

    // $session -> destroy();  

    // echo (" STATUS: ".session_status()."<br>");
    // echo (" ID: ".session_id()."<br>"); 







?>