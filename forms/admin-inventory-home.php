<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Inventory Home</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<body>
    <div>
        <a href="admin-inventory-new.php"> <button> Add New Inventory Item</button></a>
        <a href="admin-inventory-update.php"> <button> Update Current Inventory Item</button></a>
        <div class="rental-products">
            <!-- FILE TO QUERY DATA  -->
            <?php include_once("../include/load-product-rentals.php"); ?>

            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result->fetch_assoc()) {
            ?>
                <div>
                    <!-- <form action="equip-rental-member.php" method="post"> -->
                        <div>
                            <div>
                                <?php echo "<img src=$rows[prod_image]>" ?>
                            </div>
                            <div>
                                <h5><?php echo $rows['prod_name']; ?></h5>
                                <p>
                                    <?php echo $rows['prod_desc']; ?>
                                </p>
                                <p>
                                    <span><?php echo "$" . $rows['prod_price']; ?></span>
                                </p>
                                <p>
                                    <?php echo "Quantity owned: " . $rows['prod_quantity']; ?>
                                </p>
                                <p>
                                    <?php echo "Vendor purchased from: " .$rows['VENDOR_ID']; ?>
                                </p>
                                <p>
                                    <?php echo "Last purchase date: " .$rows['prod_purchase_date']; ?>
                                </p>
                                <p>
                                    <?php echo "Last purchase price: $" .$rows['prod_purchase_cost']; ?>
                                </p>
                                <a href="admin-inventory-update.php"> <button> Update Item</button></a>
                                <!-- <button type="submit" name="add">Add to Cart </button> -->
                                <!-- <input type='hidden' name='prod_id' value="<?php echo $rows['PROD_ID'] ?>"> -->
                            </div>
                        </div>
                    </form>
                <?php
            }
                ?>
                </div>

        </div>


        <!-- <input type="button" name="Add New" value="Add New"> -->
    </div>
</body>

</html>