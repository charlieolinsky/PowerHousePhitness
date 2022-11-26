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

<body style= "background-color: var(--dark-color)">
     <!-- NAV BAR -->
     <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="adminDirectory.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
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
    <main style="text-align: center">
        <div class="admin-title">
            <h1 style="color: var(--primary-color)">Add Inventory Item</h1>
        </div>

            <!-- this line works! -- nvm this doesnt work anymore lmfao -->
            <!-- <form action="<?php // echo $_SERVER['PHP_SELF']; 
                                ?>" method="POST"> -->
            <!-- this line doesnt do datavalidation but DOES insert into b -->
            <form action="../include/add-products.php" method="POST" enctype="multipart/form-data">
                <!-- <form action="admin-inventory-new.php" method="POST"> -->

                <!-- data validation -->
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
                    } else if (!is_numeric($_POST['prod_price'])) {
                        $price_error = "Invalid input, please enter a number.";
                    }

                    //Quantity Validation 
                    if (empty($_POST['prod_quantity'])) {
                        $quantity_error = "Please enter a quantity";
                    } else if (!is_numeric($_POST['prod_quantity'])) {
                        $quantity_error = "Invalid input, please enter a number.";
                    }

                    //Date Purchased Validation
                    if (empty($_POST['prod_date_purchased'])) {
                        $purchase_date_error = "Please enter a purchase date";
                    }

                    //Vendor Validation
                    //Date Purchased Validation
                    if (empty($_POST['VENDOR_ID'])) {
                        $vendor_error = "Please select a Vendor";
                    }

                    //Purchase Price Validation
                    if (empty($_POST['prod_purchase_cost'])) {
                        $purchase_cost_error = "Please enter a price";
                    } else if (!is_numeric($_POST['prod_price'])) {
                        $purchase_cost_error = "Invalid input, please enter a number.";
                    }
                }
                ?>

                <div class = "inventory-container">
                    <div class="row">
                        <div class="column" style="padding: 4px">
                             <!-- the name="__" field is what connects this form to the querying file -->
                            <label for="prod_name"> Item Name:</label><br>
                            <input type="text" id="prod_name" name="prod_name" value="<?php if (isset($_POST['prod_name'])) echo $_POST['prod_name']; ?>">
                            <span> <?php if (isset($name_error)) echo $name_error; ?> </span>

                            <br><br>

                            <!-- asking for prod description -->
                            <label for="prod_desc"> Item Description:</label><br>
                            <input type="text" id="prod_desc" name="prod_desc" value="<?php if (isset($_POST['prod_desc'])) echo $_POST['prod_desc']; ?>">
                            <span> <?php if (isset($desc_error)) echo $desc_error; ?> </span>

                            <br><br>

                             <!-- need to add validation to be a # -->
                            <label for="prod_price"> Item Price: </label><br>
                            <input type="text" id="prod_price" name="prod_price" value="<?php if (isset($_POST['prod_price'])) echo $_POST['prod_price']; ?>">
                            <span> <?php if (isset($price_error)) echo $price_error; ?> </span>

                        </div>

                        <br>

                        <div class="column" style="padding: 4px">
                             <!-- need to add validation to be a # -->
                            <label for="prod_quantity">Item Quantity: </label><br>
                            <input type="text" id="prod_quantity" name="prod_quantity" value="<?php if (isset($_POST['prod_quantity'])) echo $_POST['prod_quantity']; ?>">
                            <!-- value is making the form hold its value after submit if there wa an error -->
                            <span> <?php if (isset($quantity_error)) echo $quantity_error; ?> </span>

                            <br><br>

                            <!-- Asking for date purchased -->
                            <label for="prod_date_purchased"> Date Purchased: </label><br>
                            <input type="text" id="prod_date_purchased" name="prod_date_purchased" value="<?php if (isset($_POST['prod_date_purchased'])) echo $_POST['prod_date_purchased']; ?>">
                            <span> <?php if (isset($purchase_date_error)) echo $purchase_date_error; ?> </span>

                            <br><br>

                            <!-- need to add validation to be a # -->
                            <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                            <input type="text" id="prod_purchase_cost" name="prod_purchase_cost" value="<?php if (isset($_POST['prod_purchase_cost'])) echo $_POST['prod_purchase_cost']; ?>">
                            <span> <?php if (isset($purchase_cost_error)) echo $purchase_cost_error; ?> </span>

                            <br><br>

                             <!-- Need to add a way to upload-->
                            <!-- <label for="prod_image"> Item Image: </label><br>
                            <input type="file" name="prod_image"> -->
                        </div>
                    </div>

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
                                    echo "<option value=" . $row['VENDOR_ID'] . ">" . $row['v_name'] . "</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                            <span> <?php if (isset($vendor_error)) echo $vendor_error; ?> </span>

                    <br>
                    <br>

                    <!-- Need to add a way to upload-->
                    <label for="prod_image"> Item Image: </label><br>
                    <input type="file" name="prod_image">
                
                    <br>

                    <button type="submit" class="form-control" id="submit-button" name="submit">Submit Item</button>
                </div>
                </form>
                <div style="margin-top:660px">
                    <a href="admin-inventory-home.php" class="btn custom-btn bg-color">Return to Admin Home</a>
                </div>
                
    </main>
</body>
</html>