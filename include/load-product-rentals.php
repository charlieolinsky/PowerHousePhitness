
<?php
include_once("../sql/connect.php");

$query = "SELECT prod_name, prod_desc, prod_image, prod_price, prod_quantity FROM product_data;";
$result = $dbconn->query($query);


$dbconn->close();
?>
