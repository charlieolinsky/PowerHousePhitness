<?php
    require_once("../classes/ShoppingCart.php");


    //go through each item in the cart and grab its original quantity from the prod data table
    foreach ($_SESSION['cart'] as $key => $val) {
        //get the quanitity for that product 
        $query = "SELECT * FROM `prod-data` WHERE PROD_ID=$key;";
        $result = $dbconn->query($query);

        //for each prod in the array
        while ($row = $result->fetch_assoc()) {

            //if the place order button is clicked 
            if (isset(($_POST['placeorder']))) {

                //grab values from table
                $instock = $row['prod_quantity'];
                $totalrented = $row['total_rented'];

                //queries to update prod quantity in the prod-data table 
                $updateInStock = "UPDATE `prod-data` SET prod_quantity=$instock-$val WHERE PROD_ID=$key";
                $updateIsRented = "UPDATE `prod-data` SET total_rented=$totalrented+$val WHERE PROD_ID=$key";
                
                // run the queries 
                if ($dbconn->query($updateInStock) === TRUE) {
                    // echo "quantity decreased";
                }
                if ($dbconn->query($updateIsRented) === TRUE) {
                    // echo "total rented updated";
                }
                //clear the cart and start a new session
                unset($_SESSION['order_id']);
                $_SESSION['cart'] = array();


                // QUERIES TO ADD THE USER ADDRESS TO THE USER_ADDRESS TABLE
                $addr = "INSERT INTO user_address (`USER_ID`, `address1`, `address2`, `city`, `st`, `zip`)  
                        VALUES ('" . $_SESSION['user_id'] . "', 
                                '" . $_POST['adr1'] . "', 
                                '" . $_POST['adr2'] . "', 
                                '" . $_POST['city'] . "', 
                                '" . $_POST['state'] . "', 
                                '" . $_POST['zip'] . "')";
                // run the query 
                if ($dbconn->query($addr) === TRUE) {
                    // echo "Address updated";
                }
            }
        }
    }

    // redirect to a new page when order is places
    $r = new Redirect(
        "Your Order Has Been Placed! <br> Thank you for ordering with PHP",
        "../forms/equip-rental-member.php",
        "Success!",
        "Continue Shopping"
    ); 
    header("Location: redirectPage.php");
    die(); 

?>