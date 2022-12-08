<!-- CODE FOR EQUIP-RENTAL-MEMBER.PHP WITH UI -->
<!-- code for where a member will check out equipment -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Rental</title>

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

    <main>
        <!-- Title and page description -->
        <div class="equip-title">
            <h1 style="color: var(--primary-color)">Equipment Rental Portal</h1>
            <h4>Need to rent equipment while visiting our facility? We have a variety of options from basketballs
                to shoot hoops, to frisbees to toss around our open gym!
            </h4>
            <p>Rentals must be returned before close on the day item was checked out.
                Please visit our front desk to pick up and return your items.
            </p>
        </div>
  

        <!-- FILE TO QUERY DATA  -->
        <?php
        include_once("../include/load-product-rentals.php");
        ?>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
        ?>
            <div class="equip-container">
                <div class="row">

                    <!-- form to add items to the cart -->
                    <form action="../forms/shoppingcart.php" method="POST">                 

                        <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12">
                            <div class="equip-info">
                                <!-- display image -->
                                <?php echo "<img src=$rows[prod_image]>" ?>  
                            </div>
                        </div>
                        <div class="equip-description">
                            <!-- display name -->
                            <h3 class="mb-1"> <?php echo $rows['prod_name']; ?> </h3>
                            <!-- display description -->
                            <p><?php echo $rows['prod_desc']; ?></p>
                            <h4 class="mb-1">
                                <!-- display price -->
                                <span style="color: var(--primary-color)"><?php echo "$" . $rows['prod_price']; ?></span>
                            </h4>

                           
                            <!-- hidden fields needed to pass data to cart -->
                            <input type="hidden" name="PROD_ID" value="<?php echo $rows['PROD_ID'] ?>">
                            <input type="hidden" name="prod_price" value="<?php echo $rows['prod_price'] ?>">
                            <input type="hidden" name="prod_name" value="<?php echo $rows['prod_name'] ?>">


                            <!-- setting the button text, if out of stock disable -->
                            <?php 
                            $status;
                            if ($rows['prod_quantity'] <= 0 ){
                                $status = 'outofstock';
                            } else{
                                $status = 'instock';                            
                            }

                            ?> 
                            <input 
                                    type="submit" 
                                    class="btn cart-btn mt-3" 
                                    name="addToCart" 
                                    value="<?php 
                                            if($status == 'outofstock'){?>Currently Unavailable <?php ; } 
                                            if($status == 'instock'){?> Add to Cart <?php ;} ?>"
            
                                            <?php if ($status == 'outofstock'){ ?> disabled <?php } ?>
                                    >

                            
                            
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>

        </div>




    </main>
</body>

</html>