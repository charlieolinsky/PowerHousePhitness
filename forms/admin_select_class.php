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
    <title>ADMIN</title>

    <script type="text/javascript">
        <?php 
            include_once("../classes/Roles.php");
            Roles::minAccess(5, "../UI/index.php"); 
        ?>
    </script>
</head>
<body>
    <h1>Edit Class</h1>

    <div>
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

            <input type="submit" value="Edit" id="submit1">
        </form>

        
    </div>
    
</body>
</html>