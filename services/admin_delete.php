<?php
session_start();
$NIM = $_POST['NIM'];
$USER_ID = $_POST['user_id'];

$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql1 = "DELETE FROM users WHERE id=$USER_ID";
    $sql2 = "DELETE FROM data_mahasiswa WHERE NIM='$NIM'";
    $conn->query($sql1);
    $conn->query($sql2);

    if ($conn->query($sql1) && $conn->query($sql2)){
        header("Location: ../admin_panel/index.php");
    } else {
        echo "Failed to Delete";
    }


}