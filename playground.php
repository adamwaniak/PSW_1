<?php
session_start();
include 'database.php';
include 'login.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>playground</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php include 'nav.php' ?>
<?php
$sql = "SELECT id, name, lastName,email,password,country FROM users ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - lastName: " . $row["lastName"] . " - email: " . $row["email"] . " - password: " . $row["password"] . " - country: " . $row["country"] . "<br>";
    }
} else {
    echo "0 results";
}


echo '
$a = "witaj";
';

$a = "witaj";
echo '<br>';
echo '$$a = "świecie";';
echo '<br>';
$$a = "świecie";
echo "echo $\a $\witaj";
echo '<br>';
echo "$a $witaj";

echo '<br>';
$str = "Hello world. (can you hear me?)";
echo $str;
echo '<br>';
echo quotemeta($str);
echo '<br>';



echo 'users from Poland';
echo '<br>';

$sql = "SELECT id, name, lastName,email,password,country FROM users WHERE country='Polska' ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - lastName: " . $row["lastName"] . " - email: " . $row["email"] . " - password: " . $row["password"] . " - country: " . $row["country"] . "<br>";
    }
} else {
    echo "0 results";
}

?>




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