<?php

require_once("../sql/connect.php");
// include_once("./include/add-to-cart.php");
// include_once("../classes/ShoppingCart_Class.php");

// $cart = new ShoppingCart();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/shoppingcart.css">


</head>

<body>
    <div class="container">
        <h1> SHOPPING CART </h1>
        <a href="../forms/equip-rental-member.php"> return to shopping</a> 



        <?php
        // include_once("./include/add-to-cart.php");

        // LOOP TILL END OF DATA
        // $order_id = ;
        // $showCart = "SELECT * FROM `cart` WHERE ORDER_ID = '86735'";
        // $showCart = "SELECT * FROM  cart A FULL OUTER JOIN `prod-data B` ON A.Key = B.Key WHERE ORDER_ID='86735'";
        // $showCart = "SELECT `cart.ORDER_ID`, `prod-data.prod_name` FROM cart 
        // JOIN `prod-data` ON `cart.ORDER_ID` = `prod-data.prod_name` ";

        // $result = $dbconn->query($sql);

        // $result = $dbconn->query($showCart);
        // echo $result;


        include_once("../include/add-to-cart2.php");

        while ($rows = $cartResult->fetch_assoc()) {
            include_once("../include/load-product-rentals.php");

            while ($row = $result->fetch_assoc()) {

        ?>
                <div>
                    <p>PROD_ID: <?php echo $rows['PROD_ID'];  ?></p>
                    <p>ORDER_ID: <?php echo $rows['ORDER_ID']; ?></p>

                    <p>NAME: <?php echo $row['prod_name']; ?></p>

                    <p>Quantity: <?php echo $rows['quantity']; ?></p>
                    <p>Price: <?php echo $rows['item_cost']; ?></p>



                    <?php echo "<img src=$row[prod_image]>"; ?>
                    <div>




                <?php
            }
        }
// 
                ?>

                <?php


                ?>


</body>


</html>