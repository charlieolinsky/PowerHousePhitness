
<?php

include_once("../sql/connect.php");

if(isset($_POST['prod_name']) and isset($_POST['prod_desc']) and isset($_POST['prod_name']) and  isset($_FILES['prod_image']['name'])  and isset($_POST['prod_price'])  
and isset($_POST['prod_quantity'])  and isset($_POST['VENDOR_ID']) and isset($_POST['prod_date_purchased']) and isset($_POST['prod_purchase_cost']) ){

  $prodname = $_POST['prod_name'];
  $desc = $_POST['prod_desc'];
  $img = $_FILES['prod_image']['name'];
  $price =  $_POST['prod_price'] ;
  $quant = $_POST['prod_quantity'] ;
  $vendor = $_POST['VENDOR_ID'];
  $purchdate = $_POST['prod_date_purchased'];
  $purchcost = $_POST['prod_purchase_cost'] ;


}          

$sql = "INSERT INTO `prod-data` 
(`prod_name`, 
`prod_desc`,
`prod_image`, 
`prod_price`, 
`prod_quantity`, 
`VENDOR_ID`, 
`prod_date_purchased`,
`prod_purchase_cost`)
VALUES 
( '$prodname', '$desc', '../UI/images/prod_images/".$_FILES['prod_image']['name']."', '$price',  '$quant', '$vendor', '$purchdate', '$purchcost')";





// include_once("../forms/admin-inventory-new.php");


// var_dump($_POST); //to confirm that the data was added 

if ($dbconn->query($sql) === TRUE) {
  // $_POST = array();
  echo "<p style='color:red; text-align:center'> New inventory item added successfully  <p>";
} else {
  echo "Error:" . $dbconn->error;
}


$dbconn->close();
?>

