<?php
session_start();

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

<?php
if (isset($error)) {
    echo "<p style='color:red'>$error</p>";
}
?>