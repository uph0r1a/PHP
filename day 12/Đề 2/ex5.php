<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
    }

    .container {
        width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="file"] {
        padding: 5px;
    }

    button {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    .message {
        margin-top: 15px;
    }

    img {
        margin-top: 10px;
        border-radius: 5px;
    }
</style>

<form method="post" enctype="multipart/form-data">
    <label for="name">Full name</label>
    <input type="text" name="name" id="name" minlength="6" required>

    <label for="tel">Phone number</label>
    <input type="text" name="tel" id="tel" required>

    <label for="image">Profile pic</label>
    <input type="file" name="image" id="image" required>

    <button type="submit">Submit Profile</button>
</form>

<?php
$valid = true;
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $tel = trim($_POST["tel"]);

    if (strlen($name) < 6) {
        $valid = false;
        $message .= "<p style='color:red'>Full name must be at least 6 characters</p>";
    }

    if (!preg_match('/^(09|08|03|07)[0-9]{8}$/', $tel)) {
        $valid = false;
        $message .= "<p style='color:red'>Invalid phone number</p>";
    }

    $targetDir = __DIR__ . "/profiles/";
    $fileName = basename(time() . "_" . $_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check === false) {
        $message .= "<p style='color:red'>File is not an image</p>";
        $valid = false;
    }

    if ($_FILES["image"]["size"] > 3 * 1024 * 1024) {
        $message .= "<p style='color:red'>File too large (max 3MB)</p>";
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
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $uploadedFile = "profiles/" . $fileName;

            $safeName = htmlspecialchars($name);
            $safeTel = htmlspecialchars($tel);

            $message .= "<p style='color:green'>Profile submitted successfully!</p>";
            $message .= "<p>Full Name: $safeName</p>";
            $message .= "<p>Phone: $safeTel</p>";
            $message .= "<p>Uploaded photo: $fileName</p>";
            $message .= "<br><img src='$uploadedFile' width='200'>";
        } else {
            $message .= "<p style='color:red'>Error uploading file</p>";
        }
    }

    echo $message;
}
?>