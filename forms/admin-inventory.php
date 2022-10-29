<!DOCTYPE html>

<!-- code to hold the what will appear on the admin-inventory page  -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inventory</title>

</head>

<body>
    <main>

        <div class="add_inventory">
         
            <h1> this is the admin inventory page </h1>

            <form action="../include/add-products.php" method="POST">

        <!-- the name="__" field is what connects this form to the querying file -->
                <label for="prod_name"> Item Name:</label><br>
                <input type="text" id="prod_name" name="prod_name"><br><br>

                <br>
                <label for="prod_desc"> Item Description:</label><br>
                <input type="text" id="prod_desc" name="prod_desc"><br><br>

                <br>

<!-- need to add a way to upload-->
                <label for="prod_image"> Item Image: </label><br>
                <input type="text" id="prod_image" name="prod_image"><br><br>
                <br>

<!-- need to add validation to be a # -->
                <label for="prod_price"> Item Price: </label><br>
                <input type="text" id="prod_price" name="prod_price"><br><br>
                <br>

<!-- need to add validation to be a # -->
                <label for="prod_quantity">Item Quantity: </label><br>
                <input type="text" id="prod_quantity" name="prod_quantity"><br><br>
                <br>
<!-- Need to add drop down to be connected to the Vendor ID Table  -->
                <label for="VENDOR_ID">Vendor: </label><br>
                <input type="text" id="VENDOR_ID" name="VENDOR_ID"><br><br>
                <br>

                <label for="prod_date_purchased"> Date Purchased: </label><br>
                <input type="text" id="prod_date_purchased" name="prod_date_purchased"><br><br>
                <br>
<!-- need to add validation to be a # -->
                <label for="prod_purchase_cost"> Purchase Cost: </label><br>
                <input type="text" id="prod_purchase_cost" name="prod_purchase_cost"><br><br>
                <br>


                <input type="submit" name="submit" value="Submit Form"><br>

            </form>

        </div>

    </main>
</body>

</html>