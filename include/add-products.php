
<?php
// var_dump($_POST); //to confirm that the data was added 


$prod_name = $_POST['prod_name'];
$prod_desc = $_POST['prod_desc'];
$prod_image = $_POST['prod_image'];
$prod_price = $_POST['prod_price']; 
$prod_quantity = $_POST['prod_quantity'];
$prod_vendor_id = $_POST['VENDOR_ID'];
$prod_purchase_date = $_POST['prod_date_purchased'];
$prod_purchase_cost = $_POST['prod_purchase_cost'];
// if(isset($prod_name )){

// echo $prod_name."<br>";
// echo $_POST['prod_name']."<br>";





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
    // $sql = "INSERT INTO prod-data 
		// 				(prod_name, 
    //                     prod_desc,
    //                     prod_image, 
    //                     prod_price, 
    //                     prod_quantity, 
    //                     VENDOR_ID, 
    //                     prod_date_purchased,
    //                     prod_purchase_cost)
    // 		        VALUES ('".$prod_name."', 
    //                     '".$prod_desc."',
    //                     '".$prod_image."', 
    //                     '".$prod_price."', 
    //                     '".$prod_quantity."', 
    //                     '".$prod_vendor_id."', 
    //                     '".$prod_purchase_date."',
    //                     '".$prod_purchase_cost."'
    //                 )";
                  
// echo "<br><br> stored query <br><br>"; 
// echo "<br><br>".$sql."<br><br>"; 

include_once("../forms/admin-inventory.php");

include_once("../sql/connect.php");




// $results = $dbconn->query($sql);
// echo $results."here";



if ($dbconn->query($sql) === TRUE) {
	echo "New record created successfully";
  } else {
	echo "Error: " . $sql . "<br>" . $dbconn->error;
  }
// }




$dbconn->close();
?>