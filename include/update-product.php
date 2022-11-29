
<?php

if(isset($_POST['submit'])) {

$so = $_POST['PROD_ID'];
$prod_name = $_POST['prod_name'];
$prod_desc = $_POST['prod_desc'];
$prod_image = $_POST['prod_image'];
$prod_price = $_POST['prod_price'];
$prod_quantity = $_POST['prod_quantity'];
$VENDOR_ID = $_POST['VENDOR_ID'];
$prod_date_purchased = $_POST['prod_date_purchased'];
$prod_purchase_cost = $_POST['prod_purchase_cost'];



$updatename = "UPDATE `prod-data` SET prod_name='$_POST[prod_name]' WHERE PROD_ID=$so";
$updatedesc = "UPDATE `prod-data` SET prod_desc='$_POST[prod_desc]' WHERE PROD_ID=$so";
$updateimage = "UPDATE `prod-data` SET prod_image= '../UI/images/prod_images/$_POST[prod_image]' WHERE PROD_ID=$so";
$updateprice = "UPDATE `prod-data` SET prod_price='$_POST[prod_price]' WHERE PROD_ID=$so";
$updatequant = "UPDATE `prod-data` SET prod_quantity='$_POST[prod_quantity]' WHERE PROD_ID=$so";
$updatevendor = "UPDATE `prod-data` SET VENDOR_ID='$_POST[VENDOR_ID]' WHERE PROD_ID=$so";
$updatedatepurch = "UPDATE `prod-data` SET prod_date_purchased='$_POST[prod_date_purchased]' WHERE PROD_ID=$so";
$updatepurchcost = "UPDATE `prod-data` SET prod_purchase_cost='$_POST[prod_purchase_cost]' WHERE PROD_ID=$so";

include_once("../sql/connect.php");
// include_once("../forms/admin-inventory-update.php");


// var_dump($_POST); //to confirm that the data was added 


if (!empty($prod_name)) {

    if ($dbconn->query($updatename) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_desc)) {

    if ($dbconn->query($updatedesc) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_image)) {

    if ($dbconn->query($updateimage) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_price)) {

    if ($dbconn->query($updateprice) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_quantity)) {

    if ($dbconn->query($updatequant) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($VENDOR_ID)) {

    if ($dbconn->query($updatevendor) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_date_purchased)) {

    if ($dbconn->query($updatedatepurch) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_purchase_cost)) {

    if ($dbconn->query($updatepurchcost) === TRUE) {
        echo "<p style='color:red'> Record updated successfully <p>";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}



$dbconn->close();


}
?>
