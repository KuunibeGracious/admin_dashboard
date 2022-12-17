<?php
$page =  substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1)

?>
<style>
    <?php include "admin.css" ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./admin.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Clothing Shop</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <div class="admin_dashboard">
        <nav class="sidebar">
            <h1>Shop</h1>
            <div class="navigations">
                <div class="sidebar_pages">
                    <p class=" <?= $page == "index.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/index.php">Dashboard</a></p>
                    <p class=" <?= $page == "all_categories.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/all_categories.php">All Categories</a></p>
                    <p class=" <?= $page == "add_category.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/add_category.php">Add Category</a></p>
                    <p class=" <?= $page == "all_products.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/all_products.php">All Products</a></p>
                    <p class=" <?= $page == "add_product.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/add_product.php">Add Product</a></p>
                    <p class=" <?= $page == "orders.php" ? 'active' : '' ?> "><a style="color:#000; text-decoration:none;" href="/admin_dashboard/admin/orders.php">Orders</a></p>
                </div>
                <button><a style="color:#fff; text-decoration:none;" id="logout" href="/admin_dashboard/logout.php">Logout</a></button>
            </div>
        </nav>