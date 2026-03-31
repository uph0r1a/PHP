<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(htmlspecialchars($_POST["name"]));
    $email = $_POST["email"];

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Thank you for your submission')</script>";
    } else {
        echo "<script>alert('Invalid info')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #6c8cff;
            box-shadow: 0 0 5px rgba(108, 140, 255, 0.5);
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #6c8cff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #4a6cf7;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Submit</button>
    </form>
</body>

</html>