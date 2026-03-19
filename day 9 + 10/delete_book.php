<?php
require_once "connectDB.php";

$id = intval($_GET["id"]);
mysqli_query($conn, "DELETE FROM books WHERE id = $id");
header("Location: books.php");
mysqli_close($conn);
