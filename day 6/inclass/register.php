<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        $user = [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "created_time" => time()
        ];

        setcookie("user", json_encode($user), time() + (86400 * 7), "/");

        echo "<p style='color:green'>Dang ky thanh cong. <a href='login.php'>Dang nhap</a></p>";
    } else {
        echo "<p style='color:red'>Vui long nhap day du thong tin</p>";
    }
}
?>

<h2>Dang ky tai khoan</h2>

<form method="post">

    Ten dang nhap <br>
    <input type="text" name="username" required>
    <br><br>

    Mat khau <br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Dang ky</button>

</form>