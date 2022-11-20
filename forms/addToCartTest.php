<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART_TEST</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        
    <input type="submit" value="ADD TO CART">
    </form>

    
</body>
</html>

<?php

    include_once("../include/global_inc.php");
    include_once("../classes/ShoppingCart.php");
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $sc = new ShoppingCart(); 
        $sc -> addToCartButtonHandler(); 
    }



?>