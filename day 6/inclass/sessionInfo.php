<?php session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<style>
    body {
        font-family: Arial;
        background: #f4f6f9;
    }

    .container {
        width: 400px;
        margin: 100px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        border: 1px solid #ddd;
        padding: 10px;
    }
</style>

<div class="container">
    <h2>Thong tin Session</h2>

    <table>
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
</div>