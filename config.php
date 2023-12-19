<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '109139727139-4mfdl718t2edg4tg93387s5h2ch0l82i.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:8080/project5/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "123456";
$database = "akadsi";

$conn = mysqli_connect($hostname, $username, $password, $database);