<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        $user = [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "created_time" => time()
        ];

        setcookie("user", json_encode($user), time() + (86400 * 7), "/");

        echo "<p class='success'>Dang ky thanh cong. <a href='login.php'>Dang nhap</a></p>";
    } else {
        echo "<p class='error'>Vui long nhap day du thong tin</p>";
    }
}
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

    input {
        width: 100%;
        padding: 10px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #28a745;
        color: white;
        border: none;
    }

    button:hover {
        background: #1e7e34;
    }

    .success {
        color: green;
    }

    .error {
        color: red;
    }
</style>

<div class="container">
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
</div>