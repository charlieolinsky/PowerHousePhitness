<?php
    include_once("../include/global_inc.php");
    Roles::minAccess(3, "../UI/index.php");
    $s = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
</head>
<body>
    <div>
        <h3>Employee Portal - General Employee </h3>
        <a href="equip-rental-employee.php">Manage Equipment Rental</a><br>

        <br><br><!--Hi Erica! I know how much you love these break statements xoxo -charlie -->
        <a href="../UI/index.php">Return Home</a>
    </div> 

    
    
</body>
</html>