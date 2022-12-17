<?php
session_start();
include '../inc/middlewares/adminMiddleware.php';
include '../admin/inc/sidebar.php';
?>
<div class="main_body">
    <div class="header_container">
        <h1 class="head">Edit Product</h1>
        <?php if (isset($_SESSION['message'])) {  ?>
            <div class="message">
                <strong> <?= $_SESSION['message']; ?> </strong>
            </div>
        <?php unset($_SESSION['message']);
        } ?>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $product = getById('products', $id);
        } catch (mysqli_sql_exception $e) {
            var_dump($e);
        }
        if (mysqli_num_rows($product) > 0) {
            $data = mysqli_fetch_array($product);
    ?>
            <div class="form">
                <form enctype="multipart/form-data" action="query.php" class="add_prod" method="POST">
                    <div class="sbd_flds">
                        <div>
                            <label for="cat_name">Select Category: </label>
                            <select name="cat_id" id="cat_select">
                                <!-- <option selected><?= $data['cat_name'] ?></option> -->
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
                            <input type="hidden" name="prod_id" value="<?= $data['id'] ?>">
                            <label for="prod_name">Name: </label>
                            <input type="text" value="<?= $data['name'] ?>" name="prod_name">
                        </div>
                    </div>
                    <div>
                        <label for="prod_description">Description: </label>
                        <textarea name="prod_description" id="" cols="30" rows="10"><?= $data['description'] ?></textarea>
                    </div>
                    <div class="sbd_flds">
                        <div>
                            <label for="quantity">Quantity: </label>
                            <input type="number" value="<?= $data['qty'] ?>" name="quantity">
                        </div>
                        <div class="status">
                            <label for="prod_status">Status: </label>
                            <input type="checkbox" <?= $data['name'] ? 'checked' : '' ?> name="prod_status">
                        </div>
                    </div>
                    <div class="sbd_flds">
                        <div>
                            <label for="original_price">Original Price: </label>
                            <input type="number" value="<?= $data['original_price'] ?>" name="original_price">
                        </div>
                        <div>
                            <label for="selling_price">Selling Price: </label>
                            <input type="number" value="<?= $data['selling_price'] ?>" name="selling_price">
                        </div>
                    </div>
                    <!-- <div></div> -->
                    <div class="sbd_flds">
                        <div>
                            <label for="image">Upload image: </label>
                            <input type="file" value="" name="image">
                            <!-- <img src="" alt="" srcset=""> -->
                            <label " for=" image">Current image: </label>
                            <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            <img src="../uploads/<?= $data['image'] ?>" width="30px" height="30px" alt="<?= $data['name'] ?>" srcset="">
                        </div>
                        <div>
                            <label for="created_at">Date: </label>
                            <input type="date" value="<?= $data['created_at'] ?>" name="created_at">
                        </div>
                    </div>
                    <input class="btn" type="submit" value="Update" name="edit_product">
                </form>
            </div>
    <?php
        } else {
            echo 'product not found';
        }
    } else {
        echo "something went wrong";
    }
    ?>

</div>