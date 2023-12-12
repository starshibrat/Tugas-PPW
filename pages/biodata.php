<?php
session_start();

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
    <title>Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <ul class="list-group">
        <li class="list-group-item"><a href="dashboard.php">Home</a></li>
        <li class="list-group-item active">Biodata</li>
        <li class="list-group-item"><a href="krs.php">KRS</a></li>
        <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>

    </ul>

    <h1>Biodata Mahasiswa</h1>
    <div class="container-fluid w-100 p-3">
        <form action='../services/update.php' method='post'>
            <input type='hidden' id='NIM' name='NIM' value=<?php echo $nim; ?>>
            <div class="form-group m-2">
                <label for='NAMA'>NAMA</label>
                <br>
                <input type='text' id='NAMA' name='NAMA' value=<?php echo $NAMA; ?>>
            </div>
            <div class="form-group m-2">
                <label for='ALAMAT'>ALAMAT</label>
                <br>
                <input type='text' id='ALAMAT' name='ALAMAT' value=<?php echo $ALAMAT; ?>>
            </div>
            <div class="form-group m-2">
                <label for='TEMPAT_LAHIR'>TEMPAT_LAHIR</label>
                <br>
                <input type='text' id='TEMPAT_LAHIR' name='TEMPAT_LAHIR' value=<?php echo $TEMPAT_LAHIR; ?>>
            </div>
            <div class="form-group m-2">
                <label for='JENIS_KELAMIN'>JENIS_KELAMIN</label>
                <br>
                <input type='text' id='JENIS_KELAMIN' name='JENIS_KELAMIN' value=<?php echo $JENIS_KELAMIN; ?>>
            </div>
            <div class="form-group m-2">
                <label for='AGAMA'>AGAMA</label>
                <br>
                <input type='text' id='AGAMA' name='AGAMA' value=<?php echo $AGAMA ?>>
            </div>
            <div class="form-group m-2">
                <label for='KEWARGANEGARAAN'>KEWARGANEGARAAN</label>
                <br>
                <input type='text' id='KEWARGANEGARAAN' name='KEWARGANEGARAAN' value=<?php echo $KEWARGANEGARAAN; ?>>
            </div>
            <div class="form-group m-2">
                <label for='JENIS_TINGGAL'>JENIS_TINGGAL</label>
                <br>
                <input type='text' id='JENIS_TINGGAL' name='JENIS_TINGGAL' value=<?php echo $JENIS_TINGGAL; ?>>
            </div>
            <div class="form-group m-2">
                <label for='TRANSPORTASI'>TRANSPORTASI</label>
                <br>
                <input type='text' id='TRANSPORTASI' name='TRANSPORTASI' value=<?php echo $TRANSPORTASI; ?>>
            </div>
            <div class="form-group m-2">
                <label for='PROVINSI'>PROVINSI</label>
                <br>
                <input type='text' id='PROVINSI' name='PROVINSI' value=<?php echo $PROVINSI; ?>>
            </div>
            <div class="form-group m-2">
                <label for='KABUPATEN'>KABUPATEN</label>
                <br>
                <input type='text' id='KABUPATEN' name='KABUPATEN' value=<?php echo $KABUPATEN; ?>>
            </div>
            <div class="form-group m-2">
                <label for='KECAMATAN'>KECAMATAN</label>
                <br>
                <input type='text' id='KECAMATAN' name='KECAMATAN' value=<?php echo $KECAMATAN; ?>>
            </div>
            <div class="form-group m-2">
                <label for='NOTELP'>NOTELP</label>
                <br>
                <input type='text' id='NOTELP' name='NOTELP' value=<?php echo $NOTELP; ?>>
            </div>
            <div class="form-group m-2">
                <label for='NOHP'>NOHP</label>
                <br>
                <input type='text' id='NOHP' name='NOHP' value=<?php echo $NOHP; ?>>
            </div>
            <div class="form-group m-2">
                <label for='EMAIL'>EMAIL</label>
                <br>
                <input type='text' id='EMAIL' name='EMAIL' value=<?php echo $EMAIL; ?>>
            </div>
            <div class="form-group m-2">
                <label for='NIK'>NIK</label>
                <br>
                <input type='text' id='NIK' name='NIK' value=<?php echo $NIK; ?>>
            </div>
            <div class="form-group m-2">
                <label for='NPWP'>NPWP</label>
                <br>
                <input type='text' id='NPWP' name='NPWP' value=<?php echo $NPWP; ?>>
            </div>
            <div class="form-group m-2">
                <label for='KPS'>KPS</label>
                <br>
                <input type='text' id='KPS' name='KPS' value=<?php echo $KPS; ?>>
            </div>
            <div class="form-group m-2">

                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>