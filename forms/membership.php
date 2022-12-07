<?php 
    /*****************************************MEMBERSHIP BACKEND**************************************/
    include_once("../include/global_inc.php");
    $s = new Session(); 
    
    if(session_status() == PHP_SESSION_ACTIVE){

        Roles::minAccess(1, "../UI/loginUI.php"); 

        //Ensure an option was selected
        if(!isset($_POST['cBox1']) && !isset($_POST['cBox2'])){
            $r = new Redirect("Please select a membership option.","../UI/services.php","ERROR","Return to Services"); 
            header("Location: redirectPage.php");
            die();
        }

        $email = trim($_POST['cf-email']);
        try {
            $stmt = $dbconn -> prepare("SELECT * FROM user_table WHERE email=?");
        } catch (Exception $e){
            $r = new Redirect($e->getMessage(),"../UI/index.php","ERROR","Return to Home"); 
            header("Location: ../forms/redirectPage.php");
            die();
        }

        //bind values to prepared statement 
        $stmt -> bind_param("s", $email); 
        
        //attempt query, throw error if email is unregistered 
        try{
            $stmt -> execute();
        } catch(Exception $e){
            $r = new Redirect($e->getMessage(),"../UI/index.php","ERROR","Return to Home"); 
            header("Location: ../forms/redirectPage.php");
            die();
        }
        $res = $stmt->get_result(); 
        $row = $res->fetch_assoc(); 

        if($row == 0){
            $r = new Redirect("Oops! The email you entered is not registered with PHP.<br> Please try again.","../UI/services.php","ERROR","Return to Services"); 
            header("Location: ../forms/redirectPage.php");
            die();
        }

        //If the user is registered already as a free-member, we need to upgrade their membership.
        $userID = $s->read('user_id');
        $userRank = $s->read('roles');
        
        //query
        if($userRank == 1){ 
            $res = $dbconn -> query("UPDATE user_table SET roles = 2 WHERE USER_ID = $userID");
            //update role in session
            $s->write('roles', 2);

            if($res){
                $r = new Redirect("You are now a Premium Member!<br> Thank you for choosing PHP","../UI/index.php","Thank You!","Return Home"); 
                header("Location: ../forms/redirectPage.php");
                die();
            }
            else{
                $r = new Redirect("There was a problem on our end... this is awkward","../UI/index.php","ERROR","Return Home"); 
                header("Location: ../forms/redirectPage.php");
                die();
            }
        }
        else{
            $r = new Redirect("You are already a Premium Member! <br>Thank you for choosing PHP","../UI/index.php","Thank You!","Return Home"); 
            header("Location: ../forms/redirectPage.php");
            die();
        }
    }
    else {
        header("Location: ../UI/loginUI.php");
        die(); 
    }
?>