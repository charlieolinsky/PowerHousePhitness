<?php
    include_once("../include/global_inc.php");
    $s = new Session(); 
    
    //Fetch Class data for form 
    $class = trim(mysqli_real_escape_string($dbconn, $_POST['classes_dropdown']));
    $class_data = $dbconn->query("SELECT * FROM classes WHERE class_name='".$class."'");

    //Pass Admin class selection to Session
    $s->write('classes_dropdown', $_POST['classes_dropdown']);

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
    <title>Edit Class</title>

    <link rel="stylesheet" href="../UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="../UI/css/font-awesome.min.css">
    <link rel="stylesheet" href="../UI/css/aos.css">
    <link rel="stylesheet" href="../UI/css/tooplate-php-style.css">

    </head>

    <body style="background-color: var(--dark-color); text-align: center">
        <!-- Page Title -->
        <div class="admin-title">
            <h1 style="color: var(--primary-color)">Edit Class</h1>
        </div>

        <form action="updateClass.php" method="POST">

            <?php
                while($data = mysqli_fetch_array($class_data, MYSQLI_ASSOC)):;
            ?>

            <div class="inventory-container">
                <div class="column">
                    <div class="row">
                        <div class="column" style= "text-align: center">
                            <!-- New Class Name label and input -->
                            <label for="cName">Class Name: <?php echo $data["class_name"];?> </label><br>
                            <input type="text" placeholder="Enter new class name" id="cName" name="cName" style="margin-top: 2px"></input>

                            <br><br>

                            <!-- New Instructor ID label and input -->
                            <label for="iuid">Instructor ID: <?php echo $data["iuid"];?></label><br>
                            <input type="text" placeholder="Enter new Instructor ID" id="iuid" name="iuid" style="margin-top: 2px">

                            <br><br>

                            <!-- New Max Capacity label and input -->
                            <label for="mCap">Max Capacity: <?php echo $data["class_max_capacity"];?></label><br>
                            <input type="number" placeholder="Enter new max value" id="mCap" name="mCap" style="margin-top: 2px">    
                        </div>

                        <div class="column" style= "text-align: center; margin-left: 10px">
                            <!-- New Class day label and input -->
                            <label for="cDay">Class Day: <?php echo $data["class_day"];?></label><br>
                            <input type="text" placeholder="Enter new class day" id="cDay" name="cDay" style="margin-top: 2px">

                            <br><br>

                            <!-- New start time label and input -->
                            <label for="sTime">Start Time: <?php echo $data["start_time"];?> </label><br>
                            <input type="time" placeholder="Enter new start time" id="sTime" name="sTime" style="margin-top: 2px">

                            <br><br>

                            <!-- New end time label and input -->
                            <label for="eTime">End Time: <?php echo $data["end_time"];?></label><br>
                            <input type="time" id="eTime" name="eTime">
                        </div>

                    </div>

                    <br>
                    
                     <!-- New class picture label and input -->
                    <label for="cPic">Select a file: <?php echo $data["class_image"];?> </label><br>
                    <input type="file" id="cPic" name="cPic">

                    <br><br>

                    <!-- New Class Description label and input -->
                    <label for="cDesc">New Class Description: </label><br>
                    <textarea rows="5" cols="33" id="cDesc" name="cDesc"></textarea>

                </div>
                <input type="submit" class="btn cart-btn" name ="submit2" value = "Submit Changes" style="margin-top: 10px">
            </div>

            <?php
                // while must be terminated
                endwhile;
            ?>
            <!-- <input type="submit" value="Submit Changes" id="submit2">  -->

        </form>

        <div style="margin-top:660px">
            <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
        </div>

    </body>
</html>


    