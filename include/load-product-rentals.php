
<?php
include_once("../sql/connect.php");

$query = "SELECT * FROM `prod-data`;";
$result = $dbconn->query($query);


$dbconn->close();
?>

