<?php



// Includes the database connection file
include_once("../sql/connect.php");



if (isset($_SESSION['fname'])) {
    echo "Hi, " . $_SESSION['fname'];
}


// if the addToCart Button is clicked
if (isset($_POST['addToCart'])) {
    //variabvle for prod_id
    $so = $_POST['PROD_ID'];
    //grabbing the prod price from the inventory form
    $cost = $_POST['prod_price'];
    //set quantity to 1 
    $quantity = 1;

    //generate a random number for order_id
    $ORDER_ID = rand(1, 99999);
    while ($row['count'] > 0);

    $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`, `item_cost`, `quantity`) VALUES ( '$so','$ORDER_ID', '$cost', '$quantity')";


    if ($dbconn->query($addtocart) === TRUE) {
        echo "Item added to cart";
    } else {
        echo "Error: " . $addtocart . "<br>" . $dbconn->error;
    }





    //code to see what is in the cart for a specific order ID 
    $showCart = "SELECT * FROM `cart` WHERE ORDER_ID = $ORDER_ID";

    $cartResult = $dbconn->query($showCart);
    include_once("../forms/bee-shopping-cart.php");

    if ($dbconn->query($addtocart) === TRUE) {
        echo include_once("../forms/bee-shopping-cart.php");
    } else {
        echo "Error: " . $addtocart . "<br>" . $dbconn->error;
    }


    //code to display images and names from prod-data cart 
    // $showProd = "SELECT * FROM `prod-data` FULL OUTER JOIN `cart` ON `prod-data.PROD_ID` = `cart.PROD_ID`";
    // $showProd = "SELECT * FROM `prod-data` FULL OUTER JOIN `cart` ON `prod-data.PROD_ID` = `cart.PROD_ID`";
    // $prodResult = $dbconn->query($prodResult);
    // if ($dbconn->query($prodResult) === TRUE) {
    //     echo include_once("../forms/bee-shopping-cart.php");
    // } else {
    //     echo "Error: " . $prodResult . "<br>" . $dbconn->error;
    // }




    $dbconn->close();
}



// exit();
