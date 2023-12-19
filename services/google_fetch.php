<?php
include('../google_config.php');
include('db_connect.php');

// authenticate code from Google OAuth Flow 
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        // get profile info 
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        if (!empty($google_account_info['id'])) {
            $_SESSION['oauth_id'] = $google_account_info['id'];
        }

        if (!empty($google_account_info['given_name'])) {
            $_SESSION['first_name'] = $google_account_info['given_name'];
        }

        if (!empty($google_account_info['family_name'])) {
            $_SESSION['last_name'] = $google_account_info['family_name'];
        } else {
            $_SESSION['last_name'] = '';
        }

        if (!empty($google_account_info['email'])) {
            $_SESSION['email'] = $google_account_info['email'];
        }

        if (!empty($google_account_info['gender'])) {
            $_SESSION['gender'] = $google_account_info['gender'];
        }

        if (!empty($google_account_info['picture'])) {
            $_SESSION['image'] = $google_account_info['picture'];
        }

        $email = $google_account_info['email'];
        $queryEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = mysqli_query($connection, $queryEmail);


        $oauth_id = $google_account_info['id'];
        // $queryID = "SELECT * FROM users WHERE oauth_uid = '$oauth_id'";
        // $resultID = mysqli_query($connection, $queryID);

        if (mysqli_num_rows($resultEmail) === 1) { // This is login
            $conn = new mysqli('localhost', 'root', '123456', 'akadsi');
            if ($conn->connect_error) {
                die('Connection Failed: ' . $conn->connect_error);
            } else {
                $sql = "SELECT * FROM users WHERE EMAIL='$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $_SESSION["id"] = $row["id"];
                $sql = "SELECT * FROM data_mahasiswa WHERE EMAIL='$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $_SESSION["id_mhw"] = $row["id"];
                

            }
            $_SESSION["logged_in"] = true;

            header("Location: ../pages/dashboard.php");
            exit();
        } else { // This is register
            // Extract user information
            $full_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
            $email = $_SESSION['email'];
            $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
            $profile_picture = isset($_SESSION['image']) ? $_SESSION['image'] : '';
            $oauth_id = $_SESSION['oauth_id'];

            // Insert into biodata table
            $insertBiodataQuery = "INSERT INTO users (EMAIL) VALUES ('$email')";
            $resultBiodata = mysqli_query($connection, $insertBiodataQuery);

            // Insert into users table
            $insertUserQuery = "INSERT INTO data_mahasiswa (NAMA, EMAIL) VALUES ('$full_name', '$email')";
            $resultUser = mysqli_query($connection, $insertUserQuery);

            if ($resultBiodata && $resultUser) {
                // If both inserts are successful, redirect to biodata page
                $_SESSION["logged_in"] = true;
                $conn = new mysqli('localhost', 'root', '123456', 'akadsi');
                if ($conn->connect_error) {
                    die('Connection Failed: ' . $conn->connect_error);
                } else {
                    $sql = "SELECT * FROM data_mahasiswa WHERE EMAIL='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $_SESSION["id_mhw"] = $row["id"];
                    $sql = "SELECT * FROM users WHERE EMAIL='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $_SESSION["user_id"] = $row["id"];
                    

                }
                header("Location: ../google_register.php");
                exit();
            } else {
                // Handle error if the inserts fail
                echo "Error: " . mysqli_error($connection);
            }
        }
    }
}
?>