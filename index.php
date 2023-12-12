<?php
session_start();
$a = rand(1, 9);
$b = rand(1, 9);
$_SESSION['a'] = $a;
$_SESSION['b'] = $b;
$_SESSION['id'] = -1;
$_SESSION["logged_in"] = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="m-3 w-25 bg-light p-3">
    <h1 class="display-2 mb-3">Login</h1>
        <form action="services/login.php" method="post">
            <div class='input-group mb-3'>
                <input type="text" class='form-control' placeholder="Username" id="username" name="username">
            </div>
            <div class='input-group mb-3'>
                <input type="password" id="password" class='form-control' name="password" placeholder="Password">
            </div>

            <h2>
                <?php echo "$a + $b" ?>
            </h2>
            <div class='input-group mb-3'>
                <input type="text" class='form-control' placeholder="Captcha" id="captcha" name="captcha">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>

        <a href="register.php">Belum punya akun? Register disini</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>