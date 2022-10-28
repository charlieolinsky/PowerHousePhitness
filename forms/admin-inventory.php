<!-- code to hold the what will appear on the admin-inventory page  -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inventory</title>
</head>

<body>

    <div class="add_inventory">
        <h1> this is the admin inventory page </h1>

        <?php
        include_once("../include/add-products.php");
        ?>


        <form action="../include/add-products.php" method="post">

            <label for="prod_name"> Item Name</label><br>
            <input name="prod_name" id="prod_name" type="text"><br><br>

            <br>
            <input type="submit" name="submit" value="Submit Form"><br>

        </form>

    </div>



</body>

</html>