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
</head>

<body>
    <form action="services/login.php" method="post">
        <label for="username">
            Username
        </label>
        <input type="text" placeholder="Username" id="username" name="username">
        <label for="password">
            Password
        </label>
        <input type="password" id="password" name="password" placeholder="Password">
        <label for="captcha">
            Captcha
        </label>

        <h2>
            <?php echo "$a + $b" ?>
        </h2>

        <input type="text" placeholder="Captcha" id="captcha" name="captcha">

        <input type="submit" value="Login">

    </form>
    <a href="register.php">Belum punya akun? Register disini</a>

</body>

</html>