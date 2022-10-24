<?php
if (isset($_GET['id'])) { // check url for id

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?'); // get specified product from db
    $stmt->execute([$_GET['id']]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC); // returns as array

    if (!$product) { //making sure product id exists
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
}
