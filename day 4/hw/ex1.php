<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #e6e6e6;
            padding: 30px;
            width: 350px;
            border-radius: 6px;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 8px 18px;
            border: 1px solid #aaa;
            border-radius: 4px;
            background: #f5f5f5;
            cursor: pointer;
        }

        button:hover {
            background: #ddd;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: #2a7ae2;
            text-decoration: none;
        }
    </style>

</head>

<body>

    <?php
    $Employee = [
        "NguyenVan_An" => "abc123",
        "Tran_Thi_Bích" => "B715",
        "Le_Van_Cuong" => "C_lo_vo_92",
        "Pham_Thi_Dung" => "De_PT_68",
        "Doan_Van_Em" => "E_v58"
    ];

    function login($username, $password)
    {
        global $Employee;
        return isset($Employee[$username]) && $Employee[$username] === $password;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (login($_POST["username"], $_POST["password"])) {
            echo "<script>alert('Login successful')</script>";
        } else {
            echo "<script>alert('Login failed')</script>";
        }
    }
    ?>

    <div class="container">
        <h1>Login form</h1>

        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Enter Username">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter password">

            <button type="submit">Login</button>

            <p>Click here to <a href="#">Register</a></p>
        </form>
    </div>

</body>

</html>