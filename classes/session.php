<?php 


    class Session
    {
        protected static $SESSION_AGE = 1800; //The number of seconds of inactivity before a session expires.
        
        /**********************CONSTRUCTORS********************/
        
        //Initializes a new secure session or resumes an existing session.
        public function __construct()
        {
            self::start(); 
        }
        
        /************************METHODS***********************/
        private static function start()
        {
            if (function_exists('session_status'))
            {
                if (session_status() == PHP_SESSION_DISABLED){
                    throw new Exception("Session Disabled Exception");
                }
            }
            
            if ( '' === session_id() )
            {
                $secure = true;
                $httponly = true;

                // Disallow session passing as a GET parameter.
                if (ini_set('session.use_only_cookies', 1) === false) {
                    throw new Exception("Session Use Only Cookies Exception");
                }

                // Mark the cookie as accessible only through the HTTP protocol.
                if (ini_set('session.cookie_httponly', 1) === false) {
                    throw new Exception("Session HTTP-Only Cookie Exception");
                }

                // Ensure that session cookies are only sent using SSL.
                // Requires a properly installed SSL certificate.
                $params = session_get_cookie_params();
                session_set_cookie_params(
                    $params['lifetime'],
                    $params['path'], 
                    $params['domain'],
                    $secure, 
                    $httponly
                );

                return session_start();
                return session_regenerate_id(true);

                // Helps prevent hijacking by resetting the session ID at every request.
                // Might cause unnecessary file I/O overhead?
                // TODO: create config variable to control regenerate ID behavior

                echo "DEBUG: session started";
                
            }   
        }
        

        //Writes a value to the current session data.
        public static function write($key, $value)
        {
            if (!is_string($key)){
                throw new Exception('Invalid Argument Type Exception: Session key must be string value');
            }
            self::start();
            $_SESSION[$key] = $value;
            self::age();
            
            return $value;
        }
        


        //Reads a specific value from the current session data.
        public static function read($key, $child = false)
        {
            if (!is_string($key)){
                throw new Exception('Invalid Argument Type Exception: Session key must be string value');
            }
            
            self::start();
            
            if (isset($_SESSION[$key]))
            {
                self::age();
                
                if (false == $child)
                {
                    return $_SESSION[$key];
                }
                else
                {
                    if (isset($_SESSION[$key][$child]))
                    {
                        return $_SESSION[$key][$child];
                    }
                }
            }
            return false;
        }

        
        //Deletes a value from the current session data.
        public static function delete($key)
        {
            if ( !is_string($key) )
                throw new Exception('Invalid Argument Type Exception: Session key must be string value');
            self::start();
            unset($_SESSION[$key]);
            self::age();
        }
        

        //Echos current session data
        public static function dump()
        {
            self::start();
            print_r($_SESSION);
        }
        


        //Expires a session if it has been inactive for a specified amount of time.
        private static function age()
        {
            $last = isset($_SESSION['LAST_ACTIVE']) ? $_SESSION['LAST_ACTIVE'] : false ;
            
            if (false !== $last && (time() - $last > self::$SESSION_AGE))
            {
                self::destroy();
                throw new Exception("Expired Session Exception");
            }
            $_SESSION['LAST_ACTIVE'] = time();
        }

        public static function containsKey($key): bool
        {
            if (!is_string($key))
                throw new Exception('Invalid Argument Type Exception: Session key must be a string value');
            
            if(isset($_SESSION[$key])){
                return true; 
            }else { 
                return false; 
            }
        }

        //Returns current session cookie parameters or an empty array.
        public static function params()
        {
            $r = array();
            if ( '' !== session_id() )
            {
                $r = session_get_cookie_params();
            }
            return $r;
        }
        


        //Closes the current session and releases session file lock.
        public static function close()
        {
            if ( '' !== session_id() )
            {
                return session_write_close();
            }
            return true;
        }
        


        //Removes session data/cookies and destroys the current session.
        public static function destroy()
        {
            if ( '' !== session_id())
            {
                $_SESSION = array();

                if (ini_get("session.use_cookies")) {
                    
                    $params = session_get_cookie_params();
                    setcookie(
                        session_name(), 
                        '', 
                        time() - 42000,
                        $params["path"], 
                        $params["domain"],
                        $params["secure"], 
                        $params["httponly"]
                    );
                }
                session_destroy();
            }
            header("Location: ../UI/loginUI.php"); 
        }    
    }

?>