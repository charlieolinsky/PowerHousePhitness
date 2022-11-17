<?php

// SESSION_START();

// if(!isset($_SESSION['cart'])) {
//   $_SESSION['cart'];
// }


// echo"<pre>";
// print_r($_SESSION['cart']);
// echo"</pre>";


// if(isset($_POST['PROD_ID'])){
//   $id = $_POST['PROD_ID'];
//   $cost = $_POST['prod_price'];


// }





// Includes the database connection file
include_once("../sql/connect.php");

// require_once("../classes/ShoppingCart_Class.php");
// // $cart = new ShoppingCart();


if (isset($_SESSION['fname'])) {
  echo "Hi, " . $_SESSION['fname'];
}


// // if the addToCart Button is clicked
if (isset($_POST['addToCart'])) {
  //variabvle for prod_id
  $so = $_POST['PROD_ID'];
  //grabbing the prod price from the inventory form
  $cost = $_POST['prod_price'];
  //set quantity to 1 
  $quantity = 1;
  // $order_date = NOW();

  //generate a random number for order_id
  $ORDER_ID = rand(1, 99999);
  while ($row['count'] > 0);
  //insert order_id and selected prod into cart
  // $sql = "INSERT INTO `cart`(PROD_ID, item_cost) SELECT (PROD_ID, prod_price) FROM `prod-data` WHERE PROD_ID=$so";
  // $addtocart = "INSERT INTO `cart`(PROD_ID, `item_cost`) SELECT (PROD_ID, `prod_price`) FROM `prod-data` WHERE PROD_ID=$so";
  $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`, `item_cost`, `quantity`) VALUES ( '$so','$ORDER_ID', '$cost', '$quantity')";
  // $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`) VALUES ( '$so','$ORDER_ID')";
  // $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`, `item_cost`) VALUES ( '$so','$ORDER_ID', '$cost')";
  //INSERT INTO `order_data`(`order_date`, `order_time`, `grand_total`) VALUES (NOW(), NOW(), ";


  // $showCart = "SELECT * FROM cart";
  // $result = $dbconn->query($showCart);
  // echo $showCart;


  //  include_once("../include/load-product-rental.php");
  //  $query = "SELECT * FROM `cart`;";
  //  $result = $dbconn->query($query);


  if ($dbconn->query($addtocart) === TRUE) {
    echo "Item added to cart";
  } else {
    echo "Error: " . $addtocart . "<br>" . $dbconn->error;
  }

  //  include_once("../forms/bee-shopping-cart.php");
  //  $showCart = "SELECT * FROM  cart A FULL OUTER JOIN `prod-data B` ON A.Key = B.Key WHERE ORDER_ID='86735'";
  //  $showCart = "SELECT `cart.ORDER_ID`, `prod-data.prod_name` FROM cart 
  //  JOIN `prod-data` ON `cart.ORDER_ID` = `prod-data.prod_name` ";

  //code to see what is in the cart for a specific order ID 
  $showCart = "SELECT * FROM `cart` WHERE ORDER_ID = $ORDER_ID";

  $cartResult = $dbconn->query($showCart);
  //  echo $cartResult;
  include_once("../forms/bee-shopping-cart.php");

  if ($dbconn->query($addtocart) === TRUE) {
    echo include_once("../forms/bee-shopping-cart.php");
  } else {
    echo "Error: " . $addtocart . "<br>" . $dbconn->error;
  }


// $showProd = "SELECT * FROM `prod-data` FULL OUTER JOIN `cart` ON `prod-data.PROD_ID` = `cart.PROD_ID`";
// $showProd = "SELECT * FROM `prod-data` FULL OUTER JOIN `cart` ON `prod-data.PROD_ID` = `cart.PROD_ID`";
// $prodResult = $dbconn->query($prodResult);
// if ($dbconn->query($prodResult) === TRUE) {
//   echo include_once("../forms/bee-shopping-cart.php");
// } else {
//   echo "Error: " . $prodResult . "<br>" . $dbconn->error;
// }





  // $showCart = "SELECT * FROM cart WHERE ORDER_ID = $ORDER_ID";
  // $showCart = "SELECT `cart.ORDER_ID`, `prod-data.prod_name` FROM cart 
  // JOIN `prod-data` ON `cart.ORDER_ID` = `prod-data.prod_name` ";

  // $result = $dbconn->query($showCart);
  // echo $showCart;


  $dbconn->close();
}



// exit();
