
<?php
include_once("../sql/connect.php");

$query = "SELECT prod_name, prod_desc, prod_price FROM product_data;";
$result = $dbconn->query($query);


$dbconn->close();
?>
