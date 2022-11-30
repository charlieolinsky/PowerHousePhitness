<!-- copy of original admin_add_class.php without UI -->
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
    <h1>Add a New Class</h1>

    <div>
        <form action="addClass.php" method="POST">

            <br>
            <label for="cName">Class Name</label>
            <input type="text" id="cName" name="cName" required>

            <br>
            <label for="iuid">Instructor ID</label>
            <input type="text" id="iuid" name="iuid" required>

            <br>
            <label for="mCap">Max Capacity</label>
            <input type="number" id="mCap" name="mCap" required>

            <br>
            <label for="sTime">Start Time</label>
            <input type="time" id="sTime" name="sTime" required>

            <br>
            <label for="eTime">End Time</label>
            <input type="time" id="eTime" name="eTime" required>

            <br>
            <label for="cDay">Class Day</label>
            <input type="text" id="cDay" name="cDay" required>

            <br>
            <label for="cPic">Select a file: </label>
            <input type="file" id="cPic" name="cPic">

            <br>
            <label for="cDesc">Class Description: </label>
            <textarea rows="5" cols="33" id="cDesc" name="cDesc"></textarea>

            <br><br>
            <input type="submit" name="submit" id="submit">Submit</button> 
        </form>
    </div>

    <br><br><br><!--Hi Erica! I know how much you love these break statements xoxo -charlie -->
    <a href="adminDirectory.php">Return to Admin Portal</a> 
    
</body>
</html>