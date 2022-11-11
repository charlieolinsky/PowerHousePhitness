

<?php
include_once("../sql/connect.php");

$query = "SELECT * FROM `prod-data` WHERE `total_rented`>0";
$result = $dbconn->query($query);


$dbconn->close();
?>