<!DOCTYPE html>
<html lang="en">
<head>

     <title>Services</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="./css/bootstrap.min.css">
     <link rel="stylesheet" href="./css/font-awesome.min.css">
     <link rel="stylesheet" href="./css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="./css/tooplate-php-style.css">
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
--> </head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50"></body>
     <!-- MENU BAR -->
     <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php"><span style="color: var(--primary-color)">P</span>ower <span style="color: var(--primary-color)">H</span>ouse <span style="color: var(--primary-color)">P</span>hitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About Us</a>
                    </li>

                    <li class="dropdown">
                        <button class="dropbtn" id="dropdownMenuButton" data-toggle="dropdown"> Services
                            <i class="fa fa-caret-down"></i>
                        </button>

                        <div class="dropdown-content">
                            <a href="services.php">Classes </a>
                            <a href="services.php#membership">Memberships </a>
                            <a href="..\forms\equip-rental-member.php">Equipment </a>
                        </div> 
                    </li>

                    <li class="nav-item">
                        <a href="schedule.php" class="nav-link">Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>

                <!-- Add User icon -->
                <ul class="social-icon ml-lg-3">
                        <li><a href="../forms/account_tab.php" class="fa fa-user"></a></li>
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



    <section class="class section" id="membership">
        <div class="container">
             <div class="row">
                     <div class="col-lg-12 col-12 text-center mb-5">
                         <h6 data-aos="fade-up">Become a member today</h6>

                         <h2 data-aos="fade-up" data-aos-delay="200">Our Membership Plans</h2>
                      </div>

                     <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                         <div class="class-thumb">
                             <img src="images/class/yoga-class.jpg" class="img-fluid" alt="Class">

                             <div class="class-info">
                                 <h3 class="mb-1">Basic</h3>

                                 <span><strong>Daily Fee</strong></span>

                                 <span class="class-price">$15</span>

                                 <p class="mt-3">If you already have a PHP User account, no need to sign up! You may use the gym, rent equipment, and particpate in classes for a fee when you use PHP utilities.</p>
                                 <br>
                             </div>
                         </div>
                     </div>

                     <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                         <div class="class-thumb">
                             <img src="images/class/crossfit-class.jpg" class="img-fluid" alt="Class">

                             <div class="class-info">
                                 <h3 class="mb-1">Premium</h3>

                                 <span><strong>Monthly Payment</strong></span>

                                 <span class="class-price">$25</span>

                                 <p class="mt-3">Receive access to the gym, equipment rental, and classes with no other fees. <br> </p>
                                 <p class="mt-3"> Note: Membership fee will be due on the 1st of every month </p>
                             </div>
                         </div>
                     </div>

                     <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                         <div class="class-thumb">
                             <img src="images/class/cardio-class.jpg" class="img-fluid" alt="Class">

                             <div class="class-info">
                                 <h3 class="mb-1">Premium</h3>

                                 <span><strong>Annual Payment</strong></span>
                                 <br>
                                 <span><strong>($22.50 per month)</strong></span>


                                 <span class="class-price">$270</span>

                                 <p class="mt-3">Receive access to the gym, equipment rental, and classes with no other fees.</p>
                                 <!-- <p class="mt-3"> Note: Save $30 a year with this plan </p> -->
                                 <br>
                                 <br>
                             </div>
                         </div>
                     </div>

             </div>
             
             <div class="button-container">
                    <a href="#" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300" data-toggle="modal" data-target="#membershipForm">Become a member today</a>
             </div>

        </div>
    </section>

    <section class="class section" id="classes">
        <div class="container">
            <div class="column">

                <div class="class-signup">
                    <div class="row">
                        <h3 class="mb-1">Yoga</h3>
                    </div>
                </div>
                
                <div class="class-signup">
                    <div class="row">
                        <h3 class="mb-1">Power Fitness</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </section>        



    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">

            <h2 class="modal-title" id="membershipFormLabel">Membership Form</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form class="membership-form webform" role="form">
                <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                <!-- <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required> -->

                <!-- <textarea class="form-control" rows="3" name="cf-message" placeholder="Additional Message"></textarea> -->

                <p class="mt-3">Select one:</p>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="monthly">
                    <label class="custom-control-label text-small text-muted" for="monthly"> Premium (Monthly)</label>
                </div>
                
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="annual">
                    <label class="custom-control-label text-small text-muted" for="annual"> Premium (Annual)</label>
                </div>


                <button type="submit" class="form-control" id="submit-button" name="submit">Submit</button>

                
            </form>
          </div>

          <div class="modal-footer"></div>

        </div>
      </div>
    </div>


    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/aos.js"></script>
    <script src="./js/smoothscroll.js"></script>
    <script src="./js/custom.js"></script>  

</html>   

<?php 

    /*****************************************MEMBERSHIP**************************************/

    //If user is not a free member, redirect them to login where they have the option to register as well. 
    function access($rank)
    { 
        if(isset($_SESSION["role"]) && $_SESSION["role"] < $rank) 
        {
            header("Location: loginUI.php");
            die;
        }
    }
    $minRank = 1;
    access($minRank);



    //If the user is a member already, we need to upgrade their membership.
    include_once("./include/global_inc.php");
    
    $userRank = $_SESSION['roles'];
    $userID = $_SESSION['user_id'];

    $sql = $dbconn -> query("UPDATE user_table SET roles = $userRank+1, WHERE USER_ID = $userID"); 






    

    





    



    

?>
