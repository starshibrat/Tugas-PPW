<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="m-3 w-50 bg-light p-3">
        <h1 class="display-2 mb-3">Register</h1>
        <form action="services/register.php" method="post">
            <div class='input-group mb-3'>
                <input type="text" class='w-75 form-control' placeholder="Username" id="username" name="username"
                    required />
            </div>
            <div class='input-group mb-3'>
                <input type="text" class='w-75 form-control' placeholder="NIM" id="nim" name="nim" required />
            </div>
            <div class='input-group mb-3'>
                <input type="email" placeholder="myemail@themail.com" class='w-75 form-control' id="email" name="email"
                    required />
            </div>

            <div class='input-group mb-3'>
                <input type="password" id="password" name="password" class='w-75 form-control' placeholder="Password"
                    required />
            </div>


            <button type="submit" class="btn btn-primary">Register</button>

        </form>
        <a href="index.php">Sudah punya akun? Login disini</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>