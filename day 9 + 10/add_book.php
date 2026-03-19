<?php
require_once "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $description = $_POST["description"];

    $targetDir = __DIR__ . "/uploads/";
    $fileName = basename($_FILES["book_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $relativePath = "uploads/" . $fileName;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["book_image"]["tmp_name"]);
    if ($check === false) {
        echo "File khong phai la hinh anh.<br>";
        $uploadOk = 0;
    }

    if (file_exists($targetFilePath)) {
        echo "File da ton tai.<br>";
        $uploadOk = 0;
    }

    if ($_FILES["book_image"]["size"] > 2 * 1024 * 1024) {
        echo "File qua lon (toi da 2MB).<br>";
        $uploadOk = 0;
    }

    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Chi cho phep JPG, JPEG, PNG, GIF.<br>";
        $uploadOk = 0;
    }

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO books (title, author, price, stock, description, image)
                    VALUES ('$title', '$author', '$price', '$stock', '$description', '$relativePath')";

            if (mysqli_query($conn, $sql)) {
                echo "Them sach thanh cong!<br>";
                echo "<a href='books.php'>Xem danh sach sach</a>";
            } else {
                echo "Loi DB: " . mysqli_error($conn);
            }
        } else {
            echo "Loi upload file.";
        }
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        color: #333;
    }

    form {
        width: 400px;
        margin: 30px auto;
        padding: 25px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    button {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #45a049;
    }

    img {
        margin-top: 15px;
        border-radius: 8px;
        display: block;
    }

    a {
        display: inline-block;
        margin-top: 10px;
        color: #2196F3;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<h2>Thêm sách</h2>

<form method="post" enctype="multipart/form-data">
    <label>Tên sách</label>
    <input type="text" name="title" required>

    <label>Tác giả</label>
    <input type="text" name="author" required>

    <label>Giá</label>
    <input type="number" name="price" required min="0">

    <label>Số lượng</label>
    <input type="number" name="stock" required min="0">

    <label>Mô tả</label>
    <textarea name="description" required></textarea>

    <label>Ảnh bìa</label>
    <input type="file" name="book_image" required>

    <button type="submit">Thêm sách</button>
</form>

<?php mysqli_close($conn); ?>