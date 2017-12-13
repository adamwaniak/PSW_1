<?php
include_once 'database.php';

if(empty($_COOKIE['cookie_email'])){
    $_SESSION['email'] = $_COOKIE['cookie_email'];
}

$msg = '';

if (isset($_POST['login']) && !empty($_POST['email'])
    && !empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT email FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $_SESSION['timeout'] = time();
        $_SESSION['email'] = $email;
        setcookie('cookie_email', '$email', time() + (86400 * 30), "/");
        header('Location: ' . $_SERVER['REQUEST_URI']);

    } else {
        $loginError = 'Zły email lub hasło';
        echo 'Zły email lub hasło';
    }
}
if (isset($_POST['logout'])) {
    unset($_SESSION["email"]);
    unset($_COOKIE['cookie_email']);
    header('Location: index.php');
}
