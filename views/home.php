<?php
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all db data and putting into associative array
?>

<h2>Costumes!</h2>
<div class="products-wrapper">
    <?php foreach ($products as $product) : /*looping through array*/ ?>
        <div class="product">
            <a href="index.php?page=<?= $_GET['page'] = 'product' ?>&id=<?= $product['id'] ?>" class="product-link">
                <img class="product-image" src="./images/<?= $product['image'] ?>" alt="img failed to load <?php echo $product['productName'] ?>">
                <div class="name"><?= $product['productName'] ?></div>
                <div class="price">
                    &dollar;<?= $product['price'] ?>.00
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>