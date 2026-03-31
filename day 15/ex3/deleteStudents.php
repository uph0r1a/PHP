<?php require_once "connectDB.php";

$id = intval($_GET["id"]);
mysqli_query($conn, "DELETE FROM students WHERE id = $id");
header("Location: student.php");
mysqli_close($conn);
