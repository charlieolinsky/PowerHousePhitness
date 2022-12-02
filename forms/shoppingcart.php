<?php
require_once("../classes/ShoppingCart.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>


<body>
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <!-- PHP Logo -->
            <a class="navbar-brand" href="adminDirectory.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Create list of links/buttons for different pages -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <!-- Add and link Index page -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link smoothScroll">Home</a>
                    </li>

                    <!-- Add and link About page -->
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About Us</a>
                    </li>

                    <!-- Create dropdown menu -->
                    <li class="dropdown">
                        <button class="dropbtn" id="dropdownMenuButton" data-toggle="dropdown"> Services
                            <i class="fa fa-caret-down"></i>
                        </button>

                        <div class="dropdown-content">
                            <a href="services.php#classes">Classes </a>
                            <a href="services.php#membership">Memberships </a>
                            <a href="..\forms\equip-rental-member.php">Equipment </a>
                        </div>
                    </li>

                    <!-- Add and link Schedule page -->
                    <li class="nav-item">
                        <a href="schedule.php" class="nav-link">Schedule</a>
                    </li>

                    <!-- Add and link contact section -->
                    <li class="nav-item">
                        <a href="index.php#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>

                <!-- Add User icon -->
                <ul class="social-icon ml-lg-3">
                    <li><a href="../forms/account_tab.php" class="fa fa-user"></a></li>
                </ul>

                <!-- Add shopping cart icon with link -->
                <ul class="social-icon ml-lg-3">
                    <li><a href="../forms/shoppingcart.php" class="fa fa-shopping-cart"></a></li>
                </ul>
            </div>

        </div>
    </nav>

    <br><br><br>

    <!-- Shopping Cart Title -->
    <div class="equip-title">
        <h1 style="color: var(--primary-color)">Shopping Cart</h1>
        <!-- Continue Shopping Link -->
        <a href="../forms/equip-rental-member.php"></i>Continue Shopping</a>
    </div>


    <!-- Shopping Cart Item: Image, Name, Price, Quantity, Subtotal Container -->
    <div style="text-align: center">
        <br>
        <!-- <form action="../forms/shoppingcart.php" method="POST">
            <input type="submit" name="clear" value="Clear Cart">
        </form> -->

            <?php

            $grand_total = 0;

            //go through each item in the cart and display its information from the prod data table
            foreach ($_SESSION['cart'] as $key => $val):

                $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
                $result = $dbconn->query($query);
                while ($row = $result->fetch_assoc()):


                    $sub = $val * $row['prod_price'];
                    $grand_total += $sub;
                    // $current = $row['prod_quantity'];

            ?>

                    <div class="cart-container" style="text-align: center">
                        <div class="column">
                            <!-- Cart Item Image -->
                            <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12">
                                <div class="cart-info">
                                    <?php echo "<img src=$row[prod_image]>" ?>
                                </div>
                            </div>

                            <!-- Cart Item/Product Name -->
                            <div class="equip-info" style="margin-top: 15px">
                                <h5><strong> <?php echo $row['prod_name'] ?> </h5></strong>
                            </div>
                        </div>

                        <!-- Cart Item/Product Price -->
                        <div class="column" style="margin-left: 125px">
                                <h5>Price</h5>
                                <h5 style="color: var(--primary-color)"><strong> <?php echo "$" . $row['prod_price'] ?> </h5></strong>
                        </div>

                        <!-- Quantity  -->
                        <div class="column" style="margin-left: 150px">
                                <h5>Quantity</h5>
                                <form action="../forms/shoppingcart.php" method='POST'>
                                    <input value='<?php echo $val ?>' name='quantity' size="5">
                                    <input type='hidden' value='<?php echo $key ?>' name='PROD_ID'>
                                    <!-- Update Quantity Button -->
                                    <input type="submit" class="btn edit-btn" value = "Update" style="margin-top: 10px">
                                </form>
                        </div>

                        <!-- Subtotal -->
                        <div class="column" style="margin-left: 100px">
                                <h5>Subtotal</h5>
                                <h5 style="color: var(--primary-color)"><strong><?php echo "$" . number_format($sub, 2) ?></h5></strong>
                        </div>

                    </div>
                
            <?php  endwhile; ?>
            <?php endforeach; ?>
                
            <br>

            <div class="total-container">
                <div class = "column">
                    <!-- Total Price Display -->
                    <h5><strong>
                        <?php 
                        if (empty($_SESSION['cart'])) {
                            echo "<tr><td colspan='4'> Your Cart is Empty </td></tr";
                        } else {
                            echo"<tr><td colspan='4'> Total: $" . number_format($grand_total, 2) . "</td></tr";
                        }
                        ?>
                    </strong></h5>

                    <div class = "row">
                        <!-- Clear Cart Button -->
                        <form action="../forms/shoppingcart.php" method="POST">
                            <input type="submit" class="btn edit-btn" name="clear" value="Clear Cart" style="margin-left: 5px">
                        </form>

                        <!-- Checkout Button -->
                        <form action="../forms/checkout.php" method="POST">
                            <input type="submit" class="btn edit-btn" name="checkout" value="Check Out" style="margin-left: 5px; margin-right: 5px">
                        </form>
                    </div>
                </div>
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
            // echo "Item added to cart";
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
            // echo "Item added to cart<br>";
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