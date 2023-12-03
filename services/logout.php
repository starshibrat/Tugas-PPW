<?php 
session_start();
$_SESSION['id'] = -1;
$_SESSION['NIM'] = -1;
header("Location: ../index.php");

?>