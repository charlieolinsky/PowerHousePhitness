<?php
    //NOTE: Ensure you have an include statement and a session starter as shown: 
    include_once("../include/global_inc.php");
    $s = new Session(); 

    /*
    
    To use Redirect, create a redirect object $r, and then enter four parameters as strings:
        1. A message describing why you've been redirected (error or otherwise)
        2. A URL where the user can be sent to next (generally the index or login page)
        3. A title for the doccument (appears at the top of the tab on the browser)
        4. The name of your redirect link. (name of param 2).

        SHOWN BELOW 
    */

    $r = new Redirect("
        Oops.. this is embarrasing :/ <br> Please try again later", 
        "../UI/index.php", 
        "Error", 
        "Return Home
    ");  
    
    header("Location: redirectPage.php"); //
?>