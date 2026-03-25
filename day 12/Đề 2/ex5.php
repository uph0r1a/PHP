<form method="post" enctype="multipart/form-data">
    <label for="name">Full name</label>
    <input type="text" name="name" id="name" minlength="6" required>

    <label for="tel">Phone number</label>
    <input type="text" name="tel" id="tel" required>

    <label for="image">Profile pic</label>
    <input type="file" name="image" id="image" required>

    <button type="submit">Submit</button>
</form>

<?php
$valid = true;
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim(htmlspecialchars($_POST["name"]));
    $tel = trim($_POST["tel"]);

    if (strlen($name) < 6 && strlen($tel) < 10 && (str_starts_with($tel, "09") || str_starts_with($tel, "08") || str_starts_with($tel, "03") || str_starts_with($tel, "07"))) {
        $valid = false;
        $message .= "Invalid name or phone number\n";
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

    if ($_FILES["pic"]["size"] > 3 * 1024 * 1024) {
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
            $uploadedFile = "profiles/" . $fileName;
            $message .= "<p style='color:green'>Uploaded photo: $fileName</p><br><img src='$uploadedFile'>";
        } else {
            $message .= "<p style='color:red'>Error uploading file</p>";
        }
    }
}
?>