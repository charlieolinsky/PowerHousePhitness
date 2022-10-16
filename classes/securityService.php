<?php 
    namespace SecurityService;
    
    class SecurityService
    {
        private $formTokenLabel = 'csrf-token-label';
        private $sessionTokenLabel = 'csrf-sess-token-label';
        private $session = [];
        private $server = [];

        public function __construct(&$session = null, &$server=null)
        {

            if(! \is_null($server)) {
                $this->server = &$server;
            } 
            else {
                $this->server = &$_SERVER;
            }

            if(! \is_null($session)) {
                $this->session = &$session; 
            } 
            elseif(! \is_null($_SESSION) && isset($_SESSION)) {
                $this->session = &$_SESSION; 
            }
            else {
                throw new \Error('No session available');
            }
            
        }

        public function xss_safe($data) //protects data from XSS Attacks
        {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        public function getCSRFToken()
        {
            //generate random CSRF Token. 
            $token = bin2hex(random_bytes(32));
            return $token; 
            
        }
    }

?>