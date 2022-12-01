<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 


    //Retrieve all Classes
    $all_classes = $dbconn->query("SELECT class_name FROM classes");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">


    <script type="text/javascript">
        <?php 
            include_once("../classes/Roles.php");
            Roles::minAccess(5, "../UI/index.php"); 
        ?>
    </script>
</head>
<body style="background-color: var(--dark-color); text-align: center">
    <div class="admin-title" style= "margin-top:275px">
        <h1 style="color: var(--primary-color)">Edit Class</h1>
    </div>

    <div class="inventory-container" style= "margin-top: 60px">
        <div class="column">
            <div class="row">
                <form action='admin_update_class.php' method="POST">
                    <label>Select a Class: </label>

                    <!-- ERICA IN-LINE STYLE ALERT  -->
                    <select name="classes_dropdown" style="width: 300px;">
                        <?php
                            // use a while loop to fetch data from the $all_classes variable
                            while ($class = mysqli_fetch_array($all_classes, MYSQLI_ASSOC)):;
                        ?>
                            <option value="<?php echo $class["class_name"];?>"> <?php echo $class["class_name"]; ?> </option>   
                        <?php
                            // While loop must be terminated
                            endwhile;
                        ?>
                    </select>
            </div>
            <input type="submit" class="btn edit-btn" id="submit1" value="Edit" style="margin-top: 5px; width: 100px">
        </div>
    </div>

    <div style="margin-top:290px">
        <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
    </div>
    
</body>
</html>