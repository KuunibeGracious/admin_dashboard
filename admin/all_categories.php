<?php
session_start();
include '../inc/middlewares/adminMiddleware.php';
include '../admin/inc/sidebar.php';
?>

<div class="all_cats">
    <h1>ALL CATEGORIES</h1>
    <div class="table_view">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $category = getAll('categories');
            /** @var string $category */
            if (mysqli_num_rows($category) > 0) {
                foreach ($category as $item) {
                    ?>
                    <tr>
                        <td> <?= $item['id'] ?> </td>
                        <td> <?= $item['cat_name'] ?> </td>
                        <td> <?= $item['cat_description'] ?> </td>
                        <!-- <td> <img src= "../uploads/<?= $item['image'] ?>" width="30px" height="30px" alt="<?= $item['cat_name'] ?>" srcset=""> </td> -->
                        <td> <?= $item['cat_status'] == '0' ? 'Visible':'Hidden' ?> </td>
                        <td>
                            <a href="edit_cat.php?id= <?= $item['id'] ?> " class="edit_btn" >Edit</a>
                        </td>
                    </tr>
                    <?php
                };
            } else {
                echo 'no records found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>