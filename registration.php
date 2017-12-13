<?php
session_start();
include_once 'database.php';
include 'validation.php';
include 'login.php';
include 'insert.php';
include 'update.php';
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
$oldname = $oldsurname = $oldemail  = $oldcountry  = "";

if(!empty($_SESSION['email'])){
    $sesionEmail = $_SESSION['email'];
    $sql = "SELECT name,lastName,email,country FROM users WHERE email='$sesionEmail'";

    if($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_row($result);
        $oldname = $row[0];
        $oldsurname = $row[1];
        $oldemail = $row[2];
        $oldcountry = $row[3];
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

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

<?php include 'nav.php'?>




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
                   placeholder="Wpisz swoje imię" name="name" value=<?=$oldname?>>
            <small class="text-danger"> <?php echo $nameErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" aria-describedby="emailHelp"
                   placeholder="Wpisz swoje nazwisko" name="surname" value=<?=$oldsurname?>>
            <small class="text-danger"> <?php echo $surnameErr; ?></small>
            <!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz email"
                   name="email" value=<?=$oldemail?>>
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
        <input type="submit" class="btn btn-outline-primary" name=<?php if(empty($_SESSION['email'])){
            echo 'register';
        }else{
            echo 'update';
        } ?> value=<?php if(empty($_SESSION['email'])){
            echo 'Rejestruj';
        }else{
            echo 'Akcpetuj';
        } ?>>
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
