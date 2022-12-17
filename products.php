<?php
include './inc/header.php';
include 'functions/userFunctions.php';
if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getActiveSlug('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
    if (isset($category)) {
        $cid = $category['id']
?>

        <div class="products_page">
            <h1> <?= $category['cat_name'] ?> </h1>
            <div class="main_products_container">
                <?php
                $products = getProdByCategory($cid);
                if (mysqli_num_rows($products) > 0) {
                    foreach ($products as $item) {
                ?>
                        <a href="product_view.php?product=<?= $item['slug'] ?>">
                            <div class="prod_card">
                                <img src="uploads/<?= $item['image'] ?>" alt="" srcset="">
                                <h4><?= $item['name'] ?></h4>
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo 'no data found';
                }
                ?>
            </div>
        </div>
<?php
    } else{
        echo "something went wrong";
    }
} else {
    echo 'something went wrong';
}

?>