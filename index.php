<?php
session_start();
include 'login.php';
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Art</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<!--Nawigacja-->
<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand mr-5" href="index.php">Arte</a>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Regulamin</a>
                </li>
                <li class="nav-item">
                    <a href="myAccount.php" class="nav-link">Mój Profil</a>
                </li>
                <li class="nav-item">
                    <a href="registration.php" class="nav-link">Rejestracja</a>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <a class='nav-link'
                       href="myAccount.php"><?php if (!empty($_SESSION['email'])) echo $_SESSION['email']; ?></a>
                </li>
                <?php if (empty($_SESSION['email'])) {
                    echo '<li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Logowanie</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="px-4 py-3" action="" method="post" >
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password">Hasło</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Wpisz hasło">
                                </div>
                                <button type="submit" name=\'login\' class="btn btn-primary">Zaloguj</button>
                                <small class="text-danger"> <?php echo $loginError; ?></small>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="registration.php">Nie masz konta? Zarejestruj się</a>
                            <a class="dropdown-item" href="#">Nie pamiętam hasła.</a>
                        </div>
                    </div>
                </li>';
                } else {
                    echo ' <form action="" method="post"><button type="submit" name=\'logout\' class="btn btn-info">Wyloguj</button></form>';
                } ?>

            </ul>
        </div>
    </div>
</nav>
<!--.Nawigacja-->



<!--Jumbotron-->
<div class="jumbotron text-center">
    <div class="container">
        <h1 class="display-3">Arte Art Prize</h1>
        <p class="lead">Witaj</p>
        <hr class="my-4">
        <p></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Dowiedz się więcej</a>
        </p>
    </div>
</div>
<!--.Jumbotron-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>