<?php
session_start();
include '../inc/middlewares/adminMiddleware.php';
include '../admin/inc/sidebar.php';
?>
<div class="main_body">
    <div class="header_container">
        <h1 class="head">Edit Category</h1>
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
            $category = getById('categories', $id);
        } catch (mysqli_sql_exception $e) {
            var_dump($e);
        }
        if (mysqli_num_rows($category) > 0) {
            $data = mysqli_fetch_array($category);
    ?>
            <div class="form">
                <form enctype="multipart/form-data" action="query.php" class="add_cat" method="POST">
                    <div>
                        <input type="hidden" name="cat_id" value="<?= $data['id'] ?>">
                        <label for="cat_name">Name: </label>
                        <input type="text" value=" <?= $data['cat_name'] ?>" name="cat_name">
                    </div>
                    <div>
                        <label for="cat_description">Description: </label>
                        <textarea name="cat_description" id="" cols="30" rows="10"> <?= $data['cat_description'] ?></textarea>
                    </div>
                    <div>
                        <label for="image">Upload image: </label>
                        <input type="file" value="" name="image">
                        <!-- <img src="" alt="" srcset=""> -->
                        <label " for=" image">Current image: </label>
                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                        <img src="../uploads/<?= $data['image'] ?>" width="30px" height="30px" alt="<?= $data['cat_name'] ?>" srcset="">
                    </div>
                    <div>
                        <label id="date" for="created_at">Date: </label>
                        <input type="date" value=" <?= $data['created_at'] ?>" name="created_at">
                    </div>
                    <div class="status">
                        <label for="cat_status">Status: </label>
                        <input type="checkbox" <?= $data['cat_status'] ? 'checked' : '' ?> name="cat_status">
                    </div>
                    <input class="btn" type="submit" value="Update" name="edit_cat">
                </form>
            </div>
    <?php
        } else {
            echo 'category not found';
        }
    } else {
        echo "something went wrong";
    }
    ?>

</div>