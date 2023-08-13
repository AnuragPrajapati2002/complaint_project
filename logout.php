<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");

$_SESSION = [];
session_unset();
session_destroy();
header("Location:main page.php");
?>

