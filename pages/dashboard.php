<?php

session_start();

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
</head>

<body>
    <ul>
        <li>Home</li>
        <li><a href="biodata.php">Biodata</a></li>
        <li><a href="../services/logout.php">Logout</a></li>

    </ul>

    

</body>

</html>