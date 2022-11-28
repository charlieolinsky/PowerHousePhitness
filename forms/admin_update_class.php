<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 
    $s->write('classes_dropdown', $_POST['classes_dropdown']);

    //Fetch Class data for form 
    $class = trim(mysqli_real_escape_string($dbconn, $_POST['classes_dropdown']));
    $class_data = $dbconn->query("SELECT * FROM classes WHERE class_name='".$class."'");

    //Pass CLASS_ID to Sessions 
    $CLASS_ID = $dbconn->query("SELECT CLASS_ID FROM classes WHERE class_name='".$class."'");
    $CLASS_ID = $CLASS_ID->fetch_assoc(); 
    $s->write("CLASS_ID", $CLASS_ID);

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
        <h1>Edit Class</h1>

        <form action="updateClass.php" method="POST">

            <?php
                while($data = mysqli_fetch_array($class_data, MYSQLI_ASSOC)):;
            ?>

            <label for="cName">Class Name: <?php echo $data["class_name"];?> </label><br>
            <input type="text" id="cName" name="cName"></input>
            <button type="button">Update</button>

            <br>

            <label for="iuid">Instructor ID: <?php echo $data["iuid"];?></label><br>
            <input type="text" id="iuid" name="iuid">
            <button type="button">Update</button>

            <br>

            <label for="mCap">Max Capacity: <?php echo $data["class_max_capacity"];?></label><br>
            <input type="number" id="mCap" name="mCap">
            <button type="button">Update</button>

            <br>

            <label for="sTime">Start Time: <?php echo $data["start_time"];?> </label><br>
            <input type="time" id="sTime" name="sTime">
            <button type="button">Update</button>

            <br>

            <label for="eTime">End Time: <?php echo $data["end_time"];?></label><br>
            <input type="time" id="eTime" name="eTime">
            <button type="button">Update</button>

            <br>

            <label for="cDay">Class Day: <?php echo $data["class_day"];?></label><br>
            <input type="text" id="cDay" name="cDay">
            <button type="button">Update</button>

            <br><br>

            <label for="cPic">Select a file: <?php echo $data["class_image"];?> </label><br>
            <input type="file" id="cPic" name="cPic">
            <button type="button">Update</button>

            <br><br><br>

            <label for="cDesc">Class Description: <?php echo $data["class_description"];?></label><br>
            <textarea rows="5" cols="33" id="cDesc" name="cDesc"></textarea>
            <button type="button">Update</button>

            <?php
                // if statment must be terminated
                endwhile;
            ?>

            <br><br><br><br>
            <input type="submit" value="Submit Changes" id="submit2"> 
        </form>
    </body>
</html>


    