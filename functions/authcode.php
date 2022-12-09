<?php
session_start();
include '../config/database.php';
include './myFunctions.php';
if (isset($_POST['sign_up'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_query = "SELECT email FROM users WHERE email='$email'";
    $check_query_run = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_query_run) > 0) {
        redirect("../index.php", 'Email already exits');
    } else {
        if ($password == $cpassword) {
            //insert user data
            $insert_query = "INSERT INTO users (username, number, email, password, confirm_password) VALUES('$username', '$number', '$email', '$password', '$cpassword')";
            try {
                $insert_query_run = mysqli_query($conn, $insert_query);
            } catch (mysqli_sql_exception $e) {
                var_dump($e);
                exit;
            };

            if ($insert_query_run) {
                redirect("../login.php", 'sign up sucessful');
            } else {
                redirect("index.php", 'sign up failed');
            }
        } else {
            redirect("../index.php", 'passwords do not match');
        }
    }
} else if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $user_data = mysqli_fetch_array($login_query_run);
        $username = $user_data['username'];
        $password = $user_data['password'];
        $user_role = $user_data['role'];
        $_SESSION['auth_user'] = [
            'username' => $username,
            'password' => $password
        ];

        $_SESSION['user_role'] = $user_role;
        if ($user_role == 1) {
            redirect("../admin/index.php", 'Welcome to Dashboard');
        } else {
            redirect("../main.php", 'Logged In');
        }
    } else {
        redirect("../login.php", 'Invalid Credentials');
    }
}
