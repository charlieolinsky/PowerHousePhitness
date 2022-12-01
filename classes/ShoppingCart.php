<?php

// require_once("../include/global_inc.php");
SESSION_START();

require_once("../sql/connect.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'];
}

//clear cart
if (isset($_POST['clear'])) {
    unset($_SESSION['order_id']);
    $_SESSION['cart'] = array();
}

//code to update product quantity 
$out = "";
// buy
if (isset(($_POST['addToCart']))) { //updating the quantity from add to cart button 
    $so = $_POST['PROD_ID'];
    //quantity is the amount of a single item in the cart, has nothing to do with prod_quantity
    $quantity = 1;
    $name = $_POST['prod_name'];

    if ($quantity > 0 && filter_var($quantity, FILTER_VALIDATE_INT)) {        //checks if quantity entered is an int
        //buy
        if (isset($_SESSION['cart'][$so])) {     // check if prod is in array already
            $_SESSION['cart'][$so] += $quantity;
        } else {
            $_SESSION['cart'][$so] = $quantity;
        }
    } else {
        $out = "Bad Input";
    } //bad input

} else { //updating the quantity from shopping cart input 
    if (isset($_POST['quantity'])) {
        $so = $_POST['PROD_ID'];
        $quantity = $_POST['quantity'];
        // $quantity = 1;
        $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$so;";
        $result = $dbconn->query($query);
        while ($row = $result->fetch_assoc()) {
            $instock = $row['prod_quantity'];
        
        if ($quantity > 0 && filter_var($quantity, FILTER_VALIDATE_INT) && $instock >=  $quantity ) {
            $_SESSION['cart'][$so] = $quantity;
        } else if ($quantity == 0) {
            unset($_SESSION['cart'][$so]);
        }elseif($instock < $quantity){
            echo "only ". $instock . " items avaliable";
        }
    }
}
}


if(isset($_POST['checkout']))
{
    if(empty($_SESSION['cart']))
    {
        header("location: ../forms/empty.php");
        exit();
    }
}
