<?php
    //USE EXAMPLE

    //Place the following statement in place of a die() method or other redirect. 

    // $r = new Redirect($e, "../UI/index.php", "Error", "Return Home");  
    // header("Location: redirectPage.php");
    
    include_once("../include/global_inc.php");
    class Redirect {
        private $msg;      //what message to display 
        private $nextName; //What is the name of the place the user can go next
        private $nextUrl;  //What is the URL of the place the user can go next
        private $docTitle; //document title 
        
        function __construct($m, $url, $doc, $n)
        {
            $msg = $m;
            $nextUrl = $url; 
            $docTitle = $doc; 
            $nextName = $n; 

            $s = new Session(); 
            $s->write("msg", $m); 
            $s->write("nextUrl", $url);
            $s->write("docTitle", $doc);
            $s->write("nextName", $nextName);
        }

        function getMessage(){
            return $this->msg;  
        }
        function getNextURL(){
            return $this->nextUrl;  
        }
        function getDocTitle(){
            return $this->docTitle;  
        }
        function getNextName(){
            return $this->nextName;  
        }
    }
?>

