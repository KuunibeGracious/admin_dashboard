<?php
session_start();
include '../inc/middlewares/adminMiddleware.php';
include '../admin/inc/sidebar.php';
?>
<div class="main_body">
    <div class="header_container">
        <h1 class="head">Add Category</h1>
        <?php if (isset($_SESSION['message'])) {  ?>
            <div class="message">
                <strong> <?= $_SESSION['message']; ?> </strong>
            </div>
        <?php unset($_SESSION['message']);
        } ?>
    </div>

    <div class="form">
        <form enctype="multipart/form-data" action="query.php" class="add_cat" method="POST">
            <div>
                <label for="cat_name">Name: </label>
                <input type="text" name="cat_name">
            </div>
            <div>
                <label for="slug">Slug: </label>
                <input type="text" name="slug">
            </div>
            <div>
                <label for="cat_description">Description: </label>
                <textarea name="cat_description" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="image">Upload image: </label>
                <input type="file" name="image">
            </div>
            <div>
                <label for="created_at">Date: </label>
                <input type="date" name="created_at">
            </div>
            <div class="status">
                <label for="cat_status">Status: </label>
                <input type="checkbox" name="cat_status">
            </div>
            <input class="btn" type="submit" value="Save" name="save">
        </form>
    </div>
</div>
</div>
</body>

</html>