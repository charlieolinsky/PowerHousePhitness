<?php
// Includes the database connection file
require_once("../sql/connect.php"); 

require_once("../classes/ShoppingCart_Class.php");
$cart = new ShoppingCart();


// Process request based on the specified action 
if(isset($_POST['action']) && !empty($_POST['action'])){ 
    echo $_POST['PROD_ID'];
    if(($_POST['action'] == 'addToCart') && (!empty($_POST['PROD_ID']))){ 
        $product_id = $_POST['PROD_ID']; 
        echo "hello 3"; //this doesnt show 

        // Fetch product details from the database 
        $sqlQ = "SELECT * FROM 'prod-data' WHERE PROD_ID=?"; 
        $stmt = $dbconn->prepare($sqlQ); 
        $stmt->bind_param("i", $db_id); 
        // $db_id = $product_id; 
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        $productRow = $result->fetch_assoc(); 
        echo "hello 2"; //this doesnt show 

        $itemData = array( 
            'PROD_ID' => $productRow['PROD_ID'], 
            'prod_image' => $productRow['prod_image'], 
            'prod_name' => $productRow['prod_name'], 
            'prod_price' => $productRow['prod_price'], 
            'qty' => 1 
        ); 
        // Insert item to cart 
        $insertItem = $cart->insert($itemData); 
        echo "hello 1"; //this doesnt show 

        // Redirect to cart page 
        $redirectURL = $insertItem?'../forms/shoppingcart.php':'../UI/index.php'; 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['PROD_ID'])){ 
        // Update item data in cart 
        $itemData = array( 
            'rowid' => $_REQUEST['PROD_ID'], 
            'qty' => $_REQUEST['qty'] 
        ); 
        $updateItem = $cart->update($itemData); 
         
        // Return status 
        echo $updateItem?'ok':'err';die; 
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['PROD_ID'])){ 
        // Remove item from cart 
        $deleteItem = $cart->remove($_REQUEST['PROD_ID']); 
         
        // Redirect to cart page 
        $redirectURL = '../forms/shoppingcart.php'; 
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->totalItems() > 0){ 
        $redirectURL = '../forms/checkout.php'; 
         
        // Store post data 
        $_SESSION['postData'] = $_POST; 
     
        $fname = strip_tags($_POST['fname']); 
        $lname = strip_tags($_POST['lname']); 
        $email = strip_tags($_POST['email']); 
        $phone = strip_tags($_POST['phone']); 
        $address = strip_tags($_POST['address']); 
         
        $errorMsg = ''; 
        if(empty($fname)){ 
            $errorMsg .= 'Please enter your first name.<br/>'; 
        } 
        if(empty($lname)){ 
            $errorMsg .= 'Please enter your last name.<br/>'; 
        } 
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            $errorMsg .= 'Please enter a valid email.<br/>'; 
        } 
        if(empty($phone)){ 
            $errorMsg .= 'Please enter your contact number.<br/>'; 
        } 
        if(empty($address)){ 
            $errorMsg .= 'Please enter your address.<br/>'; 
        } 
        if(empty($city)){ 
            $errorMsg .= 'Please enter your city.<br/>'; 
        } 
        if(empty($state)){ 
            $errorMsg .= 'Please enter your state.<br/>'; 
        } 
        if(empty($zip)){ 
            $errorMsg .= 'Please enter your zip.<br/>'; 
        } 
         
        if(empty($errorMsg)){ 
            // Insert customer data into the database 
            // $sqlQ = "INSERT INTO user_table (email, fname, lname) VALUES (?,?,?)"; 
            // $stmt = $dbconn->prepare($sqlQ); 
            // $stmt->bind_param("sssss", $db_email, $db_fname, $db_lname);
            // $db_email = $email;  
            // $db_fname = $fname; 
            // $db_lname = $lname; 
            // $insertCust = $stmt->execute(); 
            
            $sqlQ = "INSERT INTO user_address ('address1', 'address2', 'city', 'state', 'zip') VALUES (?,?,?,?,?)"; 
            $stmt = $dbconn->prepare($sqlQ); 
            $stmt->bind_param("sssss", $db_address, $db_city, $db_state, $db_zip);
            $db_address = $address;  
            $db_city = $city; 
            $db_state = $state; 
            $db_zip = $zip; 
            $insertCust = $stmt->execute(); 
             
            if($insertCust){ 
                $custID = $stmt->insert_id; 
                echo $custID;

                // Insert order info in the database 
                $sqlQ = "INSERT INTO order_data (ORDER_ID, USER_ID, order_date, order_time, grand_total) VALUES (?,?,NOW(), NOW(),?)"; 
                $stmt = $dbconn->prepare($sqlQ); 
                $stmt->bind_param("issd", $db_order_id, $db_order_date, $db_order_time, $db_grand_total); 
                $db_order_id = $orderID; 
                date_default_timezone_set('America/New_York');
                $db_order_date = date('m/d/y'); 
                $db_order_time = time('h:i:s');
                $db_grand_total = $cart->total(); 
                $insertOrder = $stmt->execute(); 
             
                if($insertOrder){ 
                    $orderID = $stmt->insert_id; 
                     
                    // Retrieve cart items 
                    $cartItems = $cart->contents(); 
                     
                    // Insert order items in the database 
                    if(!empty($cartItems)){ 
                        $sqlQ = "INSERT INTO cart (ORDER_ID, PROD_ID, quantity, item_cost) VALUES (?,?,?,?)"; 
                        $stmt = $dbconn->prepare($sqlQ); 
                        foreach($cartItems as $item){ 
                            $stmt->bind_param("iiid", $db_order_id, $db_prod_id, $db_quantity, $db_item_cost); 
                            $db_order_id = $orderID; 
                            $db_product_id = $item['PROD_ID']; 
                            $db_quantity = $item['qty']; 
                            $stmt->execute(); 
                        } 
                         
                        // Remove all items from cart 
                        $cart->destroy(); 
                         
                        // Redirect to the status page 
                        $redirectURL = '../forms/placeorder.php?id='.base64_encode($orderID); 
                    }else{ 
                        $sessData['status']['type'] = 'error'; 
                        $sessData['status']['msg'] = 'Something went wrong, please try again.'; 
                    } 
                }else{ 
                    $sessData['status']['type'] = 'error'; 
                    $sessData['status']['msg'] = 'Something went wrong, please try again.'; 
                } 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Something went wrong, please try again.'; 
            } 
        }else{ 
            $sessData['status']['type'] = 'error'; 
            $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg;  
        } 
         
        // Store status in session 
        $_SESSION['sessData'] = $sessData; 
    } 
} 
echo "hello 6";  //this shows up

// Redirect to the specific page 
header("Location: $redirectURL"); 
exit();


?>