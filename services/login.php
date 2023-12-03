<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$captcha = $_POST['captcha'];

$captcha_check = ($_SESSION['a'] + $_SESSION['b'] == $captcha);

if (!$captcha_check){
    echo "Wrong Captcha!";
    header("Location: ../index.php");
} else {
    echo "Login Succsss";
}

?>