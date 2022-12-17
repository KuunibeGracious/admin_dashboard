<?php
session_start();
include '../inc/middlewares/adminMiddleware.php';
include '../admin/inc/sidebar.php';
?>

<div class="add_products">
    <div class="header_container">
        <h1 class="head">Add Products</h1>
        <?php if (isset($_SESSION['message'])) {  ?>
            <div class="message">
                <strong> <?= $_SESSION['message']; ?> </strong>
            </div>
        <?php unset($_SESSION['message']);
        } ?>
    </div>
    <div class="form">
        <form enctype="multipart/form-data" action="query.php" class="add_prod" method="POST">
            <div class="sbd_flds">
                <div>
                    <label for="cat_name">Select Category: </label>
                    <select name="cat_id" id="cat_select">
                        <option selected>Select Category</option>
                        <?php
                        $categories = getAll('categories');
                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['cat_name'] ?></option>
                        <?php
                            }
                        } else {
                            echo "no categories found";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="prod_name">Name: </label>
                    <input type="text" name="prod_name">
                </div>
            </div>
            <div>
                <label for="prod_slug">Slug: </label>
                <input type="text" name="prod_slug">
            </div>
            <div>
                <label for="prod_description">Description: </label>
                <textarea name="prod_description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="sbd_flds">
                <div>
                    <label for="quantity">Quantity: </label>
                    <input type="number" name="quantity">
                </div>
                <div class="status">
                    <label for="prod_status">Status: </label>
                    <input type="checkbox" name="prod_status">
                </div>
            </div>
            <div class="sbd_flds">
                <div>
                    <label for="original_price">Original Price: </label>
                    <input type="number" name="original_price">
                </div>
                <div>
                    <label for="selling_price">Selling Price: </label>
                    <input type="number" name="selling_price">
                </div>
            </div>
            <!-- <div></div> -->
            <div class="sbd_flds">
                <div>
                    <label for="image">Upload image: </label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label for="created_at">Date: </label>
                    <input type="date" name="created_at">
                </div>
            </div>
            <input class="btn" type="submit" value="Save" name="add_product">
        </form>
    </div>
</div>