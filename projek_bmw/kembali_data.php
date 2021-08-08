<?php 
session_start();
$_SESSION['keyword'] = '';
// session_unset();
// session_destroy();
header("Location: utama.php");


?>