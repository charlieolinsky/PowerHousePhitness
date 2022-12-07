<?php

// require_once("../include/global_inc.php");
include_once("../include/global_inc.php");
// SESSION_START();

$s = new Session();

global $so;
global $instock;


require_once("../sql/connect.php");

//starting a session called cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'];
}

//clearing the cart cart
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
        if (isset($_SESSION['cart'][$so])) {     // check if prod is in array already, if so increase the quantity by 1
            $_SESSION['cart'][$so] += $quantity;
        } else {    //if prod not alraedy in array, add it
            $_SESSION['cart'][$so] = $quantity;
        }
    } else {
        $out = "Bad Input";
    } //bad input

} else { //updating the quantity from shopping cart input 
    if (isset($_POST['quantity'])) {
        $so = $_POST['PROD_ID'];
        $quantity = $_POST['quantity'];
        $query = "SELECT * FROM `prod_data` WHERE PROD_ID=$so;";
        $result = $dbconn->query($query);
        while ($row = $result->fetch_assoc()) {
            //save current quantity to variable
            $instock = $row['prod_quantity'];
            //if quantity entered is valid and less than total stock
            if ($quantity > 0 && filter_var($quantity, FILTER_VALIDATE_INT) && $instock >=  $quantity) {
                //add that quantity to cart
                $_SESSION['cart'][$so] = $quantity; 
                // if 0 entered
            } else if ($quantity == 0) { 
                //cif quantity = 0, remove item from cart
                unset($_SESSION['cart'][$so]); 
                //if quant entered is more than instock
            } elseif ($instock < $quantity) { 
                //set msg to how much is in stock
                $out = "only " . $instock . " items avaliable";
            }
        }
    }
}

// if cart is empty, and user tries to check out
if (isset($_POST['checkout'])) {
    if (empty($_SESSION['cart'])) {
        // header("location: ../forms/empty.php");
        // exit();
        $r = new Redirect(
            "
            Oops.. your shopping cart is empty :/ <br> Please add items to your cart",
            "equip-rental-member.php",
            "Error",
            "Continue Shopping
            ",
        );

        header("Location: redirectPage.php");
    }
}



?>