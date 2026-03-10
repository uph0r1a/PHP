<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<h2>Thong tin Session</h2>

<table border="1" cellpadding="10">

    <tr>
        <td>Ten dang nhap</td>
        <td><?= htmlspecialchars($user["username"]) ?></td>
    </tr>

    <tr>
        <td>Thoi gian dang nhap</td>
        <td><?= $user["login_time"] ?></td>
    </tr>

</table>

<br>

<a href="search.php">Tim kiem user</a>
<br><br>