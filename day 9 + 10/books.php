<?php
session_start();
include 'connectDB.php';

$result = mysqli_query($conn, "SELECT * FROM books WHERE stock > 0");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    $stmt = mysqli_prepare($conn, "SELECT id, title, price, stock FROM books WHERE id = ? AND stock >= ?");
    mysqli_stmt_bind_param($stmt, "ii", $book_id, $quantity);
    mysqli_stmt_execute($stmt);
    $book = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if ($book) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$book_id] = [
                'title' => $book['title'],
                'price' => $book['price'],
                'quantity' => $quantity
            ];
        }
        echo "<div class='alert alert-success'>Đã thêm sách vào giỏ hàng!</div>";
    } else {
        echo "<div class='alert alert-danger'>Sách không tồn tại hoặc không đủ hàng!</div>";
    }
}

include 'header.php';
?>

<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding-left: 70px;
        padding-bottom: 20px;
    }

    .col-md-4 {
        width: 30%;
    }

    .book-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .book-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 10px;
        display: block;
    }

    .book-card h5 {
        margin-top: 0;
        color: #333;
    }

    .book-card p {
        margin: 5px 0;
        padding-top: 10px;
    }

    .input-group {
        display: flex;
        gap: 10px;
    }

    .form-control {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<h2 style="padding-left: 70px;">Danh sách sách (<a href="add_book.php">Thêm</a>)</h2>
<div class="row">
    <?php while ($book = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-4">
            <div class="book-card">
                <h1><?= htmlspecialchars($book['title']); ?></h1>
                <img src="<?= $book['image'] ?>" alt="<?= htmlspecialchars($book['title']); ?> image">
                <p><strong>Tác giả:</strong> <?= htmlspecialchars($book['author']); ?></p>
                <p><strong>Giá:</strong> <?= number_format($book['price'], 0); ?> VNĐ</p>
                <p><strong>Tồn kho:</strong> <?= $book['stock']; ?></p>
                <p><?= htmlspecialchars($book['description']); ?></p>
                <form method="POST" style="padding-top: 10px;">
                    <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                    <div class="input-group mb-2">
                        <input type="number" name="quantity" value="1" min="1" max="<?= $book['stock']; ?>"
                            class="form-control" style="max-width: 80px;">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ</button>
                    </div>
                </form>

                <a href="edit_book.php?id=<?= $book["id"] ?>">Sửa</a>
                <a href="delete_book.php?id=<?= $book["id"] ?>" onclick="return confirm('Xóa quyển sách này')">Xóa</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>