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


        while ($row = $result->fetch_assoc()) {
            $name = $row["NAMA"];
            $courseid = $row["course_id"];
            $dosen = $row["DOSEN"];
            $jadwal = $row["JADWAL"];
            $tempat = $row["TEMPAT"];
            $sks = $row["SKS"];

            echo "$courseid\t|\t$name\t|\t$dosen\t|\t$jadwal\t|\t$tempat\t|\t$sks";

            echo "<form action='../services/addcourse.php' method='post'>
            <input type='hidden' name='nim' id='nim' value='".$nim."'>
            <input type='hidden' name='courseid' id='courseid' value='".$courseid."'>
            <input type='submit' value='+'>
            
            </form>
            ";

            echo "<br>";

        }

    }

}

?>