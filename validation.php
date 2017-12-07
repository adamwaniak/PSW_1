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
