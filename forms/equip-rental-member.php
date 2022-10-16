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
<link rel="stylesheet" href="../UI/css/tooplate-gymso-style.css">




</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">
<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg fixed-top">
<div class="container">

<a class="navbar-brand" href="index.html">Power House Phitness</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav ml-lg-auto">
<li class="nav-item">
<a href="#home" class="nav-link smoothScroll">Home</a>
</li>

<li class="nav-item">
<a href="about.html" class="nav-link">About Us</a>
</li>

<li class="nav-item">
<a href="#class" class="nav-link smoothScroll">Classes</a>
</li>

<li class="nav-item">
<a href="#schedule" class="nav-link smoothScroll">Schedules</a>
</li>

<li class="nav-item">
<a href="#contact" class="nav-link smoothScroll">Contact</a>
</li>
</ul>

<ul class="social-icon ml-lg-3">
<li><a href="https://fb.com/tooplate" class="fa fa-facebook"></a></li>
<li><a href="#" class="fa fa-twitter"></a></li>
<li><a href="#" class="fa fa-instagram"></a></li>
</ul>
</div>

</div>
</nav>
<br><br><br>

<main> 
<h1>Equiptment Rental Portal</h1>
<p>Need to rent equipment while visiting our facility? We have a variety of options from basketballs to shoot hoops, to frisbees to toss around our open gym!
</p>

<div class = "rental-products">
<!-- where the inventory list for rentals will appear with buttons on how to work -->
<!-- FILE TO QUERY DATA  -->
<?php 
include_once("../include/load-data.php");
?>
<table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>

            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['prod_name'];?></td>
                <td><?php echo $rows['prod_price'];?></td>
                <td><?php echo $rows['prod_desc'];?></td>
                <td><?php echo $rows['prod_quantity'];?></td>


            </tr>
            <?php
                }
            ?>
    </table>
</div>
</main>
</body>
</html>