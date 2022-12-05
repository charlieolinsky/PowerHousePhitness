<!-- BEESANNE ORGINAL PHP CODE FOR ADMIN-INVENTORY-UPDATE.PHP WITHOUT UI -->
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
    <br><br><br>
    <div>
        <h1> Admin Inventory - Update Existing Item</h1>
        <form action="../include/update-product.php" method="POST">
            <!-- <form action=<?php //echo $_SERVER['PHP_SELF']; 
                                ?> method="POST"> -->

            <div>
                <!-- Asking for Vendor ID -->
                <label for="PROD_ID">Item: </label><br>

                <?php

                include_once("../sql/connect.php");

                // query to get only the vendor ID for the dropdown menu
                $namequery = "SELECT * FROM `prod_data`";
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
            <br><br>
            <div>
                <!-- asking for prod description -->
                <label for="prod_name"> Item name:</label><br>
                <input type="text" id="prod_name" name="prod_name">
            </div>
            <br><br>
            <div>
                <!-- asking for prod description -->
                <label for="prod_desc"> Item Description:</label><br>
                <textarea id="prod_desc" name="prod_desc"></textarea>
            </div>
            <br><br>
            <div>
                <!-- Need to add a way to upload-->
                <label for="prod_image"> Item Image: </label><br>
                <input type="file" name="prod_image">
            </div>
            <br><br>

            <div>

                <!-- need to add validation to be a # -->
                <label for="prod_price"> Item Price: </label><br>
                <input type="text" id="prod_price" name="prod_price">
                
            </div>
            <br><br>
            <div>
                <!-- need to add validation to be a # -->
                <label for="prod_quantity">Item Quantity: </label><br>
                <input type="text" id="prod_quantity" name="prod_quantity">
                <!-- value is making the form hold its value after submit if there wa an error -->
               
            </div>
            <br><br>
            <div>
                <!-- Asking for Vendor ID -->
                <label for="VENDOR_ID">Vendor: </label><br>

                <?php

                include_once("../sql/connect.php");

                // query to get only the vendor ID for the dropdown menu
                $vendorquery = "SELECT * FROM vendor_id";
                if ($r_set = $dbconn->query($vendorquery)) {
                    echo "<SELECT name='VENDOR_ID'>";
                    echo "<option></option>";

                    while ($row = $r_set->fetch_assoc()) {
                        // echo"<option value=$row[VENDOR_ID]>Vendor $row[VENDOR_ID]: $row[v_name]</option>";
                        // <option value=""></option>
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
               
            </div>
            <br><br>
            <div>
                <!-- need to add validation to be a # -->
                <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                <input type="text" id="prod_purchase_cost" name="prod_purchase_cost">
                
            </div>
            <br><br>


            <input type="submit" name="submit" value="Update Product"><br>

    </div>

    </form>

    </div>

</body>

</html>