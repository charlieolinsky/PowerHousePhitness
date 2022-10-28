<!DOCTYPE html>
    <?php
        echo "Hello world";
        // require_once("../sql/connect.php");
        // include_once("../classes/ShoppingCart_Class.php");
       // $cart = new ShoppingCart();

        
        // $sqlQ = "SELECT * FROM product_data"; 
        // $stmt = $dbconn->prepare($sqlQ); 
        // $stmt->execute(); 
        // $result = $stmt->get_result(); 
    ?>  

    
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Shopping Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/shoppingcart.css">
    </head>
    
    <body>
    <div class="header">
        <h3 class="heading"> Shopping Cart</h3>
        <h5 class="action">Remove all</h5>
    </div>

    <main>

    <div class="Cart-Items">
    
    
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            
        </tr>
    </table>

        <hr>
            <p>Subtotal:   <span class="price" style="color:black"><b>$x</b></span></p>

        <form action="checkout.php">
            <input type="submit" value="Continue to Check Out" class="btn" name="checkout">
        </form>
    </div>
    </main>
    </body>
    

</html>