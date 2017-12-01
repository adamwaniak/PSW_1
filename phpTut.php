<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP tut</title>
</head>
<body>


<?php
echo "typowanie dynamiczne: <br>";

$var = 5.5;
echo "\$var = 5.5: ";
echo gettype($var) . '<br>';

$var = (int)$var;
echo "\$var = (int)\$var: ";
echo gettype($var) . '<br>';

$var = "naspis";
echo "\$var = \"naspis\": ";
echo gettype($var);

$var = 5 + 5;

echo '<br>'.$var;



$var = array(1,1,1,1,1,1);


foreach($var as $value){
    echo '<br>' . $value;
}

echo '<br> Długość tablicy: '. count($var);


echo '<br> $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); <br>';
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";

?>

</body>
</html>