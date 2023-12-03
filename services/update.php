<?php
session_start();
$NIM = $_POST['NIM'];

$NAMA = $_POST["NAMA"];
$ALAMAT = $_POST["ALAMAT"];
$TEMPAT_LAHIR = $_POST["TEMPAT_LAHIR"];
$JENIS_KELAMIN = $_POST["JENIS_KELAMIN"];
$AGAMA = $_POST["AGAMA"];
$KEWARGANEGARAAN = $_POST["KEWARGANEGARAAN"];
$JENIS_TINGGAL = $_POST["JENIS_TINGGAL"];
$TRANSPORTASI = $_POST["TRANSPORTASI"];
$PROVINSI = $_POST["PROVINSI"];
$KABUPATEN = $_POST["KABUPATEN"];
$KECAMATAN = $_POST["KECAMATAN"];
$NOTELP = $_POST["NOTELP"];
$NOHP = $_POST["NOHP"];
$EMAIL = $_POST["EMAIL"];
$NIK = $_POST["NIK"];
$NPWP = $_POST["NPWP"];
$KPS = $_POST["KPS"];

$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql = "UPDATE data_mahasiswa
    SET 
    NAMA = \"$NAMA\",
    ALAMAT = \"$ALAMAT\",
    NOTELP = \"$NOTELP\",
    NOHP = \"$NOHP\",
    TEMPAT_LAHIR = \"$TEMPAT_LAHIR\",
    JENIS_KELAMIN = \"$JENIS_KELAMIN\",
    AGAMA = \"$AGAMA\",
    KEWARGANEGARAAN = \"$KEWARGANEGARAAN\",
    JENIS_TINGGAL = \"$JENIS_TINGGAL\",
    TRANSPORTASI = \"$TRANSPORTASI\",
    PROVINSI = \"$PROVINSI\",
    KABUPATEN = \"$KABUPATEN\",
    KECAMATAN = \"$KECAMATAN\",
    EMAIL = \"$EMAIL\",
    NIK = \"$NIK\",
    NPWP = \"$NPWP\",
    KPS = \"$KPS\"

    WHERE NIM='$NIM'";
    $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil di update<br>";
        header("Location: ../pages/biodata.php");
    } else {
        echo "Failed to update row";
    }

}

?>