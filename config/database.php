<?php
$host = "localhost";
$user = "Grey";
$password = "retro27##";
$database = "php_dev";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('connection failed' . mysqli_connect_error());
}
