<?php
session_start();
// <link rel="stylesheet" href="../admin.css">
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
        include 'style.css';
        ?>
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Clothing Shop</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <nav>
        <div class="nav-container">
            <h1>Shop</h1>
            <ul>
                <li><a style="color:#fff; text-decoration:none;" href="./main.php">Home</a></li>
                <?php if (isset($_SESSION['auth'])) {
                ?>
                    <li><a style="color:#fff; text-decoration:none;" href="./categories.php">Collections</a></li>
                    <div class="logged">
                        <span><i class="fa fa-user"></i> </span>
                        <li><a style="color:#fff; text-decoration:none;" href="./logout.php">Logout</a></li>
                    </div>
                <?php
                } else {
                ?>
                    <li><a style="color:#fff; text-decoration:none;" href="./index.php">Sign Up</a></li>
                    <li><a style="color:#fff; text-decoration:none;" href="./Login.php">Login</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>