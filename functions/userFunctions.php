<?php
include './config/database.php';

function getAllActive($table_name)
{
    global $conn;
    $query = "SELECT * FROM $table_name WHERE cat_status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function getActiveSlug($table_name, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table_name WHERE slug = '$slug' AND cat_status = '0' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);
}
function getActiveProdSlug($table_name, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table_name WHERE slug = '$slug' AND status = '0' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);
}
function getProdByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM products WHERE cat_id='$category_id' and status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function getActiveId($table_name, $id)
{
    global $conn;
    $query = "SELECT * FROM $table_name WHERE id='$id' AND cat_status='0'";
    return $query_run = mysqli_query($conn, $query);
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}
