<?php
include 'inc/header.php';

if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = 'You are already logged in';
    header('Location: main.php');
    exit();
}

?>

<form action="functions/authcode.php" method="POST">
    <div class="container">
        <?php if (isset($_SESSION['message'])) {  ?>
            <div class="error_message">
                <strong> <?= $_SESSION['message']; ?> </strong>
            </div>
        <?php unset($_SESSION['message']);
        } ?>
    </div>
    <div class="form-container">
        <h3>LOGIN</h3>
        <div>
            <label for="firstname">Username: </label>
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <input class="btn" type="submit" name="login" value="Login">
    </div>
</form>

<?php
include 'inc/footer.php';
?>