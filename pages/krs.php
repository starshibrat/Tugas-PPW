<?php
session_start();
if($_SESSION['id'] == -1){
    header("Location: ../index.php");
}
$nim = $_SESSION["NIM"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS</title>
</head>

<body>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="biodata.php">Biodata</a></li>
        <li>KRS</li>
        <li><a href="../services/logout.php">Logout</a></li>

    </ul>
    <h1>KRS</h1>
    <a href="grabkrs.php"><button type="button">Tambah KRS [+]</button></a><br>

    <?php
    $conn = new mysqli('localhost', 'root', '123456', 'akadsi');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $sql = "SELECT COURSES FROM data_mahasiswa WHERE NIM='$nim'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $cs = $row["COURSES"];

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Kode Mata Kuliah</th>";
        echo "<th>Nama Mata Kuliah</th>";
        echo "<th>Dosen</th>";
        echo "<th>Jadwal</th>";
        echo "<th>Tempat</th>";
        echo "<th>Sks</th>";
        echo "</tr>";

        for ($i = 0; $i < strlen($cs); $i += 3) {
            $csid = $cs[$i] . $cs[$i + 1] . $cs[$i + 2];

            $sql2 = "SELECT * FROM course WHERE course_id='$csid'";
            $result = $conn->query($sql2);
            $row1 = $result->fetch_assoc();
            $name = $row1["NAMA"];
            $courseid = $row1["course_id"];
            $dosen = $row1["DOSEN"];
            $jadwal = $row1["JADWAL"];
            $tempat = $row1["TEMPAT"];
            $sks = $row1["SKS"];
            echo "<tr>";

            echo "<td>$courseid</td>";
            echo "<td>$name</td>";
            echo "<td>$dosen</td>";
            echo "<td>$jadwal</td>";
            echo "<td>$tempat</td>";
            echo "<td>$sks</td>";


            echo '</tr>';

        }
        echo "</table>";



    }

    ?>

</body>

</html>