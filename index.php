<?php
include 'inc/header.php';
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = 'You are already logged in';
    header('Location: main.php');
    exit();
}

?>

<form action="functions/authcode.php" method="POST">
    <?php if (isset($_SESSION['message'])) {  ?>
        <div class="error_message">
            <strong> <?= $_SESSION['message']; ?> </strong>
        </div>
    <?php unset($_SESSION['message']);
    } ?>
    <div class="form-container">
        <h3>SIGN UP</h3>
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div>
            <label for="number">Phone Number: </label>
            <input type="number" name="number" placeholder="Enter Phone Number">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Enter Email">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div>
            <label for="cpassword">Confrim Password: </label>
            <input type="password" name="cpassword" placeholder="Confrim Password">
        </div>
        <input class="btn" type="submit" name="sign_up" value="Sign Up">
    </div>
</form>

<?php
include 'inc/footer.php';
?>