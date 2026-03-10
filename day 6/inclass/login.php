<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (isset($_COOKIE["user"])) {

        $savedUser = json_decode($_COOKIE["user"], true);

        if (
            $username === $savedUser["username"] &&
            password_verify($password, $savedUser["password"])
        ) {

            $_SESSION["user"] = [
                "username" => $savedUser["username"],
                "login_time" => date("Y-m-d H:i:s"),
                "logged_in" => true
            ];

            $message = "<p style='color:green'>Dang nhap thanh cong</p>";
        } else {
            $message = "<p style='color:red'>Sai ten dang nhap hoac mat khau</p>";
        }
    } else {
        $message = "<p style='color:red'>Chua co tai khoan. Hay dang ky</p>";
    }
}
?>

<h2>Dang nhap</h2>

<?= $message ?>

<form method="post">

    Ten dang nhap <br>
    <input type="text" name="username" required>
    <br><br>

    Mat khau <br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Dang nhap</button>

</form>

<br>

<a href="register.php">Dang ky</a>