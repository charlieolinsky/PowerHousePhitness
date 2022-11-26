<?php

require_once("../classes/ShoppingCart.php");


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Checkout</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <link rel="stylesheet" href="../css/checkout.css">
    </head>
    
    <body>
        <h1>Checkout</h1>
        <div>
            <h3>Billing Address</h3>
            <form action="placeorder.php"> 
                    
                <label for="fname"> First Name </label>
                <input type="text" id="fname" name="firstname" placeholder="First Name"><br><br>

                <label for="lname"> Last Name </label>
                <input type="text" id="lname" name="lastname" placeholder="Last Name"><br><br>

                <label for="email"> Email </label>
                <input type="text" id="email" name="email" placeholder="you@example.com"><br><br>

                <label for="adr"> Address </label>
                <input type="text" id="adr" name="address" placeholder="Address"><br><br>

                <label for="city"> City </label>
                <input type="text" id="city" name="city" placeholder="New Paltz"><br><br>

                <label for="state"> State </label>
                <input type="text" id="state" name="state" placeholder="New York">

                <label for="zip"> Zip </label> 
                <input type="text" id="zip" name="zip" placeholder="12561"><br><br>
                
                
                <h3> Payment Information </h3>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John M Doe"><br><br>

                <label for="cnum">Card number </label>
                <input type="text" id="cnum" name="cardnunmber" placeholder="1111-2222-3333-4444"><br><br>
                
                <label for="expdate">Exp Date</label>
                <input type="text" id="expdate" name="expdate" placeholder="MM/YY"><br><br>
                
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123"><br><br>

                <input type="submit" value="Place Order" onClick="submit()">
                    
            </form>                
               
        </div>

        <div>
            <h4> Cart </h4>
            <br></br>
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

                ?>

                        <tr>
                            <td> <?php echo "<img src=$row[prod_image]>" ?></td>
                            <td> <?php echo $row['prod_name'] ?></td>
                            <td> <?php echo "$" . $row['prod_price'] ?></td>
                            <td> <?php echo $val ?> </td>
                            <td> <?php echo "$" . number_format($sub, 2) ?></td>
                        </tr>
                <?php
                    }
                }

                if (empty($_SESSION['cart'])) {
                    echo "<tr><td colspan='4'> Your Cart is Empty </td></tr";
                } else {
                    echo "<tr><td colspan='4'> Total Price: $" . number_format($grand_total, 2) . "</td></tr";
                }
                ?>      
            </table>

        
        </div>
    </body>

    <script>
        function submit()
        {
            // if ($.trim($("firstname").val()) === "" )
            var empt = document.forms['firstname'].value;
            if (empt == "")
            {
                alert ('Fields are empty.');
                return false;
            }
        }
    </script>
    
</html>