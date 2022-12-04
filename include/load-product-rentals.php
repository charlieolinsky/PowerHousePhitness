
<?php
// connect to the DB
include_once("../sql/connect.php");

// select all the items in prod data 
$query = "SELECT * FROM `prod_data`;";
$result = $dbconn->query($query);

// close connection
$dbconn->close();
?>

