<?php
session_start();
include 'connectDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $book_id => $quantity) {
        $quantity = (int)$quantity;
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$book_id]);
        } else {
            $stmt = mysqli_prepare($conn, "SELECT stock FROM books WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $book_id);
            mysqli_stmt_execute($stmt);
            $stock = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["stock"];
            if ($quantity <= $stock) {
                $_SESSION['cart'][$book_id]['quantity'] = $quantity;
            } else {
                echo "<div class='alert alert-danger'>Số lượng vượt quá tồn kho cho sách ID $book_id!</div>";
            }
        }
    }
}

if (isset($_GET['remove'])) {
    $book_id = $_GET['remove'];
    unset($_SESSION['cart'][$book_id]);
    header("Location: cart.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];

    if (empty($customer_name) || empty($customer_email)) {
        echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin!</div>";
    } elseif (empty($_SESSION['cart'])) {
        echo "<div class='alert alert-danger'>Giỏ hàng trống!</div>";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO orders (customer_name, customer_email) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $customer_name, $customer_email);
        mysqli_stmt_execute($stmt);
        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION['cart'] as $book_id => $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];

            $stmt = mysqli_prepare($conn, "SELECT stock FROM books WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $book_id);
            mysqli_stmt_execute($stmt);
            $stock = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["stock"];

            if ($quantity <= $stock) {
                $stmt = mysqli_prepare($conn, "INSERT INTO order_details (order_id, book_id, quantity, price) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "iiid", $order_id, $book_id, $quantity, $price);
                mysqli_stmt_execute($stmt);

                $stmt = mysqli_prepare($conn, "UPDATE books SET stock = stock - ? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "ii", $quantity, $book_id);
                mysqli_stmt_execute($stmt);
            } else {
                echo "<div class='alert alert-danger'>Sách {$item['title']} không đủ hàng!</div>";
            }
        }

        $_SESSION['cart'] = [];
        echo "<div class='alert alert-success'>Đặt hàng thành công! <a href='order.php'>Xem đơn hàng</a></div>";
    }
}

include 'header.php';
?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .cart-table th,
    .cart-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .cart-table th {
        background: #f2f2f2;
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
        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #007bff;
        color: white;
        padding-top: 10px;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .btn-success {
        background: #28a745;
        color: white;
    }

    .btn-success:hover {
        background: #1e7e34;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background: #a71d2a;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }

    .alert {
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
    }

    .text-end {
        text-align: right;
    }

    .mt-3 {
        margin-top: 15px;
    }

    .mt-4 {
        margin-top: 25px;
    }

    .mb-3 {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
    }
</style>
<div style="padding-left: 70px; padding-right: 70px;">
    <h2>Giỏ hàng</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Giỏ hàng của bạn đang trống.</p>
    <?php else: ?>
        <form method="POST">
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th>Sách</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $book_id => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td><?php echo number_format($item['price'], 0); ?> VNĐ</td>
                            <td>
                                <input type="number" name="quantity[<?php echo $book_id; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="form-control" style="width: 80px;">
                            </td>
                            <td><?php echo number_format($subtotal, 0); ?> VNĐ</td>
                            <td>
                                <a href="?remove=<?php echo $book_id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sách này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><?php echo number_format($total, 0); ?> VNĐ</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="update_cart" class="btn btn-primary">Cập nhật giỏ hàng</button>
        </form>

        <h3 class="mt-4">Thông tin thanh toán</h3>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="customer_email" class="form-control" required>
            </div>
            <button type="submit" name="checkout" class="btn btn-success">Thanh toán</button>
        </form>
    <?php endif; ?>
</div>


<?php include 'footer.php'; ?>