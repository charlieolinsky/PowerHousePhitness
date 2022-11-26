<?php
    include_once("../include/global_inc.php");

    //Retrieve Form Data
    $cName = $_POST['cName'];
    $iuid = $_POST['iuid'];
    $mCap= $_POST['mCap'];
    $sTime = mysqli_real_escape_string($dbconn, $_POST['sTime']);
    $eTime = mysqli_real_escape_string($dbconn, $_POST['eTime']);
    $cDay = $_POST['cDay'];
    $cPic = $_POST['cPic'];
    $cDesc = $_POST['cDesc'];

    //Remove Foreign Key Constraint
    $dbconn->query("SET FOREIGN_KEY_CHECKS=0");

    //prepare and bind
    $stmt = $dbconn->prepare(
        "INSERT INTO classes (class_name, iuid, class_description, class_image, class_max_capacity, start_time, end_time, class_day) 
        VALUES (?,?,?,?,?,?,?,?)"
    );
    $stmt->bind_param("ssssssss", $cName,$iuid,$cDesc,$cPic,$mCap, $sTime,$eTime,$cDay,);
    //Execute and handle error 
    try{
        $stmt->execute(); 
    }catch(Exception $e){
        $dbconn->query("SET FOREIGN_KEY_CHECKS=1");
        die($e->getMessage()); 
    }
    
    //Add Foreign Key Constraint
    $dbconn->query("SET FOREIGN_KEY_CHECKS=1");

    //Return to add another class 
    header("Location: admin_add_class.php");
    die(); 

?>