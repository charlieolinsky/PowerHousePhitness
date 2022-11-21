<?php
SESSION_START();

require_once("../sql/connect.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'];
}

//clear cart
if (isset($_POST['clear'])) {
    $_SESSION['cart'] = array();
}


$out = "";
// $quantity = 1;
// buy
if (isset(($_POST['addToCart']))) {
    $so = $_POST['PROD_ID'];
    // $prod_quantity = $_GET['prod_quantity'];
    //quantity is the amount of a single item in the cart, has nothing to do with prod_quantity
    $quantity = 1;
    $name = $_POST['prod_name'];
    // echo $name;


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

}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shopping Cart </title>

</head>

<body>

    <h2> Shopping Cart </h2>


    <div>
        <form action="../forms/shoppingcart.php" method="POST">
            <input type="submit" class="btn cart-btn mt-3" name="clear" value="Clear Cart">
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


            foreach ($_SESSION['cart'] as $key => $val) {


                $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
                $result = $dbconn->query($query);
                while ($row = $result->fetch_assoc()) {

                    $sub = $val * $row['prod_price'];
                    $grand_total += $sub;
            ?>

                    <tr>
                        <td> <?php echo "<img src=$row[prod_image]>" ?></td>
                        <td> <?php echo $row['prod_name'] ?></td>
                        <td> <?php echo "$" . $row['prod_price'] ?></td>
                        <td> <?php echo $val ?></td>
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
            <a href="../forms/equip-rental-member.php" class="btn btn-block btn-secondary"></i>Continue Shopping</a>
        </div>

        <div>
            <form action="../forms/checkout.php" method="POST">
            <input type="submit" class="btn cart-btn mt-3" name="checkout" value="Check Out">
        </form>
        </div>
    </div>

</body>

</html>
