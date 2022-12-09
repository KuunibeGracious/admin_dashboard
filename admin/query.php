<?php
session_start();
include '../config/database.php';
include '../functions/myFunctions.php';

if (isset($_POST['save'])) {
    $name = $_POST['cat_name'];
    $desc = $_POST['cat_description'];
    $img = $_POST['image'];
    $date = $_POST['created_at'];
    $status = isset($_POST['cat_status']) ? '1' : '0';

    $img = $_FILES['image']['name'];
    $path = "../uploads";
    $img_ext = pathinfo($img, PATHINFO_EXTENSION);
    $filename = time() . '.' . $img_ext;

    $cat_query = "INSERT INTO categories (cat_name, cat_description, cat_status, image, created_at) VALUES ('$name', '$desc', '$status', '$img', '$date')";

    $cat_query_run = mysqli_query($conn, $cat_query);

    if ($cat_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("./categories.php", 'category added');
    } else {
        redirect("./categories.php", 'something went wrong');
    }
} else if (isset($_POST['update'])) {
    $cat_id = $_POST['cat_id'];
    $name = $_POST['cat_name'];
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
        $update_query = "UPDATE categories SET cat_name='$name', cat_description = '$desc', cat_status = '$status', image = '$update_filename', created_at = '$date' WHERE id = '$cat_id' ";
        echo 'yes';
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
}
