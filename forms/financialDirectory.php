<?php
    include_once("../include/global_inc.php");
    Roles::minAccess(4, "employeeDirectory.php");
    $s = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE</title>
</head>
<body>
    <div>
        <h1>Finance Portal</h1>
        
        <br>
        
        <a href="../classes/FinancialReports.php">Reports</a>

        <br><br><!--Hi Erica! I know how much you love these break statements xoxo -charlie -->

        <a href="../UI/index.php">Return Home</a>
    </div> 
    
</body>
</html>