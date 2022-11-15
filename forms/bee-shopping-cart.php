<?php

require_once("../sql/connect.php");
include_once("../classes/ShoppingCart_Class.php");

$cart = new ShoppingCart();
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


        <?php
        // LOOP TILL END OF DATA
        // $showCart = "SELECT * FROM cart WHERE ORDER_ID = $ORDER_ID";
        // // $showCart = "SELECT 'cart.ORDER_ID', `prod-data.prod_name` FROM cart 
        // // JOIN `prod-data` ON `cart.ORDER_ID` = `prod-data.prod_name` ";

        // $result = $dbconn->query($showCart);
        // // echo $showCart;

        // while ($rows = $result->fetch_assoc()) {
        // ?>
             <!-- <p>PROD_ID: <?php //echo $rows['PROD_ID']; ?></p> -->
             <!-- <p>ORDER_ID: <?php //echo $rows['ORDER_ID']; ?></p> -->

        <!-- //     <p>NAME:<?php //echo $rows['prod_name']; ?></p> -->

        <!-- //     <?php //echo "<img src=$rows[prod_image]>" ?>  -->



        <?php
        // }
        ?>

        <?php
        // include_once("../include/load-product-rentals.php");
        include("../include/add-to-cart.php");
        echo "in include";


        ?>


</body>


</html>