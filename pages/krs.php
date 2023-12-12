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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <ul class="list-group">
        <li class="list-group-item"><a href="dashboard.php">Home</a></li>
        <li class="list-group-item"><a href="biodata.php">Biodata</a></li>
        <li class="list-group-item active">KRS</li>
        <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>

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

        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Kode Mata Kuliah</th>";
        echo "<th>Nama Mata Kuliah</th>";
        echo "<th>Dosen</th>";
        echo "<th>Jadwal</th>";
        echo "<th>Tempat</th>";
        echo "<th>Sks</th>";
        echo "</tr>";
        echo "</thead>";

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>