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

    mysqli_query($conn, "UPDATE books 
                        SET title = '$title', author = '$author', price = '$price', stock = '$stock', description = '$description'
                        WHERE id = $id");

    header("Location: books.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<h2>Sửa sách</h2>

<form method="post">
    <label for="title">Tên sách</label>
    <input type="text" name="title" id="title" value="<?= $book["title"] ?>" required>

    <label for="author">Tên tác giả</label>
    <input type="text" name="author" id="author" value="<?= $book["author"] ?>" required>

    <label for="price">Giá</label>
    <input type="number" name="price" id="price" value="<?= $book["price"] ?>" min="0" required>

    <label for="stock">Số lượng</label>
    <input type="number" name="stock" id="stock" value="<?= $book["stock"] ?>" min="0" required>

    <label for="description">Chi tiết</label>
    <textarea name="description" id="description" required><?= $book["description"] ?></textarea>

    <button type="submit">Sửa sách</button>
</form>

<?php mysqli_close($conn); ?>