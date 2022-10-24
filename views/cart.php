<?php
if (isset($_POST['quantity'])) {
    if (isset($_POST['product_id'])) {
        //set session values if qty and id are posted
        $_SESSION['qty'] = $_POST['quantity'];
        $_SESSION['productID'] = $_POST['product_id'];
        $_SESSION['product_name'] = $_POST['product_name'];
        $_SESSION['product_price'] = $_POST['product_price'];
        //set variables to session qty / id for quick reference
        $product_id = $_SESSION['productID'];
        $quantity = $_SESSION['qty'];
        $Name = $_SESSION['product_name'];
        $Price = $_SESSION['product_price'];
        $total = $Price * $quantity;
    }
}

?>
<link href="./styles.css" rel="stylesheet">
<div class="cart-wrapper">
    <div class="cart-item-wrapper">
        <h2 class="cart-h2">Your Cart!</h2>
        <div class="name">
            <span>Item:</span>
            <?= $Name ?>
        </div>
        <div>
            <span>QTY:</span>
            <?= $quantity ?>
        </div>

        <div class="price">
            <span>price:</span>
            &dollar;<?= $Price ?>
        </div>
    </div>
    <div class="cart-total-wrapper">
        <h2 class="cart-h2">subtotal:</h2>
        &dollar;<?= $total ?>.00
    </div>
</div>