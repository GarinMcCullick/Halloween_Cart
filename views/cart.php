<?php
if (isset($_POST['quantity'])) {
    if (isset($_POST['id'])) {
        $_SESSION['qty'] = $_POST['quantity'] + $_SESSION['qty'];
    }
}
?>
<div class="product-wrapper">
    <div>
        <h1 class="name"><?= $product['productName'] ?></h1>
        <div class="price">
            &dollar;<?= $product['price'] ?>
        </div>
        <div class="description">
            <?= $product['description'] ?>
        </div>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?= $_POST['quantity'] ?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <input type="submit" value="Add To Cart">
        </form>
    </div>
</div>