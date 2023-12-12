<?php

session_start();
$id = $_SESSION["id"];
$user = $_SESSION["user"];

if ($_SESSION['is_admin'] == false) {
    header("Location: ../index.php");
}


$conn = new mysqli('localhost', 'root', '123456', 'akadsi');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>

    <h1>Welcome, <?php echo $user; ?></h1>
    <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>

</body>

</html>