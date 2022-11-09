<?php
       
    require_once("../sql/connect.php");
    include_once("../classes/ShoppingCart_Class.php");
    $cart = new Cart;
?>  

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Shopping Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/shoppingcart.css">

        <Script>
        function updateCartItem(obj,id){
            $.get("../include/ShoppingCartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                if(data == 'ok'){
                    location.reload();
                }else{
                    alert('Cart update failed, please try again.');
                }
            });
        }
        </Script>
    </head>
    
    <body>
    <div class="container">
        <h1> SHOPPING CART </h1>
        <div class="row">
            <div class="cart">
                <table class="table-cart">
                    <thead>
                        <tr>
                            <th>  </th>
                            <th> Product </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Total </th>
                            <th>  </th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        if($cart->total_items() > 0){ 
                            // Get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){
                                $proImg = !empty($item["image"])?'../UI/images/prod_images/'.$item["image"]:'images/prod_images/basketball.jpg'; 
                    ?>

                    <tr>
                        <td><img src="<?php echo $proImg; ?>" alt="..."></td>
                        <td><?php echo $item["prod_name"]; ?></td>
                        <td><?php echo '$'.$item["prod_price"].' '.'USD'; ?></td>
                        <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                        <td><?php echo $.$item["subtotal"].' '.CURRENCY; ?></td>
                        <td><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove cart item?')?window.location.href='ShoppingCartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;" title="Remove Item"><i class="itrash"></i> </button> </td>
                    </tr>

                    <?php } }else{ ?>
                            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                        <?php } ?>
                        <?php if($cart->total_items() > 0){ ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td><strong><?php echo '$'.$cart->total().' '.'USD'; ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <a href="../UI/index.php" class="btn btn-block btn-secondary"></i>Continue Shopping</a>
            </div>

            <div class="row">
                <?php if($cart->total_items() > 0){ ?>
                <a href="../forms/checkout.php" class="btn btn-block btn-primary">Proceed to Checkout</a>
                <?php } ?>
            </div>
        </div>
    </div>
    </body>
    

</html>