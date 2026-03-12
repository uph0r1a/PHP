<?php require "Person.php";
$person = null;
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $name = htmlspecialchars($_POST["name"]);
        $age = intval($_POST["age"]);
        $email = htmlspecialchars($_POST["email"]);

        if (empty($name) || empty($email) || $age <= 0) {
            throw new Exception("Vui long nhap chinh xac thong tin");
        }

        $person = new Person($name, $age, $email);
        $sinhVien = [
            "name" => $name,
            "age" => $age,
            "email" => $email
        ];

        setcookie("sinhVien", json_encode($sinhVien), time() + (86400 * 7), "/");

        $message = "Thong tin duoc luu thanh cong";
    } catch (Exception $e) {
        $message = "Loi " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quan ly thong tin ca nhan</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }

        .container {
            width: 450px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        button {
            padding: 10px 15px;
            border: none;
            background: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background: #0056b3;
        }

        .message {
            text-align: center;
            font-weight: bold;
        }

        .info {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Nhap thong tin ca nhan</h1>
        <form method="post">
            <label>Ho va ten</label><br>
            <input type="text" name="name" value="<?= isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ?>" required>

            <br><br>

            <label>Tuoi</label><br>
            <input type="number" name="age" value="<?= isset($_POST["age"]) ? htmlspecialchars($_POST["age"]) : "" ?>" required>

            <br><br>

            <label>Email</label><br>
            <input type="email" name="email" value="<?= isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "" ?>" required>

            <br><br>

            <button type="submit">Luu thong tin</button>
            <button><a href="viewSV.php">Xem thong tin</a></button>
        </form>

        <hr>
        <p class="message" style="color: <?= strpos($message, "Loi") !== false ? "red" : "green"; ?>;">
            <?= htmlspecialchars($message) ?>
        </p>
        <?php if ($person): ?>
            <div class="info">
                <h2>Thong tin da nhap</h2>
                <p><strong>Ho va ten:</strong> <?= htmlspecialchars($person->getName()) ?></p>
                <p><strong>Tuoi:</strong> <?= htmlspecialchars($person->getAge()) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($person->getEmail()) ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>