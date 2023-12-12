<?php

session_start();
$id = $_SESSION["id"];
$user = $_SESSION["user"];

if ($_SESSION['is_admin'] == false) {
    header("Location: ../index.php");
}


$conn = new mysqli('localhost', 'root', '123456', 'akadsi');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <h1>Welcome,
        <?php echo $user; ?>
    </h1>
    <li class="list-group-item"><a href="../services/logout.php">Logout</a></li>
    <h2>Manage Akun Mahasiswa</h2>
    <table class='table'>
        <thead>
            <tr>
                <th>username</th>
                <th>nim</th>
                <th>email</th>
                <th>action</th>
            </tr>

        </thead>
        <tbody>
            <?php


            while ($row = $result->fetch_assoc()) {

                $btn = "<form action='../services/admin_detail.php' method='post'>

                <input type='hidden' name='nim' id='nim' value='".$row['NIM']."'>
                <input type='hidden' name='user_id' id='user_id' value='".$row['id']."'>

                <button type='submit' class='btn btn-primary'>Detail</button>

                </form>";

                echo "<tr>";
                echo "<td>" . $row['USERNAME'] . "</td>";
                echo "<td>" . $row['NIM'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $btn . "</td>";
                echo "</tr>";


            }




            ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary">Add New User</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>