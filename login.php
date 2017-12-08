<?php
$msg = '';

if (isset($_POST['login']) && !empty($_POST['email'])
    && !empty($_POST['password'])) {

    if ($_POST['email'] == 'email@example.com' &&
        $_POST['password'] == '1234') {
        $_SESSION['timeout'] = time();
        $_SESSION['email'] = 'email@example.com';
        header('Location: '.$_SERVER['REQUEST_URI']);

    } else {
        $loginError = 'Zły email lub hasło';
    }
}
if (isset($_POST['logout'])) {
    unset($_SESSION["email"]);
    header('Location: index.php');
}
