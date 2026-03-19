<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "Customer";

$conn = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    die("Ket noi that bai" . mysqli_connect_error());
}
