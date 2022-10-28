
<?php
include_once("../sql/connect.php");

$query = "INSERT INTO product_data; VALUES ('".$_POST['prod_name']."')";

$result = $dbconn->query($query);

if($result === TRUE){
    echo "New Item Added";
}else {
    echo "Error: " . $query . "<br>" . $dbconn->error;
}



$dbconn->close();

?>





<?php

// if(isset($_POST['submit'])){

	//Load connecter
	// include_once('../sql/connect.php');

    // $query = "INSERT INTO 'product_data' (`prod_name')
    //     VALUES ('".$_POST['prod_name']."')";

	//Setup query
    // $query = "INSERT INTO `product_data` (`prod_name`, `prod_price`, `prod_desc`, `prod_quantity`, `VENDOR_ID`, `prod_data_purchased`, `prod_purchase_cost`)
    // 				VALUES ('".$_POST['prod_name']."', '".$_POST['prod_price']."', '".$_POST['prod_desc']."', '".$_POST['prod_desc']."', '".$_POST['prod_quantity']."', '".$_POST['vendor_id']."', '".$_POST['prod_date_purchased']."', '".$_POST['prod_purchase_cost']."')";


	// if ($dbconn->query($query) === TRUE) {
	// 	echo "New record created successfully";
	// } 
	// else {
	// 	echo "Error: " . $query . "<br>" . $dbconn->error;
	// }

	//Fetch the results
	// $result = mysqli_query($dbconn, $query)
	// 	or die("Couldn't execute query.");

// }

?>