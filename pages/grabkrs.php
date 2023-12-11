<?php 
session_start();
if($_SESSION['id'] == -1){
    header("Location: ../index.php");
}
$nim = $_SESSION["NIM"];

echo "<a href='krs.php'>Kembali</a>";
echo "<br>";

$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Kode Mata Kuliah</th>";
        echo "<th>Nama Mata Kuliah</th>";
        echo "<th>Dosen</th>";
        echo "<th>Jadwal</th>";
        echo "<th>Tempat</th>";
        echo "<th>Sks</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            $name = $row["NAMA"];
            $courseid = $row["course_id"];
            $dosen = $row["DOSEN"];
            $jadwal = $row["JADWAL"];
            $tempat = $row["TEMPAT"];
            $sks = $row["SKS"];

            echo "<tr>";

            echo "<td>$courseid</td>";
            echo "<td>$name</td>";
            echo "<td>$dosen</td>";
            echo "<td>$jadwal</td>";
            echo "<td>$tempat</td>";
            echo "<td>$sks</td>";


            

            echo "<td>";
            echo "<form action='../services/addcourse.php' method='post'>
            <input type='hidden' name='nim' id='nim' value='".$nim."'>
            <input type='hidden' name='courseid' id='courseid' value='".$courseid."'>
            <input type='submit' value='+'>
            
            </form>
            ";
            echo "</td>";

            echo '</tr>';

        }
        echo "</table>";

    }

}

?>