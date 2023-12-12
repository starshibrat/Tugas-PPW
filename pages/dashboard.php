<?php

session_start();
$nim = $_SESSION["NIM"];

if ($_SESSION['id'] == -1) {
    header("Location: ../index.php");
}
$id = $_SESSION['id'];

$conn = new mysqli('localhost', 'root', '123456', 'akadsi');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {

    $sql = "SELECT NIM FROM users WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $nim = $row["NIM"];
    $_SESSION["NIM"] = $nim;


    $conn = new mysqli('localhost', 'root', '123456', 'akadsi');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM data_mahasiswa WHERE NIM = '$nim'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $NAMA = $row["NAMA"];
        $ALAMAT = $row["ALAMAT"];
        $TEMPAT_LAHIR = $row["TEMPAT_LAHIR"];
        $JENIS_KELAMIN = $row["JENIS_KELAMIN"];
        $AGAMA = $row["AGAMA"];
        $KEWARGANEGARAAN = $row["KEWARGANEGARAAN"];
        $JENIS_TINGGAL = $row["JENIS_TINGGAL"];
        $TRANSPORTASI = $row["TRANSPORTASI"];
        $PROVINSI = $row["PROVINSI"];
        $KABUPATEN = $row["KABUPATEN"];
        $KECAMATAN = $row["KECAMATAN"];
        $NOTELP = $row["NOTELP"];
        $NOHP = $row["NOHP"];
        $EMAIL = $row["EMAIL"];
        $NIK = $row["NIK"];
        $NPWP = $row["NPWP"];
        $KPS = $row["KPS"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <ul class="list-group">
        <li class="list-group-item active">Home</li>
        <li class="list-group-item"><a href="biodata.php">Biodata</a></li>
        <li class="list-group-item"><a href="krs.php">KRS</a></li>
        <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>

    </ul>
    <br><br>
    <h1 class="display-2">Informasi Mahasiswa</h1>

    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Nama</div>
                <?php echo $NAMA; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Alamat</div>
                <?php echo $ALAMAT; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Tempat Lahir</div>
                <?php echo $TEMPAT_LAHIR; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Jenis Kelamin</div>
                <?php echo $JENIS_KELAMIN; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Agama</div>
                <?php echo $AGAMA; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kewarganegaraan</div>
                <?php echo $KEWARGANEGARAAN; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Jenis Tinggal</div>
                <?php echo $JENIS_TINGGAL; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Transportasi</div>
                <?php echo $TRANSPORTASI; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Provinsi</div>
                <?php echo $PROVINSI; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kabupaten</div>
                <?php echo $KABUPATEN; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kecamatan</div>
                <?php echo $KECAMATAN; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">No. Telepon</div>
                <?php echo $NOTELP; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">No. HP</div>
                <?php echo $NOHP; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Email</div>
                <?php echo $EMAIL; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">NIK</div>
                <?php echo $NIK; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">NPWP</div>
                <?php echo $NPWP; ?>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">KPS</div>
                <?php echo $KPS; ?>
            </div>
        </li>



    </ol>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>