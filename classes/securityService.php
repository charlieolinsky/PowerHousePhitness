<?php 
    class SecurityService
    {
        private $formTokenLabel = 'csrf-token-label';
        private $sessionTokenLabel = 'csrf-sess-token-label';
        private $session = array();
        private $server = array();

        public function __construct($sess, $serv)
        {

            if(!isset($server)) {
                $this->server = $serv;
            } 
            else {
                throw new \Error('No server available');
            }

            if(!isset($session)) {
                $this->session = $sess; 
            } 
            else {
                throw new \Error('No session available');
            }
            
        }

        

        //XSS Protection 
        public function xss_safe($data) //protects data from XSS Attacks
        {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }



        //HTTP Only Cookies
        public function safeCookie($key, $value){
            $week = new DateTimeImmutable('+1 Hour'); 
            setcookie($key, $value, $week->getTimestamp(), '/', null, null, true);
        }



        //Password Hashing and Verification 
        public function hp($pass)
        {
            return password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
        }
        public function vp($attempt, $password)
        {
            return password_verify($attempt, $password); 
        }



        //CSRF Protection 
        public function getCSRFToken()
        {
            //generate random CSRF Token. 
            $token = bin2hex(random_bytes(32));
            return $token; 
            
        }
    }

?>