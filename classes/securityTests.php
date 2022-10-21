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


    /*******************************HTTP ONLY COOKIES***************************************/

    //The below example is NOT an HTTP only cookie. Any user will have access to 
    //document.cookie

    /*
    $week = new DateTime('+1 week'); 
    setcookie('key', 'value', $week->getTimestamp());
    */

    //The below example is an HTTP cookie. doccument.cookie cannot be accessed. Only the developer can see it; echoed below. 
    $week = new DateTime('+1 week');
    setcookie('key', 'value', $week->getTimestamp(), '/', null, null, true);
    echo $_COOKIE['key'];

    

    /*****************************CSFR Protection*******************************************/
    
        //more research needed

    
    
    /*****************************SQL Injection*******************************************/

    $db = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');

    $email = "fakeemail@pos.com"; //Assume this comes from POST
    $attackEmail = "'';DROP TABLE testtable;"; 

    //this option allows SQL Injection:
    //$unsafe = $db->query("SELECT * FROM testtable WHERE email ='{$email}'");

    //this option protects against SQL Injections by using a PDO prepare statement and placeholder.
    
    $safe = $db->prepare("SELECT * FROM testtable WHERE email =:email");

    $safe->execute([
        'email' => $email,
    ]);
    
    /*****************************SQL Injection*******************************************/

?>