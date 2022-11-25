<?php 
    /*****************************************MEMBERSHIP BACKEND**************************************/

    include_once("../include/global_inc.php");
    $s = new Session(); 
    
    if(session_status() == PHP_SESSION_ACTIVE){

        Roles::access(1, "../UI/loginUI.php"); 


        //Check filled out. 
        if (empty($_POST["cBox1"] && empty($_POST["cbox2"]))) {
            die("Please select a membership option");
        }

        //Check email exists in DB
        $email = trim($_POST['cf-email']);
        $stmt = $dbconn -> prepare("SELECT * FROM user_table WHERE email=?");

        //check for db error 
        if (!$stmt){   
            die("SQL error: " . $dbconn->error);
        }

        //bind values to prepared statement 
        $stmt -> bind_param("s", $email); 
        
        //attempt query, throw error if email is unregistered 
        $stmt -> execute();
        $res = $stmt->get_result(); 
        $row = $res->fetch_assoc(); 

        if($row == 0){
            die("Oops! The email you entered is not registered with PHP. Please try again."); 
        }

        //If the user is registered already as a free-member, we need to upgrade their membership.
        $userID = $s->read('user_id');
        $userRank = $s->read('roles');
        
        if($userRank == 1){ 
            $res = $dbconn -> query("UPDATE user_table SET roles = 2 WHERE USER_ID = $userID");

            if($res){
                //echo "DEBUG: HEADER REACHED";
                header("Location: memberSuccess.php");
                die();  
            }
            else{
                die("Update Query Failed");
            }
        }
        else{
            header("Location: memberAlready.php");
        }
    }
    else {
        header("Location: ../UI/loginUI.php");
        
    }
?>