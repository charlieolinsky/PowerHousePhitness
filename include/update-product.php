
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
include_once("../forms/admin-inventory-update.php");


var_dump($_POST); //to confirm that the data was added 


if (!empty($prod_name)) {
    // $updatedesc = "UPDATE 'prod-data' SET prod_desc=$prod_desc WHERE PROD_ID=$so";

    if ($dbconn->query($updatename) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_desc)) {
    // $updatedesc = "UPDATE 'prod-data' SET prod_desc=$prod_desc WHERE PROD_ID=$so";

    if ($dbconn->query($updatedesc) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_image)) {
    // $updateimage = "UPDATE 'prod-data' SET prod_image=$prod_image WHERE PROD_ID=$so";

    if ($dbconn->query($updateimage) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_price)) {
    // $updateprice = "UPDATE 'prod-data' SET prod_price=$prod_price WHERE PROD_ID=$so";

    if ($dbconn->query($updateprice) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_quantity)) {
    // $updatequant = "UPDATE 'prod-data' SET prod_quantity=$prod_quantity WHERE PROD_ID=$so";

    if ($dbconn->query($updatequant) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($VENDOR_ID)) {
    // $updatevendor = "UPDATE 'prod-data' SET VENDOR_ID=$VENDOR_ID WHERE PROD_ID=$so";

    if ($dbconn->query($updatevendor) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_date_purchased)) {
    // $updatedatepurch = "UPDATE 'prod-data' SET prod_date_purchased=$prod_date_purchased WHERE PROD_ID=$so";

    if ($dbconn->query($updatedatepurch) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}

if (!empty($prod_purchase_cost)) {
    // $updatepurchcost = "UPDATE 'prod-data' SET prod_purchase_cost=$prod_purchase_cost WHERE PROD_ID=$so";

    if ($dbconn->query($updatepurchcost) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbconn->error;
    }
}



$dbconn->close();


}
?>
