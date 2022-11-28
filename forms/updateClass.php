<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        include_once("../include/global_inc.php");
        $s = new Session(); 

        //Fetch Post 
        $cName = $_POST['cName'];
        $iuid = $_POST['iuid'];
        $mCap= $_POST['mCap'];
        $sTime = $_POST['sTime'];
        $eTime = $_POST['eTime'];
        $cDay = $_POST['cDay'];
        $cPic = $_POST['cPic'];
        $cDesc = $_POST['cDesc'];

        //Fetch Session Data
        $classToEdit = $s->read('classes_dropdown');
        $tmp = $s->read('CLASS_ID');
        $class_id = $tmp['CLASS_ID'];

        //Remove Foreign Key Constraint
        $dbconn->query("SET FOREIGN_KEY_CHECKS=0");

        //Update Queries 
        $res = $dbconn -> query("SELECT * FROM classes"); 
        while($row = $res->fetch_assoc()){
            if($row['class_name'] == $classToEdit){
                
                if($cName != ''){
                    $stmt1 = $dbconn->prepare("UPDATE classes SET class_name=? WHERE CLASS_ID=$class_id");
                    $stmt1->bind_param("s", $cName);
                    try{$stmt1->execute();}catch(Exception $e){die("SQL ERROR cName");} 
                }
                if($iuid != ''){
                    $stmt2 = $dbconn->prepare("UPDATE classes SET iuid=? WHERE CLASS_ID=$class_id");
                    $stmt2->bind_param("s", $iuid);
                    try{$stmt2->execute();}catch(Exception $e){die("SQL ERROR iuid");} 
                }
                if($cPic != ''){
                    $stmt3 = $dbconn->prepare("UPDATE classes SET class_image=? WHERE CLASS_ID=$class_id");
                    $stmt3->bind_param("s", $cPic);
                    try{$stmt3->execute();}catch(Exception $e){die("SQL ERROR cPic");} 

                }
                if($mCap != ''){
                    $stmt4 = $dbconn->prepare("UPDATE classes SET class_max_capacity=? WHERE CLASS_ID=$class_id");
                    $stmt4->bind_param("s", $mCap);
                    try{$stmt4->execute();}catch(Exception $e){die("SQL ERROR mCap");} 

                }
                if($sTime != ''){
                    $stmt5 = $dbconn->prepare("UPDATE classes SET start_time=? WHERE CLASS_ID=$class_id");
                    $stmt5->bind_param("s", $sTime);
                    try{$stmt5->execute();}catch(Exception $e){die("SQL ERROR sTime");}
                }
                if($eTime != ''){
                    $stmt6 = $dbconn->prepare("UPDATE classes SET end_time=? WHERE CLASS_ID=$class_id");
                    $stmt6->bind_param("s", $eTime);
                    try{$stmt6->execute();}catch(Exception $e){die("SQL ERROR eTime");}

                }
                if($cDesc != ''){
                    $stmt7 = $dbconn->prepare("UPDATE classes SET class_description=? WHERE CLASS_ID=$class_id");
                    $stmt7->bind_param("s", $cDesc);
                    try{$stmt7->execute();}catch(Exception $e){die("SQL ERROR cDesc");}

                }
                if($cDay != ''){
                    $stmt7 = $dbconn->prepare("UPDATE classes SET class_day=? WHERE CLASS_ID=$class_id");
                    $stmt7->bind_param("s", $cDay);
                    try{$stmt7->execute();}catch(Exception $e){die("SQL ERROR cDay");}

                }
                //Add Foreign Key Constraint
                $dbconn->query("SET FOREIGN_KEY_CHECKS=1");

                header("Location: admin_select_class.php");
                die();  
                
            }
        }
        die("FATAL ERROR");

       
    }

?>