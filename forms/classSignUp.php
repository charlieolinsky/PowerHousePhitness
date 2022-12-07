<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        include_once('../include/global_inc.php');
        include_once('../sql/connect.php');
        Roles::minAccess(1, "../UI/loginUI.php");
        $s = new Session();

        //fetch class data
        $state = $s->read('state'); 

        //Match type of submission with selected Form.
        $i = 0;
        for($i; $i<100; $i++){
            if(isset($_POST['signUp_'.$i])){
                $submit = 'signUp_'.$i;
            }
            elseif(isset($_POST['cancel_'.$i])){
                $submit = 'cancel_'.$i; 
            }
        }

        //split into seperate pairs
        $split = explode('_', $submit);
        $submit = $split[0];
        $formID = $split[1]; 

        //Fetch Query Data 
        $formData = $state[$formID];

        $cName = $formData['class_name'];
        $cCap = $formData['current_capacity'];
        $mCap = $formData['max_capacity'];
        $cID = $formData['CLASS_ID'];
        $uID = $s->read('user_id');


        //Remove Foreign Key Constraint
        $dbconn->query("SET FOREIGN_KEY_CHECKS=0");

        if($submit == 'signUp'){

            //Add User to Class Attendance   //Update Current Capacity of Class
            $cCap += 1;
            $stmt1 = $dbconn->prepare(
                "INSERT INTO class_attendance (`USER_ID`, CLASS_ID) VALUES (?, ?);"
            );
            $stmt1->bind_param("ss", $uID, $cID);
            $stmt1->execute(); 

            $stmt2 = $dbconn->prepare(
                "UPDATE classes SET current_capacity=? WHERE CLASS_ID=?;"
            ); 
            $stmt2->bind_param("ss", $cCap, $cID);
            $stmt2->execute(); 
            //header(); 
        }
        elseif($submit == 'cancel'){
            
            if($cCap > 0){

                //Remove User from Class Attendance   //Update Current Capacity of Class
                $cCap -= 1;
                $stmt1 = $dbconn->prepare(
                    "DELETE FROM class_attendance WHERE `USER_ID`=? AND CLASS_ID=?;"
                );
                $stmt1->bind_param("ss", $uID, $cID);
                if($stmt1->execute()); 

                $stmt2 = $dbconn->prepare("UPDATE classes SET current_capacity=? WHERE CLASS_ID=?;"); 
                $stmt2->bind_param("ss", $cCap, $cID);
                $stmt2->execute();
                //header(); 
            }
        }

        //Add Foreign Key Constraint
        $dbconn->query("SET FOREIGN_KEY_CHECKS=1");
        header("Location: ../UI/services.php#classes");
        die(); 
    } 

?>