<?php


if (isset($_POST['quantity'])) {
    if (isset($_POST['product_id'])) {
        //set session values if qty and id are posted
        $_SESSION['qty'] = $_POST['quantity'];
        $_SESSION['productID'] = $_POST['product_id'];
        $_SESSION['product_Name'] = $_POST['product_name'];
        $_SESSION['product_price'] = $_POST['product_price'];
        //put values into cart array after getting from form post
        array_push($_SESSION['cart'], $_SESSION['qty']);
        array_push($_SESSION['cart'], $_SESSION['productID']);
        array_push($_SESSION['cart'], $_SESSION['product_Name']);
        array_push($_SESSION['cart'], $_SESSION['product_price']);
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


                echo $value


                ?>
            <?php endforeach; ?>
        </div>
        <div>
            <span>QTY:</span>

        </div>

        <div class="price">
            <span>price:</span>&dollar;

        </div>

    </div>
    <div class="cart-total-wrapper">
        <button class="checkout">
            <a href="Halloween_Cart/">Continue Shopping</a>
        </button>

        <h2 class="cart-h2">subtotal:&dollar;<?= $_SESSION['product_price'] * $_SESSION['qty']; ?>.00</h2>

        <button class="continue-shopping">

            Checkout

        </button>
    </div>

</div>