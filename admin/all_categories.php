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
                    <th>Action</th>
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
                            <td> <?= $item['cat_status'] == '0' ? 'Visible' : 'Hidden' ?> </td>
                            <td>
                                <div class="action_btns">
                                    <button  class="action_btn" ><a style="color:#fff; text-decoration:none;" href="edit_cat.php?id= <?= $item['id'] ?>"> Edit</a></button>
                                    <!-- <button><a class="action_btn" href="edit_cat.php?id= <?= $item['id'] ?> " >Edit</a></button> -->
                                    <form action="query.php" method="POST">
                                        <input type="hidden" name="cat_id" value="<?= $item['id']; ?>">
                                        <button class="action_btn" type="submit" name="del_cat">Delete</button>
                                    </form>
                                </div>
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