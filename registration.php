<?php
session_start();
include 'login.php';
include 'validation.php';
if (!isset($_COOKIE['cookie_color'])) {
    setcookie('cookie_color', 'white', time() + (86400 * 30), "/");
}
if (isset($_GET['color'])) {
    if ($_GET['color'] == 'white') {
        setcookie('cookie_color', 'white', time() + (86400 * 30), "/");
        $color = 'white';
    } elseif ($_GET['color'] == 'black') {
        setcookie('cookie_color', 'black', time() + (86400 * 30), "/");
        $color = 'black';
    }
} else {
    $color = $_COOKIE['cookie_color'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Rejestracja</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <style>
        body {
            background-color: <?= $color?>;

        }

        form {
            color: <?php if($color=='white'){
                echo 'black';
            }else {
                echo 'white';
            } ?>;
        }
    </style>


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
                    <a href="registration.php?color=black" class="nav-link">Czarne
                        tło</a>
                </li>
                <li class="nav-item">
                    <a href="registration.php?color=white" class="nav-link">Białe
                        tło</a>
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
        <p class="lead">Rejestracja użytkownika</p>
        <hr class="my-4">
        <p>Wzięcie udziału w konkursie wymaga podania przez Ciebie kilku informacji. Wszystkie dane zawarte są w
            regulaminie konkursu.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Dowiedz się więcej</a>
        </p>
    </div>
</div>
<!--.Jumbotron-->


<!--FormularzRejestracji-->
<div class="container mb-4">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                   placeholder="Wpisz swoje imię" name="name">
            <small class="text-danger"> <?php echo $nameErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" aria-describedby="emailHelp"
                   placeholder="Wpisz swoje nazwisko" name="surname">
            <small class="text-danger"> <?php echo $surnameErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz email"
                   name="email">
            <small class="text-danger"> <?php echo $emailErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                   placeholder="Wpisz hasło" name="password">
            <small class="text-danger"> <?php echo $passwordErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="password-repeat">Powtorz hasło</label>
            <input type="password" class="form-control" id="password-repeat" aria-describedby="emailHelp"
                   placeholder="Powtórz hasło" name="password-repeat">
            <small class="text-danger"> <?php echo $passwordRepeatErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="country-picker">Wybierz kraj pochodzenia</label>
            <select id="country-picker" class="form-control" name="country">
                <option>Polska</option>
                <option>Ukraina</option>
                <option>Niemcy</option>
                <option>Rosja</option>
            </select>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy-accepted" value="accepted" name="policy">
                Akceptuję regulamin konkursu.
                <small class="text-danger"> <?php echo $policyErr; ?></small>
            </label>
        </div>
        <input type="submit" class="btn btn-outline-primary" value="Rejestruj">
        <input type="reset" class="btn btn-outline-danger" value="Wyczyść">
    </form>
</div>
<!--.FormularzRejestracji-->


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
