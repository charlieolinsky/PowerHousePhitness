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

<body style="background-color: var(--dark-color); text-align: center">
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <!-- PHP Logo -->
            <a class="navbar-brand" href="../forms/adminDirectory.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Create list of links/buttons for different pages -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <!-- Add and link Index page -->
                    <li class="nav-item">
                        <a href="../UI/index.php" class="nav-link smoothScroll">Home</a>
                    </li>

                    <!-- Add and link About page -->
                    <li class="nav-item">
                        <a href="../UI/about.php" class="nav-link">About Us</a>
                    </li>

                    <!-- Create dropdown menu -->
                    <li class="dropdown">
                        <button class="dropbtn" id="dropdownMenuButton" data-toggle="dropdown"> Services
                            <i class="fa fa-caret-down"></i>
                        </button>

                        <div class="dropdown-content">
                            <a href="../UI/services.php#classes">Classes </a>
                            <a href="../UI/services.php#membership">Memberships </a>
                            <a href="../forms/equip-rental-member.php">Equipment </a>
                        </div>
                    </li>

                    <!-- Add and link Schedule page -->
                    <li class="nav-item">
                        <a href="../UI/schedule.php" class="nav-link">Schedule</a>
                    </li>

                    <!-- Add and link contact section -->
                    <li class="nav-item">
                        <a href="../UI/index.php#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
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


    <br><br><br><br>

    <div class="admin-title">
        <h1 style="color: var(--primary-color)">CURRENT INVENTORY</h1>
    </div>
    <div class="admin-title">
        <a href="admin-inventory-new.php" class="btn custom-btn bg-color mt-3">Add New Inventory Item</a>
        <a href="admin-inventory-update.php" class="btn custom-btn bg-color mt-3">Update Inventory Item</a>
    </div>


    <!-- FILE TO QUERY DATA  -->
    <?php include_once("../include/load-product-rentals.php"); ?>

    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
    <?php
    // LOOP TILL END OF DATA
    while ($rows = $result->fetch_assoc()) {
    ?>
        <div class="admin-container">
            <div class="row">
                <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12">
                    <div class="admin-info">
                        <!-- display image -->
                        <?php echo "<img src=$rows[prod_image]>" ?>
                    </div>
                </div>

                <!-- DISPLAY PROD INFORMATION  -->
                <div class="admin-description">
                    <h3 class="mb-1">
                        <!-- display name -->
                        <span style="color: var(--primary-color)"><?php echo $rows['prod_name']; ?></span>
                    </h3>
                    <!-- display description -->
                    <p><?php echo $rows['prod_desc']; ?></p>
                    <h5>
                        <!-- display in stock -->
                        <span style="color: var(--white-color)"><?php echo "Current available: " . $rows['prod_quantity']; ?></span>
                        <br>
                        <!-- display total rented -->
                        <span style="color: var(--white-color)"><?php echo "Total checked out: " . $rows['total_rented']; ?></span>
                        <br>
                        <!-- display vendor  -->
                        <span style="color: var(--white-color)"><?php echo "Vendor purchased from: " . $rows['VENDOR_ID']; ?></span>
                        <br>
                        <!-- display last time item was purchased -->
                        <span style="color: var(--white-color)"><?php echo "Last purchase date: " . $rows['prod_date_purchased']; ?></span>
                        <br>
                        <!-- display last purchase price -->
                        <span style="color: var(--white-color)"><?php echo "Last purchase price: $" . $rows['prod_purchase_cost']; ?></span>
                    </h5>

                    <h4 class="mb-1">
                        <!-- display rental cost -->
                        <span style="color: var(--primary-color)"><?php echo "Rental cost: $" . $rows['prod_price']; ?></span>
                    </h4>
                </div>
            </div>
        </div>

    <!-- END PHP WHILE LOOP -->
    <?php
    }
    ?>

</body>

</html>