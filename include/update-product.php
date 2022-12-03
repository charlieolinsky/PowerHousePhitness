
<?php

// if the submit is clicked
if (isset($_POST['submit'])) {

    // SETTING THE VARIABLES TO BE INSERTED FROM USER INPUT
    $so = $_POST['PROD_ID'];
    $prod_name = $_POST['prod_name'];
    $prod_desc = $_POST['prod_desc'];
    $prod_image = $_POST['prod_image'];
    $prod_price = $_POST['prod_price'];
    $prod_quantity = $_POST['prod_quantity'];
    $VENDOR_ID = $_POST['VENDOR_ID'];
    $prod_date_purchased = $_POST['prod_date_purchased'];
    $prod_purchase_cost = $_POST['prod_purchase_cost'];

    // CREATING THE QUERIES TO UPDATE A PRODUCT 
    $updatename = "UPDATE `prod-data` SET prod_name='$prod_name' WHERE PROD_ID=$so";
    $updatedesc = "UPDATE `prod-data` SET prod_desc='$prod_desc' WHERE PROD_ID=$so";
    $updateimage = "UPDATE `prod-data` SET prod_image= '../UI/images/prod_images/$prod_image' WHERE PROD_ID=$so";
    $updateprice = "UPDATE `prod-data` SET prod_price='$prod_price ' WHERE PROD_ID=$so";
    $updatequant = "UPDATE `prod-data` SET prod_quantity='$prod_quantity' WHERE PROD_ID=$so";
    $updatevendor = "UPDATE `prod-data` SET VENDOR_ID='$VENDOR_ID ' WHERE PROD_ID=$so";
    $updatedatepurch = "UPDATE `prod-data` SET prod_date_purchased='$prod_date_purchased ' WHERE PROD_ID=$so";
    $updatepurchcost = "UPDATE `prod-data` SET prod_purchase_cost='$prod_purchase_cost' WHERE PROD_ID=$so";



    // CONNECT TO THE DB
    include_once("../sql/connect.php");

    // if new prod name is inserted 
    if (!empty($prod_name)) {
        // run the query and display success or error 
        if ($dbconn->query($updatename) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new prod description is inserted 
    if (!empty($prod_desc)) {
        // run the query and display success or error 
        if ($dbconn->query($updatedesc) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new prod image is inserted 
    if (!empty($prod_image)) {
        // run the query and display success or error 
        if ($dbconn->query($updateimage) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }
    // if new prod price is inserted
    if (!empty($prod_price)) {
        // run the query and display success or error 
        if ($dbconn->query($updateprice) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new prod quantity is inserted
    if (!empty($prod_quantity)) {
        // run the query and display success or error 
        if ($dbconn->query($updatequant) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new vendor is inserted
    if (!empty($VENDOR_ID)) {
        // run the query and display success or error 
        if ($dbconn->query($updatevendor) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new prod date purchased is inserted
    if (!empty($prod_date_purchased)) {
        // run the query and display success or error 
        if ($dbconn->query($updatedatepurch) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }

    // if new prod purchase cost is inserted
    if (!empty($prod_purchase_cost)) {
        // run the query and display success or error 
        if ($dbconn->query($updatepurchcost) === TRUE) {
            echo "<p style='color:red'> Record updated successfully <p>";
        } else {
            echo "Error updating record: " . $dbconn->error;
        }
    }
}


// if the delete button is clicked 
if (isset($_POST['delete'])) {
    // grab the prod id that was selected 
    $so = $_POST['PROD_ID'];
    // create the delete query
    $deleteprod = "DELETE FROM `prod-data` WHERE PROD_ID=$so";
    $deletefromcart = "DELETE FROM cart_items WHERE PROD_ID=$so";
    // run query to remove item from cart table 
    if ($dbconn->query($deletefromcart) === TRUE) {
        // run query to remove item from product table 
        if ($dbconn->query($deleteprod) === TRUE) {
            // display success
            echo "<p style='color:red'> Item deleted successfully <p>";
        } else {
            // display error
            echo "Error updating record: " . $dbconn->error;
        }
    }
}

// CLOSE CONNECTION
$dbconn->close();
?>
