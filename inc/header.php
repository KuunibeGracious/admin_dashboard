<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../admin.css">
    <title>Clothing Shop</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <nav>
        <div class="nav-container">
            <h1>Clothing Shop</h1>
            <ul>
                <li><a href="./main.php">Home</a></li>
                <?php if (isset($_SESSION['auth'])) {
                ?>
                    <div id="logged_in">
                        <?= $_SESSION['auth_user']['username'] ?>
                    </div>
                    <li><a href="./logout.php">Logout</a></li>
                <?php
                } else {
                ?>
                    <li><a href="./index.php">Sign Up</a></li>
                    <li><a href="./Login.php">Login</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>