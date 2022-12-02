
<?php

//if these fields are set we can contiune -- needed to avoid errors on PC
  if(isset($_POST['prod_name']) and isset($_POST['prod_desc']) and isset($_POST['prod_name']) and  isset($_FILES['prod_image']['name'])  and isset($_POST['prod_price'])  
  and isset($_POST['prod_quantity'])  and isset($_POST['VENDOR_ID']) and isset($_POST['prod_date_purchased']) and isset($_POST['prod_purchase_cost']) )
  {

      $dbconn->query("SET FOREIGN_KEY_CHECKS=0");

      //set the input variables
      $prodname = $_POST['prod_name'];
      $desc = $_POST['prod_desc'];
      $img = $_FILES['prod_image']['name'];
      $price =  $_POST['prod_price'] ;
      $quant = $_POST['prod_quantity'] ;
      $vendor = $_POST['VENDOR_ID'];
      $purchdate = $_POST['prod_date_purchased'];
      $purchcost = $_POST['prod_purchase_cost'] ;


      //query to insert item
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


    //run the query, if success then display success and refresh the page after 3 seconds
    if ($dbconn->query($sql) === TRUE) {
      echo "<meta http-equiv='refresh' content='3'>";
      echo "<p style='color:red; text-align:center'> New inventory item added successfully  <p>";

    } else {
      echo "Error:" . $dbconn->error;
    }


    $dbconn->query("SET FOREIGN_KEY_CHECKS=1");

    header("Location: ../forms/admin-inventory-new.php");
    

    $dbconn->close();
    die(); 

  }
?>

