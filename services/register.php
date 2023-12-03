<?php
session_start();
$conn = new mysqli('localhost', 'root', '123456', 'akadsi');

$nim = $_POST['nim'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql = "INSERT INTO users (NIM, USERNAME, EMAIL, PASSWORD) VALUES(\"$nim\", \"$username\", \"$email\",\"$password\")";

    if ($conn->query($sql) === TRUE){
        echo "User successfully registered";
        echo "<a href='../pages/dashboard.php'>Click here to go to dashboard</a>";
    } else {
        echo "Failed to create user";
    }



}

?>