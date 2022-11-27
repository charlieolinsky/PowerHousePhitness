<?php

require_once("../classes/ShoppingCart.php");
require_once("../sql/connect.php");


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
        <!-- <form name="placeOrder" action="placeorder.php" onsubmit="submit()"> -->
        <form action="../forms/placeorder.php" method="POST" onsubmit="submit()">


            <label for="fname"> First Name </label>
            <input type="text" name="fname" placeholder="First Name" required><br><br>

            <label for="lname"> Last Name </label>
            <input type="text" name="lname" placeholder="Last Name" required><br><br>

            <label for="email"> Email </label>
            <input type="text" name="email" placeholder="you@example.com" required><br><br>

            <label for="adr"> Address 1 </label>
            <input type="text" name="adr1" placeholder="Address" required><br><br>

            <label for="adr"> Address 2 </label>
            <input type="text" name="adr2" placeholder="Address"><br><br>

            <label for="city"> City </label>
            <input type="text" name="city" placeholder="New Paltz" required><br><br>

            <label for="state"> State </label>
            <input type="text" name="state" placeholder="New York" required>

            <label for="zip"> Zip </label>
            <input type="text" name="zip" placeholder="12561" required><br><br>


            <h3> Payment Information </h3>
            <label for="cname">Name on Card</label>
            <input type="text" name="cname" placeholder="John M Doe" required><br><br>

            <label for="cnum">Card number </label>
            <input type="tel" name="cnum" inputmode="numeric" pattern="[0-9\s]{13, 19}" maxlength="19" placeholder="1111-2222-3333-4444" required><br><br>

            <label for="expdate">Exp Date</label>
            <input type="text" name="expdate" placeholder="MM/YY" required><br><br>

            <label for="cvv">CVV</label>
            <input type="text" name="cvv" placeholder="123" required><br><br>

            <input type="submit" value="Place Order" name="placeorder">

            <!-- <input type="submit" value="Place Order" name="checkout"> -->


            <!-- </form> -->

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
        </form>

    </div>
</body>

<script>
    function submit() {
        if ($.trim($("fname").val()) === "" || $.trim($("lname").val()) === "")
        // var empt = document.forms['firstname'].value;
        // if (empt == "")
        {
            alert('Please fill out this field.');
            return false;
        }
    }
</script>

</html>

<?php
$addr = "INSERT INTO 'user_address' ('address1', 'address2', 'city', 'st', 'zip') VALUES ('$_POST[adr1]', '$_POST[adr2]', '$_POST[city]', '$_POST[state]', '$_POST[zip]')";
if (mysqli_query($dbconn, $addr)) {
    echo "Address updated";
}
?>