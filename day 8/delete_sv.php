<?php require_once "connectDB.php";

$id = intval($_GET["id"]);
mysqli_query($conn, "DELETE FROM SINH_VIEN WHERE id = $id");
header("Location: sinhVien.php");
mysqli_close($conn);
