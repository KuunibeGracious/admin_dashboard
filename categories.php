<?php
include './inc/header.php';
include 'functions/userFunctions.php';

?>

<div class="collections_page">
    <h1>COLLECTIONS</h1>
    <div class="main_collections_container">
        <?php
        $categories = getAllActive("categories");
        if (mysqli_num_rows($categories) > 0) {
            foreach ($categories as $item) {
        ?>
                <a href="products.php?category=<?= $item['slug'] ?>">
                    <div class="cat_card">
                        <img src="uploads/<?= $item['image'] ?>" alt="" srcset="">
                        <h4><?= $item['cat_name'] ?></h4>
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