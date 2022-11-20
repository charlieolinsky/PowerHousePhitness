<?php
SESSION_START();

require_once("../sql/connect.php");


// $cart = array();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'];
}

//clear cart
if (isset($_POST['clear'])) {
    $_SESSION['cart'] = array();
}

// if (isset($_POST['addToCart'])) {
//     //variabvle for prod_id
//     $so = $_POST['PROD_ID'];
//     //grabbing the prod price from the inventory form
//     $cost = $_POST['prod_price'];
//     $name = $_POST['prod_name'];
//     //set quantity to 1 
//     $quantity = 1;
//     echo $so;
//     echo $cost;
//     echo $name;
//     echo $quantity;

// }


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
    
    // //bee test table code
    // $addtocart = "INSERT INTO `cart` (`PROD_ID`, `item_cost`, `quantity`) VALUES ( '$so', '$cost', '$quantity')";
    // $dbconn->query($addtocart);

}









// echo "<pre>";
// print_r($_SESSION['cart']);
// echo $PROD_ID;
// echo $quantity;
// echo "hello";
// echo "<pre>";
?>

<!DOCTYPE html>

<head>
    <title> Shopping Cart </title>
</head>

<body>

    <h2> Shopping Cart </h2>


    <div class="cart-container">
        <form action="../include/shoppingcartTest.php" method="POST">
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


                // $sql = "SELECT * FROM 'prod-data' WHERE PROD_ID = $key";
                // $result = $dbconn->query($sql);
                // $row = $result->fetch_assoc();

                $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
                $result = $dbconn->query($query);
                while ($row = $result->fetch_assoc()) {



                    $sub = $val * $row['prod_price'];
                    $grand_total += $sub;

                    // <td> <?php echo "<img src=$row[prod_image]>" </td>

                    echo "
                <tr>
                    <td><img src={$row['prod_image']}></td>
                    <td>{$row['prod_name']}</td>
                    <td>{$row['prod_price']}</td>
                    <td>$val</td>
                    <td>$ $sub</td>
                </tr>
                ";
                }
            }

            if (empty($_SESSION['cart'])) {
                echo "<tr><td colspan='4'> Your Cart is Empty </td></tr";
            } else {
                echo "<tr><td colspan='4'> Grand Total: $ $grand_total </td></tr";
            }
            ?>
        </table>

        <div class="row">
            <a href="../forms/equip-rental-member.php" class="btn btn-block btn-secondary"></i>Continue Shopping</a>
        </div>
    </div>




</body>

</html>

<?php
if (isset($_POST['addToCart'])) {
    echo "in table";

    $ORDER_ID = $_SESSION['user_id'];
    $USER_ID = $_SESSION['user_id'];
    $cost = $_POST['prod_price'];

    // $createOrder = "INSERT INTO order_data (`ORDER_ID`, `USER_ID`, `order_date`, `order_time`, `grand_total`) 
    //             VALUES($ORDER_ID, $USER_ID, '', '', $grand_total)";

    // if ($dbconn->query($createOrder) === TRUE) {
    //     echo "order created";
    // } else {
    //     echo "Error: " . $createOrder . "<br>" . $dbconn->error;
    // }

    $addtocart = "INSERT INTO `cart` (`PROD_ID`, `ORDER_ID`, `item_cost`, `quantity`) 
                VALUES ( '$so','$ORDER_ID', '$cost', '$quantity')";

    if ($dbconn->query($addtocart) === TRUE) {
        echo "Item added to cart table";
    } else {
        echo "Error: " . $addtocart . "<br>" . $dbconn->error;
    }
}
?>