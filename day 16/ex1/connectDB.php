<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "Appointment";

$conn = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Failed connection" . mysqli_connect_error());
}
