<!-- BEESANNE ORGINAL PHP CODE FOR ADMIN-INVENTORY-HOME.PHP WITHOUT UI -->
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
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="../UI/index.php" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="../UI/about.php" class="nav-link">About Us</a>
                    </li>

                    <li class="dropdown">
                        <button class="dropbtn" id="dropdownMenuButton" data-toggle="dropdown"> Services
                            <i class="fa fa-caret-down"></i>
                        </button>

                        <div class="dropdown-content">
                            <a href="../UI/services.php">Classes </a>
                            <a href="../UI/services.php#membership">Memberships </a>
                            <a href="../forms/equip-rental-member.php">Equipment </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="../UI/schedule.php" class="nav-link">Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a href="../UI/index.php#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="#" class="fa fa-user"></a></li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="../forms/shoppingcart.php" class="fa fa-shopping-cart"></a></li>
                </ul>

                <!-- <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com/tooplate" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul> -->

            </div>

        </div>
    </nav>
<br><br><br><br>
    <div>
        <a href="admin-inventory-new.php"> <button> Add New Inventory Item</button></a>
        <a href="admin-inventory-update.php"> <button> Update Current Inventory Item</button></a>
        
        
        <div class="rental-products">
            <h2> VIEW CURRENT INVENTORY </h2>
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
                                <?php echo "Vendor purchased from: " . $rows['VENDOR_ID']; ?>
                            </p>
                            <p>
                                <?php echo "Last purchase date: " . $rows['prod_date_purchased']; ?>
                            </p>
                            <p>
                                <?php echo "Last purchase price: $" . $rows['prod_purchase_cost']; ?>
                            </p>
                            <!-- <a href="admin-inventory-update.php"> <button> Update Item</button></a> -->
                            <!-- <button type="submit" name="update-prod">Update Prod </button> -->
                            <!-- <input type="submit" value="update"> -->
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