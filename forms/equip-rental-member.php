<!-- code for where a member will check out equipment -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equiptment Rental</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

</head>

<body>
<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="../UI/index.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

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

<main>
    <h1>Equiptment Rental Portal</h1>
    <h4>Need to rent equipment while visiting our facility? We have a variety of options from basketballs
        to shoot hoops, to frisbees to toss around our open gym!
    </h4>
    <p>Rentals must be returned before close on the day item was checked out.
        Please visit our front desk to pick up and return your items.
    </p>

    <div class="rental-products">
        <!-- FILE TO QUERY DATA  -->
        <?php

        //start session 
        //TESTING CODE TO ADD ITEM TO AN INDIVIDUALS CLASS
        // session_start();
        // if (isset($_POST['add'])) {
        //     if (isset($_SESSION['cart'])) {
        //         $item_array_id = array_column($_SESSION['cart'], "prod_id");
        //         $count = count($_SESSION['cart']);
        //         $item_array = array(
        //             'prod_id' => $_POST['prod_id']
        //         );
        //         $_SESSION['cart'][$count] = $item_array;
        //     } else {
        //         $item_array = array(
        //             'prod_id' => $_POST['prod_id']
        //         );
        //         //create new session
        //         $_SESSION['cart'][0] = $item_array;
        //         print_r($_SESSION['cart']);
        //     }
        // }
        //END OF CODE TESTING 
        // session_destroy();



        include_once("../include/load-product-rentals.php");
        ?>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
        ?>
            <div>
                <form action="equip-rental-member.php" method="post">
                    <div>
                        <div>
                            <?php echo "<img src=$rows[prod_image]>" ?>
                        </div>
                        <div>
                            <h5><?php echo $rows['prod_name']; ?></h5>
                            <p>
                                <?php echo $rows['prod_desc']; ?>
                            </p>
                            <h5>
                                <span><?php echo "$" . $rows['prod_price']; ?></span>
                            </h5>
                            <button type="submit" name="add">Add to Cart </button>
                            <input type='hidden' name='prod_id' value="<?php echo $rows['PROD_ID'] ?>">
                        </div>
                    </div>
                </form>
            <?php
        }
            ?>
            </div>

    </div>



</main>
</body>

</html>