<?php

require_once("../classes/ShoppingCart.php");
require_once("../sql/connect.php");

//if not logged in redirect to log in
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once('../include/global_inc.php');
    Roles::minAccess(1, "../UI/loginUI.php");
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
        <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
        <link rel="stylesheet" href="../UI/css/aos.css">
        <!-- <link rel="stylesheet" href="../css/checkout.css"> -->
        <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">
    </head>


    <body>
        <!-- NAV BAR -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">

                <!-- PHP Logo -->
                <a class="navbar-brand" href="../forms/adminDirectory.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Create list of links/buttons for different pages -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-lg-auto">
                    
                    </ul>

                    <!-- Add User icon with link -->
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

        
        <!-- Checkout Page Title -->
        <div class="equip-title">
            <h1 style="color: var(--primary-color)">Checkout</h1>
        </div>

        <!-- <div class="column"> -->
                <div class="inventory-container" style="margin-top: 180px; position: relative; width: max-content">
                    <table style="background-color: var(--white-color)">
                        <!-- Order Overview -->
                        <h3 style="border-bottom: 1px solid black; margin-bottom: 3px"> Order Overview </h3>
                        <col>
                            <?php

                                $grand_total = 0;

                                //go through each item in the cart and display its information from the prod data table
                                foreach ($_SESSION['cart'] as $key => $val): 

                                    $query = "SELECT * FROM `prod_data` WHERE PROD_ID=$key;";
                                    $result = $dbconn->query($query);
                                    while ($row = $result->fetch_assoc()): 


                                        $sub = $val * $row['prod_price'];
                                        $grand_total += $sub;
                            ?>
                                        <!-- Display Product Name and Price -->
                                        <tr>
                                            <div class="cart-info" style="width: max-content">
                                                <!-- Product Name -->
                                                <td>
                                                    <h4 style="text-align: left; margin-bottom: 15px; margin-right: 450px"> <?php echo $row['prod_name'] ?> </h4>
                                                </td>

                                                <!-- Product Price -->
                                                <td>
                                                    <h4 style="color: var(--primary-color); margin-bottom: 15px"> <?php echo "$" . number_format($sub,2) ?> </h4>
                                                </td>
                                            </div> 
                                        </tr>
                        </col>

                        <?php  endwhile; ?>
                        <?php endforeach; ?>

                        <!-- Total Price -->
                            <tr> 
                                <th colspan="2"> 
                                    <h3 style="text-align: center; border-top: 1px solid black">  
                                        <?php
                                            if (empty($_SESSION['cart'])) {
                                                // echo "<tr><td colspan='4'> Your Cart is Empty </td></tr";
                                                echo "Your Cart is Empty";
                                            } else {
                                                // echo "<tr><td colspan='4'> Total Price: $" . number_format($grand_total, 2) . "</td></tr";
                                                echo "Total Price: $" . number_format($grand_total, 2);
                                            }
                                        ?>
                                    </h3>
                                </th>
                            </tr>
                    </table>
                </div>

        <form action="../forms/placeorder.php" method="POST">
                <!-- Billing Address -->
                <div class="inventory-container" style="width: max-content; margin-top: 0px; margin-left: -172px; display:flex; flex-direction: column">
                    <h3>Billing Address</h3>
                    <div class="row">
                        <div class="column" style="text-align: center">
                            <!-- First name label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="fname" style="margin-bottom: -20px"> First Name </label> <br>
                            </h5>
                            <input type="text" name="fname" placeholder="Anthony" required><br>
                        </div>

                        <div class="column" style="text-align: center; margin-left: 60px">
                            <!-- Last name label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="lname" style="margin-bottom: -20px"> Last Name </label> <br>
                            </h5>
                            <input type="text" name="lname" placeholder="Denizard" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column" style="text-align: center">
                            <!-- Address1 label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="adr" style="margin-bottom: -20px"> Address 1 </label> <br>
                            </h5>
                            <input type="text" name="adr1" placeholder="Street Address" required><br>
                        </div>

                        <div class="column" style="text-align: center; margin-left: 60px">
                            <!-- Address2 label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="adr2" style="margin-bottom: -20px"> Address 2 </label> <br>
                            </h5>
                            <input type="text" name="adr2" placeholder=" "><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column" style="text-align: center">
                            <!-- City label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="city" style="margin-bottom: -20px"> City </label> <br>
                            </h5>
                            <input type="text" name="city" placeholder="New Paltz" required><br>
                        </div>

                        <div class="column" style="text-align: center; margin-left: 60px">
                            <!-- State label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="state" style="margin-bottom: -20px"> State </label> <br>
                            </h5>
                            <input type="text" name="state" placeholder="New York" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column" style="text-align: center">
                            <!-- Zipcode label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="zip" style="margin-bottom: -20px"> ZIP Code </label> <br>
                            </h5>
                            <input type="text" name="zip" placeholder="12561" required><br>
                        </div>

                        <div class="column" style="text-align: center; margin-left: 60px">
                            <!-- Email label and input -->
                            <h5 style="font-size: 18px; margin-top: 15px">
                                <label for="email" style="margin-bottom: -20px"> Email </label>
                            </h5>
                            <input type="text" name="email" placeholder="you@example.com" required><br><br>
                        </div>
                    </div>
                </div>



                <!-- Payment Information -->
                <div class="inventory-container" style="margin-top: 135px; position: relative; width: max-content; margin-left: 238px">
                    <h3>Payment Information</h3>
                    <div class="column">
                        <!-- Cardholder Name label and input -->
                        <h5 style="font-size: 18px; margin-top: 15px">
                            <label for="cname" style="margin-bottom: -20px">Cardholder Name</label> <br>
                        </h5>
                        <input type="text" name="cname" placeholder="Anthony Denizard" required><br>

                        <!-- Card Number label and input -->
                        <h5 style="font-size: 18px; margin-top: 25px">
                            <label for="cnum" style="margin-bottom: -20px">Card Number</label><br>
                        </h5>
                        <input type="tel" name="cnum" inputmode="numeric" pattern="[0-9\s]{13, 19}" maxlength="19" placeholder="1111-2222-3333-4444" required><br>

                        <!-- Card Exp Date label and input -->
                        <h5 style="font-size: 18px; margin-top: 25px">
                            <label for="expdate" style="margin-bottom: -20px">Exp Date</label> <br>
                        </h5>
                        <input type="text" name="expdate" placeholder="MM/YY" required><br>

                        <!-- Card CVV label and input -->
                        <h5 style="font-size: 18px; margin-top: 18px">
                            <label for="cvv" style="margin-bottom: -20px">CVV</label> <br>
                        </h5>
                        <input type="text" name="cvv" placeholder="123" required><br>

                    </div>
                </div>   

                <input type="submit" class="btn checkout-btn" value="Place Order" name="placeorder">
        </form>   

    </body>
</html>