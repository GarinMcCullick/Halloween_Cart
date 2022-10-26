<?php
$action = null;

if (isset($_POST['quantity'])) {
    if (isset($_POST['product_id'])) {
        //set session values if qty and id are posted
    
        $item = array($_POST['product_name'], $_POST['quantity'], $_POST['product_price']);
        array_push($_SESSION['cart'], $item);
        /*
        $_SESSION['cart']['product_Name'] = $_POST['product_name'];
        $_SESSION['cart']['product_quantity'] = $_POST['quantity'];
        $_SESSION['cart']['product_price'] = $_POST['product_price'];
        //put values into cart array after getting from form post
        array_push($_SESSION['cart'], $_POST['quantity'])
        array_push($_SESSION['cart'], $_SESSION['product_Name']);
        array_push($_SESSION['cart'], $_SESSION['product_price']);*/
        print_r($_SESSION['cart']);
    }
}
?>
<link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
<div class="cart-wrapper">
    <div class="cart-item-wrapper">
        <h2 class="cart-h2">Your Cart!</h2>
        <div class="name">
            <span>Item:</span>
            <?php foreach ($_SESSION['cart'] as $value) : ?>
                <?php
                echo $value[0];
                ?>
            
        </div>
        <div>
            <span>QTY:</span>
               <?php echo $value[1]; ?>
        </div>

        <div class="price">
            <span>price:</span>&dollar;
            <?php echo $value[2]; ?>
        </div>
        <br>
<?php endforeach; ?>
    </div>
    <div class="cart-total-wrapper">
        <button class="checkout">
            <a href="./index.php">Continue Shopping</a>
        </button>
        <form action="" method="post">
                <input type="hidden" value = "empty_cart" name="action">
                <input type="submit" value ="Empty Cart" class="checkout">
        </form>
        <?php
            $action = filter_input(INPUT_POST, 'action');
            if ($action == "empty_cart")
            {
                $_SESSION['cart'] = array();
            }
            ?>

        <h2 class="cart-h2">subtotal:&dollar;<?= $_SESSION['product_price'] * $_SESSION['qty']; ?>.00</h2>

        <button class="continue-shopping">

            Checkout

        </button>
    </div>

</div>