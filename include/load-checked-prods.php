
<?php

// connect to the DB
include_once("../sql/connect.php");

// query to get any items that are rented 
$query = "SELECT * FROM `prod-data` WHERE `total_rented`>0";
$result = $dbconn->query($query);


// if the return item button is clicked 
if (isset($_POST['return'])) {
    // set variables 
    $rented = $_POST['total_rented'];
    $so = $_POST['PROD_ID'];
    $instock = $_POST['prod_quantity'];
    $minus = 1;

    // create a query to return an item
    $checkin = "UPDATE `prod-data` SET total_rented=$rented-$minus WHERE PROD_ID=$so";
    // create a query to update the amount instock
    $updateInStock = "UPDATE `prod-data` SET prod_quantity=$instock+$minus WHERE PROD_ID=$so";

    // if both queries are successful refresh the page 
    if (mysqli_query($dbconn, $checkin) and mysqli_query($dbconn, $updateInStock)) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

$dbconn->close();
?>

