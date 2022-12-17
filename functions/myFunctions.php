<?php 
include '../config/database.php';

function getAll($table_name){
    global $conn;
    $query = "SELECT * FROM $table_name";
    return $query_run = mysqli_query($conn, $query);
}
function getById($table_name, $id){
    global $conn;
    $query = "SELECT * FROM $table_name WHERE id= $id";
    return $query_run = mysqli_query($conn, $query);
}
function getAllActive($table_name){
    global $conn;
    $query = "SELECT * FROM $table_name WHERE status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
?>