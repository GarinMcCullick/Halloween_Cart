<?php
$action = null;

if (isset($_POST['quantity'])) {
    if (isset($_POST['product_id'])) {
        //set session values if qty and id are posted

        $item = array($_POST['product_name'], $_POST['quantity'], $_POST['product_price']);
        array_push($_SESSION['cart'], $item);
    }
}
?>
<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
<div class="cart-wrapper">
    <div class="cart-item-wrapper">
        <h2 class="cart-title-h2">Your Cart!</h2>
        <div class="item-inner-top-wrapper">
            <span>Item:</span><span>QTY:</span><span>Price:</span>
        </div>
        <div class="item-inner-bottom-wrapper">

            <div class='name-cart'>
                <?php foreach ($_SESSION['cart'] as $value) : ?>
                    <?php
                    echo "<span class='cart-inner-span'>";
                    echo $value[0];
                    echo "</span>";
                    ?>
                <?php endforeach; ?>
            </div>

            <div class='quantity-cart'>
                <?php foreach ($_SESSION['cart'] as $value) : ?>
                    <?php
                    echo "<span class='cart-inner-span'>";
                    echo $value[1];
                    echo "</span>";
                    ?>
                <?php endforeach; ?>
            </div>


            <div class='price-cart'>
                <?php foreach ($_SESSION['cart'] as $value) : ?>
                    <?php
                    echo "<span class='cart-inner-span'>";
                    echo "&dollar;" . $value[1] * $value[2];
                    echo "</span>";
                    ?>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
    <div class="cart-total-wrapper">
        <button class="checkout">
            <a href="./index.php">Continue Shopping</a>
        </button>
        <form action="" method="post">
            <input type="hidden" value="empty_cart" name="action">
            <input type="submit" value="Empty Cart" class="checkout">
        </form>
        <?php
        $action = filter_input(INPUT_POST, 'action');
        if ($action == "empty_cart") {
            $_SESSION['cart'] = array();
        }

        ?>

        <h2 class="cart-h2">Total:
            <?php
            $totalPriceValues = array();
            foreach ($_SESSION['cart'] as $value) : ?>
                <?php
                array_push($totalPriceValues, $value[1] * $value[2]);
                ?>
            <?php endforeach;
            $totalPrice = array_sum($totalPriceValues);

            echo "&dollar;" . $totalPrice . ".00";
            ?>
        </h2>

        <button class="continue-shopping">
            Checkout
        </button>
    </div>

</div>