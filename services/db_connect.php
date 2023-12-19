<?php
$host = 'localhost';
$username = 'root';
$password = '123456';
$database = 'akadsi';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
