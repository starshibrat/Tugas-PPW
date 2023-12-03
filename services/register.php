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

    $sql1 = "INSERT INTO users (NIM, USERNAME, EMAIL, PASSWORD) VALUES(\"$nim\", \"$username\", \"$email\",\"$password\")";
    $sql2 = "INSERT INTO data_mahasiswa (NIM, EMAIL) VALUES(\"$nim\", \"$email\")";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE){
        echo "User successfully registered";
        echo "<a href='../index.php'>Click here to login</a>";
    } else {
        echo "Failed to create user";
    }



}

?>