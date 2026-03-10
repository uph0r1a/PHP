<?php
session_start();

if (isset($_SESSION['username_login'])) {
    header("Location: product.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        if ($username == $_SESSION['username'] && $password == $_SESSION['password']) {
            $_SESSION['username_login'] = $username;
            header("Location: product.php");
        } else {
            $error = "Wrong username or password!";
        }
    } else {
        $error = "Please register first!";
    }
}
?>

<h2>Login form</h2>

<form method="post">
    Username:<br>
    <input type="text" name="username"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    <button name="login">Login</button>
</form>

<?php
if (isset($error)) {
    echo "<p style='color:red'>$error</p>";
}
?>

<p>Click here to <a href="register.php">Register</a></p>