<?php
include '../functions/myFunctions.php';
if (isset($_SESSION['auth'])) {
    if ($_SESSION['user_role'] != 1) {
        redirect("../main.php", 'you are not authorized');
    }
} else {
    redirect("../login.php", 'Login to continue');
}
