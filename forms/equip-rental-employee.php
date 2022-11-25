<!-- code that will have waht appears when general employee checks something back in -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Rental Portal</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<body style = "text-align: center">
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <!-- PHP Logo -->
            <a class="navbar-brand" href="index.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

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

                    <li class="nav-item">
                    <a href="../UI/index.php#contact" class="nav-link smoothScroll">Contact</a>
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

    <!-- Page Title -->
    <div class="equip-title">
        <h1 style="color: var(--primary-color)">Equiptment Rental Employee Portal</h1>
    </div>

        <!-- FILE TO QUERY DATA  -->
        <?php
        include_once("../include/load-checked-prods.php");
        ?>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
        ?>
            <!-- Container for equipment photo & info -->
            <div class="equip-container">
                <!-- Setting row containers -->
                <div class="row">

                <!-- <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
                <form method="post">

                    <!-- Sizing and placing the photo of equipment -->
                    <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12">
                        <div class="equip-info">
                            <?php echo "<img src=$rows[prod_image]>" ?>
                        </div>
                    </div>

                    <!-- Container for description of equipment -->
                    <div class="equip-description">
                        <!-- Text for title of equipment -->
                        <h3 class="mb-1"><?php echo $rows['prod_name']; ?></h3>
                        <!-- Text for product description from database table -->
                        <p><?php echo $rows['prod_desc']; ?></p>
                        <!-- Text for price of product -->
                        <h4 class="mb-1">
                            <span style="color: var(--primary-color)"><?php echo "$" . $rows['prod_price']; ?></span>
                        </h4>
                        <!--  -->
                        <h5>
                            <span><?php echo "Total Checked out: " . $rows['total_rented']; ?></span>
                        </h5>

                            <input type="submit" class="btn cart-btn mt-3" name="return" value="Return Item">

                            <input type="hidden" name="PROD_ID" value="<?php echo $rows['PROD_ID'] ?>">
                            <input type="hidden" name="total_rented" value="<?php echo $rows['total_rented'] ?>">

                    </div>
                </form>
            </div>
        </div>
    <?php
    }

        // $return = $_POST['return'];
       
            ?>
            </div>

    </div>

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>

</html>