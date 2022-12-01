<?php
require_once("../classes/ShoppingCart.php");
?>

<!DOCTYPE html>

<head>
    <title> Shopping Cart </title>
</head>

<body>

    <h2> Shopping Cart </h2>


    <div>
        <form action="../forms/shoppingcart.php" method="POST">
            <input type="submit" name="clear" value="Clear Cart">
        </form>


        <table>
            <tr>
                <th>Image</th>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php

            $grand_total = 0;

            //go through each item in the cart and display its information from the prod data table
            foreach ($_SESSION['cart'] as $key => $val) {

                $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
                $result = $dbconn->query($query);
                while ($row = $result->fetch_assoc()) {

                    $sub = $val * $row['prod_price'];
                    $grand_total += $sub;
                    // $current = $row['prod_quantity'];

            ?>
                    <tr>
                        <td> <?php echo "<img src=$row[prod_image]>" ?></td>
                        <td> <?php echo $row['prod_name'] ?></td>
                        <td> <?php echo "$" . $row['prod_price'] ?></td>
                        <td>
                            <form action="../forms/shoppingcart.php" method='POST'>
                                <input type="number" value='<?php echo $val ?>' name='quantity'>
                                <input type='hidden' value='<?php echo $key ?>' name='PROD_ID'>
                                <input type='submit'>
                            </form>
                            
                        </td>
                        <td> <?php echo "$" . number_format($sub, 2) ?></td>
                    </tr>
            <?php
                }
            }

            if (empty($_SESSION['cart'])) {
                echo "<tr><td colspan='4'> Your Cart is Empty </td></tr";
            } else {
                echo "<tr><td colspan='4'> Grand Total: $" . number_format($grand_total, 2) . "</td></tr";
            }
            ?>
        </table>

        <div>
            <a href="../forms/equip-rental-member.php"></i>Continue Shopping</a>
        </div>
        <div>
            <form action="../forms/checkout.php" method="POST">
                <input type="submit" name="checkout" value="Check Out">
            </form>
        </div>
    </div>


</body>

</html>





<!-- //code to adding to tables -->
<?php
//variables for tables 
$USER_ID = $_SESSION['user_id'];
$cart = $_SESSION['cart'];


// generate a random order number and save in session
if (!isset($_SESSION['order_id'])) {
    $order_ID = rand(10, 9999);
    $_SESSION['order_id'] = $order_ID;
}
//save session variable
$sessionOrder = $_SESSION['order_id'];


//saving the cart quantity to the session 
if (isset($_SESSION['cart'][$so])) {
    $quantity = $_SESSION['cart'][$so];
}
$tablequant = $quantity;


//saving the subtotal to the session 
if (isset($_SESSION[$sub])) {
    $subtotal = $quantity * $sub;
}
$tablesub = $subtotal;


if (isset($_SESSION[$sub])) {
    $cost = $_SESSION['prod_price'];
}
$sessionCost = $cost;


//getting the items cost 
if (isset($_SESSION['cart'][$so])) {

    $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
    $result = $dbconn->query($query);
    while ($row = $result->fetch_assoc()) {

        $cost = $val * $row['prod_price'];
    }
}


//if this is the first item in the cart
if (count($cart) == 1 and $tablequant == 1) {
    //create new order query
    $createOrder = "INSERT INTO `cart` (`ORDER_ID`, `USER_ID`, `grand_total`, `order_date`) VALUES ($sessionOrder, '$USER_ID','$grand_total', curdate()) ";
    //run the query
    if (mysqli_query($dbconn, $createOrder)) {
        // echo "<br>order created <br>";
    }
    //add to cart query
    $addtocart = "INSERT INTO `cart_items` (`PROD_ID`, `ORDER_ID`, `item_cost`, `quantity`) 
                VALUES ( $so, $sessionOrder, $sub, $quantity)";
    if (mysqli_query($dbconn, $addtocart)) {
        echo "Item added to cart";
    }
}

//if there are items in the cart already but this is the first of this item being added
if (count($cart) >= 1 and $tablequant == 1) {
    //add item to cart query
    $addtocart = "INSERT INTO `cart_items` (`PROD_ID`, `ORDER_ID`, `item_cost`, `quantity`) 
        VALUES ( $so, $sessionOrder, $sub, $quantity)";

    //update the grandtotal
    $updateOrder = "UPDATE `cart` SET grand_total=$grand_total WHERE ORDER_ID=$sessionOrder";

    if ($dbconn->query($addtocart) === TRUE) {
        echo "Item added to cart<br>";
        //update the grand total 
        if ($dbconn->query($updateOrder) === TRUE) {
            // echo "total updated<br>";
        }
    }
    //if the item being added is already in the cart 
} elseif ($tablequant >= 1) {
    //queries to update line items 
    $updateQuant = "UPDATE `cart_items` SET quantity=$tablequant WHERE (ORDER_ID=$sessionOrder AND PROD_ID=$so)";
    $updateSub = "UPDATE `cart_items` SET item_cost=$sub WHERE (ORDER_ID=$sessionOrder AND PROD_ID=$so)";
    $updateOrder = "UPDATE `cart` SET grand_total=$grand_total WHERE ORDER_ID=$sessionOrder";
    //run the update queries 
    if ($dbconn->query($updateQuant) === TRUE) {
        // echo "<br>quantity updated";
        if ($dbconn->query($updateSub) === TRUE) {
            // echo "<br>sub updated";
            if ($dbconn->query($updateOrder) === TRUE) {
                // echo "<br>grand total updated";
            }
        }
    }
}
// deleting the item from the cart 
if ($tablequant == 0) {
    //queries to update line items 
    $deletequant = "DELETE FROM cart_items WHERE (ORDER_ID=$sessionOrder AND PROD_ID=$so)";
    // $updateSub = "UPDATE `cart_items` SET item_cost=$sub WHERE (ORDER_ID=$sessionOrder AND PROD_ID=$so)";
    $updateOrder = "UPDATE `cart` SET grand_total=$grand_total WHERE ORDER_ID=$sessionOrder";
    // $updateOrder = "DELETE FROM cart WHERE (ORDER_ID=$sessionOrder)";

    //run the update queries 
    if ($dbconn->query($deletequant) === TRUE) {
        echo "<br>removed from cart";
        // if ($dbconn->query($updateSub) === TRUE) {
        //     echo "<br>sub updated";
        if ($dbconn->query($updateOrder) === TRUE) {
            // echo "<br>order deleted";
        }
    }
}


?>