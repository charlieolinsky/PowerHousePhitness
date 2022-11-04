<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Name Validation 
    if (empty($_POST['prod_name'])) {
        $name_error = "Please enter an item name";
    }
    // Description Validation
    if (empty($_POST['prod_desc'])) {
        $desc_error = "Please enter an item description";
    }
    //Image Validation

    //Price Validation
    if (empty($_POST['prod_price'])) {
        $price_error = "Please enter a price";
    } else if (is_double($_POST['prod_price'])) {
        $price_error = "Invalid input, please enter a number.";
    }

    //Quantity Validation 
    if (empty($_POST['prod_quantity'])) {
        $quantity_error = "Please enter a quantity";
    } else if (is_int($_POST['prod_quantity'])) {
        $quantity_error = "Invalid input, please enter a number.";
    }

    //Date Purchased Validation
    if (empty($_POST['prod_date_purchased'])) {
        $purchase_date_error = "Please enter a purchase date";
    }

    //Purchase Price Validation
    if (empty($_POST['prod_purchase_cost'])) {
        $purchase_cost_error = "Please enter a price";
    } else if (is_double($_POST['prod_purchase_cost'])) {
        $purchase_cost_error = "Invalid input, please enter a number.";
    }
}
?>

<!DOCTYPE html>

<!-- code to hold the what will appear on the admin-inventory page  -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<body>
    <main>

        <div class="add_inventory">

            <h1> this is the admin inventory page </h1>

            <!-- this line works!  -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
            <!-- this line doesnt do datavalidation but DOES insert into b -->
                <!-- <form action="../include/add-products.php" method="POST"> -->


                <!-- the name="__" field is what connects this form to the querying file -->
                <label for="prod_name"> Item Name:</label><br>
                <input type="text" id="prod_name" name="prod_name" value="<?php if (isset($_POST['prod_name'])) echo $_POST['prod_name']; ?>">
                <br>
                <span> <?php if (isset($name_error)) echo $name_error; ?> </span>
                <br><br>


                <!-- asking for prod description -->
                <label for="prod_desc"> Item Description:</label><br>
                <input type="text" id="prod_desc" name="prod_desc" value="<?php if (isset($_POST['prod_desc'])) echo $_POST['prod_desc']; ?>">
                <br>
                <span> <?php if (isset($desc_error)) echo $desc_error; ?> </span>
                <br><br>

                <!-- Need to add a way to upload-->
                <label for="prod_image"> Item Image: </label><br>
                <input type="text" id="prod_image" name="prod_image">
                <br><br>

                <!-- need to add validation to be a # -->
                <label for="prod_price"> Item Price: </label><br>
                <input type="text" id="prod_price" name="prod_price" value="<?php if (isset($_POST['prod_price'])) echo $_POST['prod_price']; ?>">
                <br>
                <span> <?php if (isset($price_error)) echo $price_error; ?> </span>
                <br><br>

                <!-- need to add validation to be a # -->
                <label for="prod_quantity">Item Quantity: </label><br>
                <input type="text" id="prod_quantity" name="prod_quantity" value="<?php if (isset($_POST['prod_quantity'])) echo $_POST['prod_quantity']; ?>">
                <!-- value is making the form hold its value after submit if there wa an error -->
                <br>
                <span> <?php if (isset($quantity_error)) echo $quantity_error; ?> </span>
                <br><br>

                <!-- Asking for Vendor ID -->
                <label for="VENDOR_ID">Vendor: </label><br>
                
                <?php

                include_once("../sql/connect.php");

                // query to get only the vendor ID for the dropdown menu
                $vendorquery = "SELECT * FROM vendor_id";
                if ($r_set = $dbconn->query($vendorquery)) {
                    echo "<SELECT name='VENDOR_ID'>";
                    while ($row = $r_set->fetch_assoc()) {
                        // echo"<option value=$row[VENDOR_ID]>Vendor $row[VENDOR_ID]: $row[v_name]</option>";
                        echo "<option value=" . $row['VENDOR_ID'] . ">" . $row['v_name'] . "</option>";
                    }
                    echo "</select>";
                }

                ?>

                <br><br>

                <!-- Asking for date purchased -->
                <label for="prod_date_purchased"> Date Purchased: </label><br>
                <input type="text" id="prod_date_purchased" name="prod_date_purchased" value="<?php if (isset($_POST['prod_date_purchased'])) echo $_POST['prod_date_purchased']; ?>">
                <br>
                <span> <?php if (isset($purchase_date_error)) echo $purchase_date_error; ?> </span>
                <br><br>

                <!-- need to add validation to be a # -->
                <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                <input type="text" id="prod_purchase_cost" name="prod_purchase_cost" value="<?php if (isset($_POST['prod_purchase_cost'])) echo $_POST['prod_purchase_cost']; ?>">
                <br>
                <span> <?php if (isset($purchase_cost_error)) echo $purchase_cost_error; ?> </span>
                <br><br>

                <input type="submit" name="submit" value="Submit Form"><br>

            </form>

        </div>

    </main>
</body>

</html>