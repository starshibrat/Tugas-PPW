<?php 
session_start();
$_SESSION['id'] = -1;
$_SESSION['NIM'] = -1;

if ($_SESSION['is_admin'] == true){
    $_SESSION['is_admin'] = false;
}

header("Location: ../index.php");

?>