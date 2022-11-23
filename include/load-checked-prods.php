

<?php
include_once("../sql/connect.php");

$query = "SELECT * FROM `prod-data` WHERE `total_rented`>0";
$result = $dbconn->query($query);




if (isset($_POST['return'])) {
    // echo "<meta http-equiv='refresh' content='0'>";

    $rented = $_POST['total_rented'];
    $so = $_POST['PROD_ID'];
    $minus = 1;

    // $updatename = "UPDATE `prod-data` SET prod_name='$_POST[prod_name]' WHERE PROD_ID=$so";
    // $updatedesc = "UPDATE 'prod-data' SET prod_desc=$prod_desc WHERE PROD_ID=$so";
    // $checkin = "UPDATE `prod-data` SET (total_rented = $rented-1) WHERE PROD_ID =$so";
    $checkin = "UPDATE `prod-data` SET total_rented=$rented-$minus WHERE PROD_ID=$so";
 
    if (mysqli_query($dbconn, $checkin)) {
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

$dbconn->close();
?>