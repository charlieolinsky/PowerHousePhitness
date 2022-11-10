

<?php
include_once("../sql/connect.php");

$query = "SELECT * FROM `prod-data` WHERE `is_rented`=1";
$result = $dbconn->query($query);


$dbconn->close();
?>