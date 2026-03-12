<?php session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password == $confirm) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header("Location: login.php");
    } else {
        $error = "Password not match!";
    }
}
?>

<style>
    body {
        font-family: Arial;
        background: #f2f4f7;
    }

    .container {
        width: 350px;
        margin: 100px auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
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

    .error {
        color: red;
        text-align: center;
    }
</style>

<div class="container">
    <h2>Register form</h2>
    <form method="post">
        Username:<br>
        <input type="text" name="username"><br><br>

        Email:<br>
        <input type="email" name="email"><br><br>

        Password:<br>
        <input type="password" name="password"><br><br>

        Confirm Password:<br>
        <input type="password" name="confirm"><br><br>

        <button name="register">Register</button>
    </form>

    <?php if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
</div>