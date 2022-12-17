<?php
session_start();
include '../config/database.php';
include '../functions/myFunctions.php';

if (isset($_POST['save'])) {
    $name = $_POST['cat_name'];
    $slug = $_POST['slug'];
    $desc = $_POST['cat_description'];
    // $img = $_POST['image'];
    $date = $_POST['created_at'];
    $status = isset($_POST['cat_status']) ? '1' : '0';

    $img = $_FILES['image']['name'];
    $path = "../uploads";
    $img_ext = pathinfo($img, PATHINFO_EXTENSION);
    $filename = time() . '.' . $img_ext;

    $cat_query = "INSERT INTO categories (cat_name, slug, cat_description, cat_status, image, created_at) VALUES ('$name', '$slug', '$desc', '$status', '$filename', '$date')";

    $cat_query_run = mysqli_query($conn, $cat_query);

    if ($cat_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("./add_category.php", 'category added');
    } else {
        redirect("./add_category.php", 'something went wrong');
    }
} else if (isset($_POST['edit_cat'])) {
    $cat_id = $_POST['cat_id'];
    $name = $_POST['cat_name'];
    $slug = $_POST['slug'];
    $desc = $_POST['cat_description'];
    // $img = $_POST['image'];
    $date = $_POST['created_at'];
    $status = isset($_POST['cat_status']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != " ") {
        //$update_filename = $new_image;
        $img_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $img_ext;
    } else {
        $update_filename = $old_image;
    }

    try {
        $update_query = "UPDATE categories SET cat_name='$name', slug='$slug' cat_description = '$desc', cat_status = '$status', image = '$update_filename', created_at = '$date' WHERE id = '$cat_id' ";
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }

    try {
        $update_query_run = mysqli_query($conn, $update_query);
        if ($update_query_run) {
            if ($_FILES['image']['name'] != " ") {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                if (file_exists('../uploads/' . $old_image)) {
                    unlink('../uploads/' . $old_image);
                }
            }

            redirect("edit_cat.php?id=$cat_id", 'category updated');
        } else {
            redirect("edit_cat.php?id=$cat_id", 'something went wrong');
        }
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }
} else if (isset($_POST['del_cat'])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $cat_query = "SELECT * FROM categories WHERE id='$cat_id'";
    $cat_query_run = mysqli_query($conn, $cat_query);
    $cat_data = mysqli_fetch_array($cat_query_run);
    $image = $cat_data['image'];
    try {
        $delete_query = "DELETE FROM categories WHERE id = '$cat_id'";
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }
    try {
        $delete_query_run = mysqli_query($conn, $delete_query);
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }

    if ($delete_query_run) {
        if (file_exists('../uploads/' . $image)) {
            unlink('../uploads/' . $image);
        }
        redirect("./all_categories.php", "category deleted");
    } else {
        redirect("./all_categories.php", "something went wrong");
    }
} else if (isset($_POST['add_product'])) {
    $category_id = $_POST['cat_id'];
    $prod_name = $_POST['prod_name'];
    $prod_slug = $_POST['prod_slug'];
    $prod_desc = $_POST['prod_description'];
    $quantity = $_POST['quantity'];
    $prod_status = $_POST['prod_status'] ? '1' : '0';
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $image = $_FILES['image']['name'];
    $date = $_POST['created_at'];

    $path = "../uploads";
    $img_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $img_ext;

    $prod_query = "INSERT INTO products (cat_id, name,slug, image, description, status, qty, original_price,selling_price, created_at ) VALUES ('$category_id', '$prod_name', '$prod_slug', '$filename','$prod_desc', '$prod_status', '$quantity','$original_price','$selling_price','$date')";

    $prod_query_run = mysqli_query($conn, $prod_query);

    if ($prod_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("./add_product.php", 'product added');
    } else {
        redirect("./add_product.php", 'something went wrong');
    }
} else if (isset($_POST['edit_product'])) {
    $prod_id = $_POST['prod_id'];
    $name = $_POST['prod_name'];
    $desc = $_POST['prod_description'];
    $quantity = $_POST['quantity'];
    $prod_status = isset($_POST['prod_status']) ? '1' : '0';
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    // $img = $_POST['image'];
    $date = $_POST['created_at'];

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != " ") {
        //$update_filename = $new_image;
        $img_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $img_ext;
    } else {
        $update_filename = $old_image;
    }

    try {
        $update_query = "UPDATE products SET name='$name', description = '$desc', qty='$quantity',  status = '$prod_status', original_price = '$original_price', selling_price = '$selling_price', image = '$update_filename', created_at = '$date' WHERE id = '$prod_id' ";
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }

    try {
        $update_query_run = mysqli_query($conn, $update_query);
        if ($update_query_run) {
            if ($_FILES['image']['name'] != " ") {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                if (file_exists('../uploads/' . $old_image)) {
                    unlink('../uploads/' . $old_image);
                }
            }

            redirect("edit_prod.php?id=$prod_id", 'product updated');
        } else {
            redirect("edit_prod.php?id=$prod_id", 'something went wrong');
        }
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }
} else if (isset($_POST['del_prod'])) {
    $prod_id = mysqli_real_escape_string($conn, $_POST['prod_id']);
    $prod_query = "SELECT * FROM categories WHERE id='$prod_id'";
    $prod_query_run = mysqli_query($conn, $prod_query);
    $prod_data = mysqli_fetch_array($prod_query_run);
    $image = $prod_data['image'];
    try {
        $delete_query = "DELETE FROM products WHERE id = '$prod_id'";
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }
    try {
        $delete_query_run = mysqli_query($conn, $delete_query);
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }

    if ($delete_query_run) {
        if (file_exists('../uploads/' . $image)) {
            unlink('../uploads/' . $image);
        }
        redirect("./all_products.php", "product deleted");
    } else {
        redirect("./all_products.php", "something went wrong");
    }
}
