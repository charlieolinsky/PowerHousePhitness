<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Existing Inventory Item </title>
    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">
</head>

<body>
    <!-- select current inventory item 
    update description
    update image
    update price 
    update quantity
    update purchase cost
    update date purchased -->
    <div>
        <h4>Update Product</h4>
        <form action="../include/update-product.php" method="POST">
            <!-- <form action=<?php //echo $_SERVER['PHP_SELF']; ?> method="POST"> -->

            <div>
                <!-- Asking for Vendor ID -->
                <label for="PROD_ID">Item: </label><br>

                <?php

                include_once("../sql/connect.php");

                // query to get only the vendor ID for the dropdown menu
                $namequery = "SELECT * FROM `prod-data`";
                if ($r_set = $dbconn->query($namequery)) {
                    echo "<SELECT name='PROD_ID'>";
                    while ($row = $r_set->fetch_assoc()) {
                        // echo"<option value=$row[VENDOR_ID]>Vendor $row[VENDOR_ID]: $row[v_name]</option>";
                        echo "<option value=" . $row['PROD_ID'] . ">" . $row['prod_name'] . "</option>";
                    }
                    echo "</select>";
                }

                ?>
            </div>

            <div>
                <!-- asking for prod description -->
                <label for="prod_name"> Item name:</label><br>
                <input type="text" id="prod_name" name="prod_name">
                <br><br>
            </div>

            <div>
                <!-- asking for prod description -->
                <label for="prod_desc"> Item Description:</label><br>
                <input type="text" id="prod_desc" name="prod_desc">
                <br><br>
            </div>

            <div>
                <!-- Need to add a way to upload-->
                <label for="prod_image"> Item Image: </label><br>
                <input type="file" name="prod_image">
                <br><br>
            </div>


            <div>

                <!-- need to add validation to be a # -->
                <label for="prod_price"> Item Price: </label><br>
                <input type="text" id="prod_price" name="prod_price">
                <br>
                <br><br>
            </div>

            <div>
                <!-- need to add validation to be a # -->
                <label for="prod_quantity">Item Quantity: </label><br>
                <input type="text" id="prod_quantity" name="prod_quantity">
                <!-- value is making the form hold its value after submit if there wa an error -->
                <br>
                <br><br>
            </div>

            <div>
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
            </div>


            <br><br>

            <div>
                <!-- Asking for date purchased -->
                <label for="prod_date_purchased"> Date Purchased: </label><br>
                <input type="text" id="prod_date_purchased" name="prod_date_purchased">
                <br>
                <br><br>
            </div>

            <div>
                <!-- need to add validation to be a # -->
                <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                <input type="text" id="prod_purchase_cost" name="prod_purchase_cost">
                <br>
                <br><br>
            </div>



            <input type="submit" name="submit" value="Update Product"><br>

    </div>

    </form>

    </div>

</body>

</html>