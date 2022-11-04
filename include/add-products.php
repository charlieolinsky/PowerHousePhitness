
<?php
// var_dump($_POST); //to confirm that the data was added 

include_once("../sql/connect.php");

// $prod_name = $_POST["prod_name"];
// if(isset($prod_name )){

// need to add validation for price, quantity, purchase cost. 
// need to figure out how to get an upload image 

    $sql = "INSERT INTO `prod-data` 
						(`prod_name`, 
                        `prod_desc`,
                        `prod_image`, 
                        `prod_price`, 
                        `prod_quantity`, 
                        `VENDOR_ID`, 
                        `prod_date_purchased`,
                        `prod_purchase_cost`)
    		VALUES ('".$_POST['prod_name']."', 
                    '".$_POST['prod_desc']."',
                    '".$_POST['prod_image']."',
                    '".$_POST['prod_price']."', 
                    '".$_POST['prod_quantity']."',
                    '".$_POST['VENDOR_ID']."',
                    '".$_POST['prod_date_purchased']."',
                    '".$_POST['prod_purchase_cost']."'
                    
                    )";

if ($dbconn->query($sql) === TRUE) {
	echo "New record created successfully";
  } else {
	echo "Error: " . $sql . "<br>" . $dbconn->error;
  }
// }


$dbconn->close();
?>