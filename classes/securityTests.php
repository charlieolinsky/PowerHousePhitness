<?php 
    /*********************PREVENTING XSS ATTACKS********************************/

    $text = "<script> Attacker_JSCode </script>"; //dangerous JS code! Oh No!!!!
    
    function e($text){
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); 
    }

    $text = e($text."\n\n"); //our method causes any <script> tags to turn into harmless strings. 
    echo($text); 

    


    /************************PASSWORD HASHING**********************************/ 

    //When we register a user we generate a hash using the following method: 
    //The returned value is then stored in our DB.

    echo password_hash("urMom", PASSWORD_DEFAULT, ['cost' => 12])."\n\n"; 
    

    //How do we check if a user attempt matched the password in our DB? 
    $password = "$2y$12$2ME79OpCA7hx2WMLnJ1SfOzRIWQIqFfs56h1LVVZc62LGTMSlIknW"; //Value stored in a DB
    $passwordAttempt = "Mom";  

    //We use the following method: 

    $result = password_verify($passwordAttempt, $password);
    var_dump($result)."\n\n"; 




    /***************************DIRECTORY LISTING*******************************/

    //NOTE: this only applies to Apache servers. 

    



?>