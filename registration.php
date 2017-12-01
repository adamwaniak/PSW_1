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
</head>


<body>

<?php
$name = $surname = $email = $password = $passwordRepeat = $country = $policy = "";
$nameErr = $surnameErr = $emailErr = $passwordErr = $passwordRepeatErr = $countryErr = $policyErr = "";
const EMAIL_REGEX = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    get_input($name, "name", $nameErr, "Imie jest wymagane");
    get_input($surname, "surname", $surnameErr, "Nazwisko jest wymagane");
    get_input($email, "email", $emailErr, "Email jest wymagany");
    get_input($password, "password", $passwordErr, "Hasło jest wymagane");
    get_input($passwordRepeat, "password-repeat", $passwordRepeatErr, "Hasła się nie zgadzają");
    get_input($country, "country", $countryErr, "");
    get_input($policy, "policy", $policyErr, "Wymagana jest akcpetacja regulaminu");
    check_password($password, $passwordRepeat, $passwordRepeatErr, "Hasła się nie zgadzają");
    check_email($email, $emailErr, "Podany email jest nieprawidłowy");


}
function check_email(&$email, &$emailErr, $errorMsg)
{
    if (!empty($email)) {
        if (preg_match(EMAIL_REGEX, $email)) {
            return true;
        } else {
            $emailErr = $errorMsg;
            return false;
        }
    }
}

function check_password(&$password, &$passwordRepeat, &$errorVariable, $errorMsg)
{
    if ($password != $passwordRepeat) {
        $errorVariable = $errorMsg;
        return false;
    } else {
        return true;
    }
}

function get_input(&$variable, $input, &$errorVariable, $errorMsg)
{
    if (empty($_POST[$input])) {
        $errorVariable = $errorMsg;
    } else {
        $variable = test_input($_POST[$input]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!--Nawigacja-->
<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand mr-5" href="#">Arte</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Regulamin</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Logowanie</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="px-4 py-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password">Hasło</label>
                                    <input type="password" class="form-control" id="password" placeholder="Wpisz hasło">
                                </div>
                                <button type="submit" class="btn btn-primary">Zaloguj</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Nie masz konta? Zarejestruj się</a>
                            <a class="dropdown-item" href="#">Nie pamiętam hasła.</a>
                        </div>
                    </div>
                </li>
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
