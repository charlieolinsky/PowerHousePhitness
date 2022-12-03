<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 

    if(isset($_SESSION["msg"]) && isset($_SESSION["nextUrl"]) && isset($_SESSION["docTitle"]) && isset($_SESSION["nextName"])){
        $msg = $s->read("msg");
        $next = $s->read("nextUrl");
        $doc = $s->read("docTitle");
        $nextN = $s->read("nextName");
    }
    else{
        header("Location: ../UI/index.php");
        die(); 
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
        <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
        <link rel="stylesheet" href="../UI/css/aos.css">
        <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

        <title><?= $doc; ?></title>
    </head>
    <body>
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

        <!-- Redirect Message -->
        <br><br><br><br>
        <main style="text-align: center; text-transform: inherit">
            <h2><?= $msg ?></h2>
            <a href=<?= $next ?>> <?= $nextN; ?></a>  
        </main>
        
    </body>
    
</html>