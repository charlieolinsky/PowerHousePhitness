<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory</title>
    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">
</head>

<body style= "background-color: var(--dark-color)">
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
            <h1 style="color: var(--primary-color)">Update Inventory</h1>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    

        <div class = "inventory-container">
            <div class="row">
                <div class="column" style="padding: 4px">
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

                    <br><br>

                    <!-- asking for prod name -->
                    <label for="prod_name"> Item name:</label><br>
                    <input type="text" id="prod_name" name="prod_name">

                    <br><br>

                     <!-- need to add validation to be a # -->
                    <label for="prod_price"> Item Price: </label><br>
                    <input type="text" id="prod_price" name="prod_price">

                    <br><br>

                    <!-- need to add validation to be a # -->
                    <label for="prod_quantity">Item Quantity: </label><br>
                    <input type="text" id="prod_quantity" name="prod_quantity">
                    <!-- value is making the form hold its value after submit if there wa an error -->

                </div>

                <div class="column" style="padding: 4px">
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

                    <br><br>

                    <!-- Asking for date purchased -->
                    <label for="prod_date_purchased"> Date Purchased: </label><br>
                    <input type="text" id="prod_date_purchased" name="prod_date_purchased">

                    <br><br>

                    <!-- need to add validation to be a # -->
                    <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                    <input type="text" id="prod_purchase_cost" name="prod_purchase_cost">

                    <br><br>

                    <!-- asking for prod description -->
                    <label for="prod_desc"> Item Description:</label><br>
                    <textarea id="prod_desc" name="prod_desc"></textarea>
                </div>
            </div>   
            
            <br>

             <!-- Need to add a way to upload-->
             <label for="prod_image"> Item Image: </label><br>
                <input type="file" name="prod_image">

            <br><br>

             <!-- Delete Item Button -->
             <div class="column" style="justify-content: center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">  
                <!-- <form action="../include/update-product.php" method="POST">   -->
                <input type="submit" class="btn edit-btn" style="margin-top: 5px" name ="delete" value="Delete Item"
                onclick="return confirm('Are you sure you want to delete this item?')">
              </div>


            <button type="submit" class="form-control" id="submit-button" name="submit">Update</button>
        </div>
        </form>
        <div style="margin-top:680px">
            <a href="admin-inventory-home.php" class="btn custom-btn bg-color">Return to Admin Home</a>
        </div>
</body>
</html>

<?php include_once("../include/update-product.php"); ?>