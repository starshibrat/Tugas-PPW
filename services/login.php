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
    
    $conn = new mysqli('localhost', 'root', '123456', 'akadsi');

    $sql = "SELECT USERNAME, PASSWORD FROM users WHERE USERNAME = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if ($password == $row["PASSWORD"]){
            header("Location: ../pages/dashboard.php");
        } else {
            echo "Wrong username or password";
        }
    } else {
        echo "Wrong username or password";
    }
    
    
}

?>