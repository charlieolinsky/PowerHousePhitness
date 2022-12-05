<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 
    
    //Only admins can view the admin directory 
    Roles::minAccess(5, "../forms/financialDirectory.php"); 
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>


<body style="background-color: var(--dark-color)">
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <!-- PHP Logo -->
            <a class="navbar-brand" href="../forms/adminDirectory.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
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

    <br><br><br>
    <main style="text-align: center">
        <div class="admin-title">
            <h1 style="color: var(--primary-color)">Admin Portal</h1>
        </div>

    <div>

    <div class="inventory-container">
        <div class="column">
            <h3>Administrator</h3>
            <!-- Edit a User button -->
            <a href="admin_search_users.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Edit a User</a>
            <br>
            <!-- Manage Inventory button -->
            <a href="admin-inventory-home.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Manage Inventory</a>
            <br>
            <!-- Add New Class button -->
            <a href="admin_add_class.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Add New Class</a>
            <br>
            <!--Edit Class button> -->
            <a href="admin_select_class.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Edit Existing Class</a>

            <br><br> 

            <h3>General Employee </h3>
            <!-- Manage Equipment Rental button -->
            <a href="equip-rental-employee.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Manage Equipment Rental</a>
           

            <br><br>

            <h3>Finance Personnel </h3>
            <!-- Reports button -->
            <a href="../forms/FinancialReports.php" class="btn edit-btn bg-color" style="margin-top: 5px; min-width: -webkit-fill-available">Reports</a>

            <br><br>
            <a href="../UI/index.php" class="btn class-btn bordered mt-3" style="margin-top: 5px; min-width: -webkit-fill-available">Return Home</a>
            <!-- <a href="../UI/index.php">Return Home</a> -->
        </div> 
    </div>
    
</body>
</html>