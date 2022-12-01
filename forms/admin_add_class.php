<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>

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
    <div class="admin-title">
        <h1 style="color: var(--primary-color)">Add New Class</h1>
    </div>

    <div class="inventory-container">
        <form action="addClass.php" method="POST">
            <div class="column" style= "text-align: center">
                <div class="row" style="justify-content: center">
                
                    <!-- Class Name label and input -->
                    <label for="cName" style= "margin-left: 10px; margin-right: 5px">Class Name</label>
                    <input type="text" id="cName" name="cName" required>

                    <!-- Class Day label and input -->
                    <label for="cDay" style= "margin-left: 10px; margin-right: 5px">Class Day</label>
                    <input type="text" id="cDay" name="cDay" required>
                </div>

                <div class="row" style="margin-top: 15px; justify-content: center">

                    <!-- Max Capacity label and input -->
                    <label for="mCap" style= "margin-left: 10px; margin-right: 5px">Max Capacity</label>
                    <input type="number" id="mCap" name="mCap" required>

                     <!-- Instructor ID label and input -->
                    <label for="iuid" style= "margin-left: 10px; margin-right: 5px">Instructor ID</label>
                    <input type="text" id="iuid" name="iuid" required>
                </div>

                <div class="row" style="margin-top: 15px; justify-content: center">
                    <!-- Start Time label and input -->
                    <label for="sTime" style= "margin-left: 10px; margin-right: 5px">Start Time</label>
                    <input type="time" id="sTime" name="sTime" required>

                    <!-- End Time label and input -->
                    <label for="eTime" style= "margin-left: 10px; margin-right: 5px">End Time</label>
                    <input type="time" id="eTime" name="eTime" required>
            
                </div>

                <div class="row" style="margin-top: 15px; margin-left:70px; justify-content: center">
                    <!-- Select File label and input -->
                    <label for="cPic"  style= "margin-left: 10px; margin-right: 5px">Select a file: </label>
                    <input type="file" id="cPic" name="cPic">
                </div>

                <div class="column" style="margin-top: 15px; justify-content: center">
                    <!-- Class Description label and input -->
                    <label for="cDesc">Class Description: </label>
                    <br>
                    <textarea rows="5" cols="33" id="cDesc" name="cDesc"></textarea>
                    <br>
                    <button type="submit" class="form-control mt-3" id="submit-button" name="submit" style="width: 275px; margin-left: 143px">Submit Item</button>
                </div>
            </div>
        </form>
    </div>

    <div style="margin-top:620px">
        <a href="adminDirectory.php" class="btn custom-btn bg-color">Return to Admin Portal</a>
     </div>

   
    
</body>
</html>