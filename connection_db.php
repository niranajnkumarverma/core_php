<?php 

$server = "localhost";
$user = "root";
$pass = "sms@123";
$database = "login_register_pure_coding";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>