<?php
require_once "connectDB.php";

$id = intval($_GET["id"]);
$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
$book = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $description = $_POST["description"];

    $imagePath = $book["image"];

    if (!empty($_FILES["book_image"]["name"])) {
        $targetDir = __DIR__ . "/uploads/";
        $fileName = basename($_FILES["book_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $relativePath = "uploads/" . $fileName;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["book_image"]["tmp_name"]);
        if ($check === false) {
            echo "File không phải là hình ảnh.<br>";
            $uploadOk = 0;
        }

        if (file_exists($targetFilePath)) {
            echo "File đã tồn tại.<br>";
            $uploadOk = 0;
        }

        if ($_FILES["book_image"]["size"] > 2 * 1024 * 1024) {
            echo "File quá lớn (tối đa 2MB).<br>";
            $uploadOk = 0;
        }

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "Chỉ cho phép JPG, JPEG, PNG, GIF.<br>";
            $uploadOk = 0;
        }

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $targetFilePath)) {
                $imagePath = $relativePath;

                if (file_exists(__DIR__ . "/" . $book["image"])) {
                    unlink(__DIR__ . "/" . $book["image"]);
                }
            } else {
                echo "Lỗi upload file.<br>";
            }
        }
    }

    $sql = "UPDATE books 
            SET title='$title', author='$author', price='$price', stock='$stock', 
                description='$description', image='$imagePath'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: books.php");
    exit;
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
        width: 420px;
        margin: 30px auto;
        padding: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
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
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
        transition: 0.2s;
    }

    input:focus,
    textarea:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: 0 0 4px rgba(76, 175, 80, 0.4);
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    p {
        margin-top: 15px;
        font-weight: bold;
        color: #444;
    }

    img {
        display: block;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    button {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        background: #2196F3;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #1976D2;
    }

    a.back:hover {
        color: #000;
    }
</style>

<h2>Sửa sách</h2>

<form method="post" enctype="multipart/form-data">
    <label>Tên sách</label>
    <input type="text" name="title" value="<?= $book["title"] ?>" required>

    <label>Tác giả</label>
    <input type="text" name="author" value="<?= $book["author"] ?>" required>

    <label>Giá</label>
    <input type="number" name="price" value="<?= $book["price"] ?>" min="0" required>

    <label>Số lượng</label>
    <input type="number" name="stock" value="<?= $book["stock"] ?>" min="0" required>

    <label>Mô tả</label>
    <textarea name="description" required><?= $book["description"] ?></textarea>

    <p>Ảnh hiện tại:</p>
    <img src="<?= $book["image"] ?>" width="150"><br><br>

    <label>Chọn ảnh mới (nếu muốn thay)</label>
    <input type="file" name="book_image">

    <button type="submit">Cập nhật</button>
</form>

<?php mysqli_close($conn); ?>