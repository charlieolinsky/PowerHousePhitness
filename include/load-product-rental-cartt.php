<?php
include_once("../sql/connect.php");


//"SELECT * FROM cart WHERE ORDER_ID = '$ORDER_ID'";

$query = "SELECT * FROM 'prod-data' WHERE ORDER_ID = '$ORDER_ID'";
$result2 = $dbconn->query($query);


$dbconn->close();
?>