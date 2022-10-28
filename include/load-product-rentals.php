
<?php
include_once("../sql/connect.php");

$query = "SELECT * FROM product_data;";
$result = $dbconn->query($query);


$dbconn->close();
?>

