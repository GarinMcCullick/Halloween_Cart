<?php
if (isset($_GET['id'])) { // check url for id

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?'); // get specified product from db
    $stmt->execute([$_GET['id']]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC); // returns as array

    if (!$product) { //making sure product id exists else error
        exit('Product does not exist!');
    }
}
?>
<link href="./styles.css" rel="stylesheet">
<div class="product-wrapper">
    <img src="http://localhost/Halloween_Cart/images/<?= $product['image'] ?>" width="400" height="450" alt="<?= $product['productName'] ?>">
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