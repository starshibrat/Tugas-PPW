<?php
session_start();

$nim = $_POST["nim"];

$courseid = $_POST["courseid"];

$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql1 = "SELECT * FROM data_mahasiswa WHERE NIM = '$nim'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();

    $cur_crs = $row["COURSES"] . $courseid;

    $sql2 = "UPDATE data_mahasiswa
    SET COURSES = '$cur_crs' WHERE NIM = '$nim'";
    if ($conn->query($sql2) === TRUE) {
        echo "Data berhasil di update<br>";
        header("Location: ../pages/krs.php");
    } else {
        echo "Failed to update row";
    }

}


?>