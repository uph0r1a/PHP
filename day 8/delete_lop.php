<?php require_once "connectDB.php";
$id = intval($_GET["id"]);
mysqli_query(
    $conn,
    "DELETE FROM LOP_HOC WHERE id=$id"
);

header("Location: lopHoc.php");
mysqli_close($conn);
