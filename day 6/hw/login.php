<?php session_start();

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

<style>
    body {
        font-family: Arial;
        background: #f2f4f7;
    }

    .container {
        width: 350px;
        margin: 120px auto;
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

    .error {
        color: red;
        text-align: center;
    }

    .center {
        text-align: center;
    }
</style>

<div class="container">
    <h2>Login form</h2>
    <form method="post">
        Username:<br>
        <input type="text" name="username"><br><br>

        Password:<br>
        <input type="password" name="password"><br><br>

        <button name="login">Login</button>
    </form>

    <?php if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>

    <p class="center">Click here to <a href="register.php">Register</a></p>
</div>