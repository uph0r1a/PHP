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

        $message = "Thong tin duoc luu thanh cong";
    } catch (Exception $e) {
        $message = "Loi" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly thong tin ca nhan</title>
</head>

<body>
    <h1>Nhap thong tin ca nhan</h1>
    <form method="post">
        <label for="name">Ho va ten</label><br>
        <input type="text" name="name" id="name" value="<?= isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ?>" required><br><br>

        <label for="age">Tuoi</label><br>
        <input type="number" name="age" id="age" value="<?= isset($_POST["age"]) ? htmlspecialchars($_POST["age"]) : "" ?>" required><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="<?= isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "" ?>" required><br><br>

        <button type="submit">Luu thong tin</button>
    </form>

    <hr>

    <p style="color: <?= strpos($message, "Loi") !== false ? "red" : "green"; ?>;"><?= htmlspecialchars($message) ?></p>

    <?php if ($person): ?>
        <h2>Thong tin da nhap</h2>
        <p><strong>Ho va ten: </strong><?= htmlspecialchars($person->getName()) ?></p>
        <p><strong>Tuoi: </strong><?= htmlspecialchars($person->getAge()) ?></p>
        <p><strong>Email: </strong><?= htmlspecialchars($person->getEmail()) ?></p>
    <?php endif; ?>
</body>

</html>