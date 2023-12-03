<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="services/register.php" method="post">
        <label for="username" >
            Username
        </label>
        <input type="text" placeholder="Username" id="username" name="username" required/>
        <label for="nim">
            NIM
        </label>
        <input type="text" placeholder="NIM"  id="nim" name="nim" required/>
        <label for="email">
            Email
        </label>
        <input type="email" placeholder="myemail@themail.com"  id="email" name="email" required/>

        <label for="password">
            Password
        </label>
        <input type="password"  id="password" name="password" placeholder="Password" required/>
        

        <input type="submit" value="Register">

    </form>
    <a href="index.php">Sudah punya akun? Login disini</a>
    
</body>
</html>