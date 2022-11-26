<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 
    
    //Only admins can view the admin directory 
    Roles::minAccess(5, "../UI/index.php"); 
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
        <h3>Admin Privileges: </h3>
        <a href="admin_search_users.php">Search for a User</a><br>
        <a href="admin-inventory-home.php">View Inventory</a>

        <br> <!--Hi Erica! I know how much you love these break statements xoxo -charlie -->

        <h3>Employee Privileges: </h3>
        <a href="equip-rental-employee.php">Manage Equipment Rental</a>

        <br> <!--Hi Erica! I know how much you love these break statements xoxo -charlie -->

        <h3>Finance: </h3>
        <a href="../classes/FinancialReports.php">Reports</a>
    </div> 
    
</body>
</html>