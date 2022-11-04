<?php 

    class Session {

        private $session_data; 

        //begin by:
        //1. utilize collected data to create session cookies. It will be stored in an array. Cookies help to avoid IP Spoofing. 
        // You can check for matching cookies to verify users.  
        //2.

        public function _Session(){

            $this->session_data = []; 

        }



        public function startSession(){

            session_start(); 
        }
        public function endSesssion(){

        }

        public function sessionTimeout() {
            
            //Store all session data 
            //log off the user
            //delete cookies / kill session

            //use a simple javaScript pop up. alert(). 
        }

        //handle errors
        //could make error handling class seperatly but the sessions class should throw errors. 
        
        //setting timer
        
        //ability to access DB 
        //Ex. when something is added to the cart, the sessions class should call the shopping cart function that 
        //adds it to the DB.

        //https://gist.github.com/Nilpo/5449999

        




    }

?>