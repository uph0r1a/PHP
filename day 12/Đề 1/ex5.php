<?php
$message = "";
$uploadedFile = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valid = true;
    $name = trim(htmlspecialchars($_POST["name"]));
    $email = trim($_POST["email"]);

    if (strlen($name) < 5) {
        $message .= "<p style='color:red'>Name must be at least 5 characters</p>";
        $valid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= "<p style='color:red'>Invalid email format</p>";
        $valid = false;
    }

    $targetDir = __DIR__ . "/uploads/";
    $fileName = basename(time() . $_FILES["pic"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["pic"]["tmp_name"]);

    if ($check === false) {
        $message .= "<p style='color:red'>File is not an image</p>";
        $valid = false;
    }

    if ($_FILES["pic"]["size"] > 2 * 1024 * 1024) {
        $message .= "<p style='color:red'>File too large (max 2MB)</p>";
        $valid = false;
    }

    $allowType = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowType)) {
        $message .= "<p style='color:red'>Only JPG, JPEG, PNG allowed</p>";
        $valid = false;
    }

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($valid) {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath)) {
            $message .= "<p style='color:green'>Profile uploaded successfully!</p>";
            $uploadedFile = "uploads/" . $fileName;
        } else {
            $message .= "<p style='color:red'>Error uploading file</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input {
            width: 95%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .message {
            margin-bottom: 20px;
        }

        .uploaded-image {
            margin-top: 20px;
            max-width: 200px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <h1>Upload Profile</h1>
    <div class="message"><?= $message ?></div>

    <form method="post" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" minlength="5" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="pic">Profile Picture</label>
        <input type="file" name="pic" id="pic" required>

        <button type="submit">Upload Profile</button>
    </form>

    <?php if ($uploadedFile): ?>
        <h2>Uploaded Image:</h2>
        <img src="<?= $uploadedFile ?>" alt="Profile Picture" class="uploaded-image">
    <?php endif; ?>
</body>

</html>