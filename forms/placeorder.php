<?php
require_once("../classes/ShoppingCart.php");

//go through each item in the cart and grab its original quantity from the prod data table
foreach ($_SESSION['cart'] as $key => $val) {
    //get the quanitity for that product 
    $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
    $result = $dbconn->query($query);
    //for each prod in the array
    while ($row = $result->fetch_assoc()) {

        //if the place order button is clicked 
        if (isset(($_POST['placeorder']))) {
            $instock = $row['prod_quantity'];
            //update the prod quantity in the prod-data table 
            $updateInStock = "UPDATE `prod-data` SET prod_quantity=$instock-$val WHERE PROD_ID=$key";
            if ($dbconn->query($updateInStock) === TRUE) {
                // echo "quantity decreased";
            }
                unset($_SESSION['order_id']);
                $_SESSION['cart'] = array();
        
        }
    }

}

?>






<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>
    <div class="placeorder content-wrapper">
        <h1>Your Order Has Been Placed</h1>
        <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
        <a href="../forms/equip-rental-member.php"> Return to Shopping </a>

    </div>
</body>

</html>