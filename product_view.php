<?php
include './inc/header.php';
include 'functions/userFunctions.php';

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getActiveProdSlug("products", $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {

?>
        <div class="prod">
            <img src="uploads/<?= $product['image'] ?>" alt="" srcset="">
            <div class="details">
                <h4><?= $product['name'] ?></h4>
                <hr>
                <div class="description">
                    <small>Description: </small>
                    <p> <?= $product['description'] ?></p>
                </div>
                <hr>
                <p>Price: GHS <?= $product['selling_price'] ?></p>
                <hr>
                <p>Quantity: <?= $product['qty'] ?></p>
                <hr>
                <div class="prod_btns">
                    <button><a href="">Add to Cart</a></button>
                    <button><a href="">Add to WishList</a></button>
                </div>
            </div>
        </div>
<?php
    } else {
        echo 'product not found';
    }
} else {
    echo 'product slug not found';
}
