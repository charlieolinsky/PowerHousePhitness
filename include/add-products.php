
<?php

//if these fields are set we can contiune -- needed to avoid errors on PC
if (
  isset($_POST['prod_name']) and isset($_POST['prod_desc']) and isset($_POST['prod_name']) and  isset($_FILES['prod_image']['name'])  and isset($_POST['prod_price'])
  and isset($_POST['prod_quantity'])  and isset($_POST['VENDOR_ID']) and isset($_POST['prod_date_purchased']) and isset($_POST['prod_purchase_cost'])
) {

  $dbconn->query("SET FOREIGN_KEY_CHECKS=0");

  //  QUERY TO INSERT ITEM 
  $sql = $dbconn->prepare("INSERT INTO `prod_data` 
(`prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `prod_date_purchased`, `prod_purchase_cost`)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


  $sql->bind_param("sssiiisi", $prodname, $desc, $img, $price, $quant, $vendor, $purchdate, $purchcost);

  //if the data validation is good begin executing the query
  if (
    !isset($name_error) and !isset($desc_error) and !isset($price_error) and !isset($quantity_error)
    and !isset($purchase_date_error) and !isset($purchase_cost_error) and !isset($vendor_error)
  ) {
    // SETTING THE VARIABLES
    $prodname = $_POST['prod_name'];
    $desc = $_POST['prod_desc'];
    $img = "../UI/images/prod_images/" . $_FILES['prod_image']['name'];
    $price =  $_POST['prod_price'];
    $quant = $_POST['prod_quantity'];
    $vendor = $_POST['VENDOR_ID'];
    $purchdate = $_POST['prod_date_purchased'];
    $purchcost = $_POST['prod_purchase_cost'];

    // EXECUTING THE QUERY!
    $sql->execute();
    echo "<p style='color:red; text-align:center'> New inventory item added successfully  <p>";
  }

  $dbconn->query("SET FOREIGN_KEY_CHECKS=1");


  $dbconn->close();
  die();
}
?>

