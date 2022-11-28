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
    <title>ADMIN</title>
</head>
<body>
    <div>
        <h1>Admin Portal</h1>

        <h3>Administrator</h3>
        <a href="admin_search_users.php">Edit a User</a><br>
        <a href="admin-inventory-home.php">Manage Inventory</a><br>
        <a href="admin_add_class.php">Add New Class</a><br>
        <a href="admin_select_class.php">Edit Existing Class</a>

        <br> <!--Hi Erica! I know how much you love these break statements xoxo -charlie -->

        <h3>General Employee </h3>
        <a href="equip-rental-employee.php">Manage Equipment Rental</a>

        <br> <!--Hi Erica! I know how much you love these break statements xoxo -charlie -->

        <h3>Finance Personnel </h3>
        <a href="../classes/FinancialReports.php">Reports</a>

        <br><br><br><!--Hi Erica! I know how much you love these break statements xoxo -charlie -->
        <a href="../UI/index.php">Return Home</a>
    </div> 
    
</body>
</html>