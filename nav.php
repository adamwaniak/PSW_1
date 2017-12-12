<?php

echo '
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
                    <a href="registration.php" class="nav-link">Rejestracja</a>
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

                    <a class=\'nav-link\'
                       href="myAccount.php"><?php if (!empty($_SESSION[\'email\'])) echo $_SESSION[\'email\']; ?></a>
</li>' ?>
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
    echo ' <a href="#" class="nav-link">';
    echo $_SESSION['email'];
    echo ' </a> <form action="" method="post"><button type="submit" name=\'logout\' class="btn btn-info">Wyloguj</button></form>';
} ?>
<?php
echo '</ul>
</div>
</div>
</nav>'
?>


<!--.Nawigacja-->