<?php
    include_once('../include/global_inc.php'); 

    $session = new Session(); 

    echo "<h1>Test 2</h1><br>";

    echo "Status: ".session_status()."<br>"; 
    echo "ID: ".session_id();


    $session -> destroy(); 

    



?>