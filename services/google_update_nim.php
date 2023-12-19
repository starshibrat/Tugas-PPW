<?php
session_start();
$NIM = $_POST["NIM"];
$id_mhw = $_POST["id_mhw"];
$user_id = $_POST["user_id"];
$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql1 = "UPDATE data_mahasiswa
    SET NIM=\"$NIM\" WHERE ID=$id_mhw";
    $sql2 = "UPDATE users
    SET NIM=\"$NIM\" WHERE id=$user_id";
    $conn->query($sql1);
    $conn->query($sql2);

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "Data berhasil di update<br>";
        $_SESSION["logged_in"] = true;
        $_SESSION["id"] = $user_id;
        $_SESSION["NIM"] = $NIM;



        header("Location: ../pages/biodata.php");
    } else {
        echo "Failed to update row";
    }
}


?>