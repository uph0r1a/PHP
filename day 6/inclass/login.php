<?php session_start();

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

            $message = "<p class='success'>Dang nhap thanh cong</p>";
        } else {
            $message = "<p class='error'>Sai ten dang nhap hoac mat khau</p>";
        }
    } else {
        $message = "<p class='error'>Chua co tai khoan. Hay dang ky</p>";
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
        margin-top: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    .success {
        color: green;
    }

    .error {
        color: red;
    }

    .center {
        text-align: center;
    }
</style>

<div class="container">
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

    <div class="center">
        <a href="register.php">Dang ky</a>
    </div>
</div>