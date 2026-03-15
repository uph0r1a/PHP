<?php
require_once "connectDB.php";

$book = mysqli_query($conn, "SELECT * FROM books");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $description = $_POST["description"];

    $sql = "INSERT INTO books (title,author,price,stock,description)
            VALUES ('$title','$author','$price','$stock','$description')";

    if (mysqli_query($conn, $sql)) {
        header("Location: books.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Thêm sách</h2>

<form method="post">
    <label for="title">Tên sách</label>
    <input type="text" name="title" id="title" required placeholder="Title">

    <label for="author">Tên tác giả</label>
    <input type="text" name="author" id="author" required placeholder="Author">

    <label for="price">Giá</label>
    <input type="number" name="price" id="price" required placeholder="Price" min="0">

    <label for="stock">Số lượng</label>
    <input type="number" name="stock" id="stock" required placeholder="Stock" min="0">

    <label for="description">Chi tiết</label>
    <textarea name="description" id="description" required placeholder="Description"></textarea>

    <button type="submit">Thêm sách</button>
</form>

<?php mysqli_close($conn); ?>