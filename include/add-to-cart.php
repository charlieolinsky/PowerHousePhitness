<?php
// Includes the database connection file
require_once("../sql/connect.php"); 

// require_once("../classes/ShoppingCart_Class.php");
// $cart = new ShoppingCart();


if(isset($_SESSION['fname']))
{
    echo "Hi, " . $_SESSION['fname'];
}


// if the addToCart Button is clicked
if(isset($_POST['addToCart'])){
    //variabvle for prod_id
    $so = $_POST['PROD_ID'];
    //grabbing the prod price from the inventory form
    $cost = $_POST['prod_price'];

    // $quantity = $_POST['quantity'];

    //generate a random number for order_id
    $ORDER_ID =rand(1,99999);
    while ($row['count'] > 0);
   //insert order_id and selected prod into cart
    // $sql = "INSERT INTO `cart`(PROD_ID, item_cost) SELECT (PROD_ID, prod_price) FROM `prod-data` WHERE PROD_ID=$so";
    // $addtocart = "INSERT INTO `cart`(PROD_ID, `item_cost`) SELECT (PROD_ID, `prod_price`) FROM `prod-data` WHERE PROD_ID=?";
    // $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`) VALUES ( '$so','$ORDER_ID')";
    $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`, `item_cost`) VALUES ( '$so','$ORDER_ID', '$cost')";
    
    // $showCart = "SELECT * FROM cart";
    // $result = $dbconn->query($showCart);
    // echo $showCart;

   
  //  include_once("../include/load-product-rental.php");
  //  $query = "SELECT * FROM `cart`;";
  //  $result = $dbconn->query($query);

    
    if ($dbconn->query($addtocart) === TRUE) {
        echo "New inventory item added successfully";
      
      } else {
        echo "Error: " . $addtocart . "<br>" . $dbconn->error;
      }
    
     
      
    
    $dbconn->close();

}



exit();

?>