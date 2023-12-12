<?php

session_start();
$nim = $_SESSION["NIM"];

if($_SESSION['id'] == -1){
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <ul class="list-group">
        <li class="list-group-item active">Home</li>
        <li class="list-group-item"><a href="biodata.php">Biodata</a></li>
        <li class="list-group-item"><a href="krs.php">KRS</a></li>
        <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>

    </ul>
    <h1><?php echo $nim ?></h1>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>