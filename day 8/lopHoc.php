<?php require 'connectDB.php';

$query = "SELECT * FROM LOP_HOC";
$result = mysqli_query($conn, $query);
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        padding: 40px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        padding: 6px 12px;
        background: #3498db;
        color: white;
        border-radius: 4px;
        font-size: 14px;
    }

    a:hover {
        background: #2980b9;
    }

    a.delete {
        background: #e74c3c;
    }

    a.delete:hover {
        background: #c0392b;
    }

    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th {
        background: #2c3e50;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .add-btn {
        display: block;
        width: 150px;
        margin: 0 auto 20px auto;
        text-align: center;
    }
</style>

<h2>Danh sach lop hoc</h2>

<a class="add-btn" href="add_lop.php">Them lop hoc</a>

<table>
    <tr>
        <th>ID</th>
        <th>Ten lop</th>
        <th>Trang thai</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["status"] ? "Hoat dong" : "Khong hoat dong" ?></td>

            <td>
                <a href="edit_lop.php?id=<?= $row["id"] ?>">Sua</a>
                <a class="delete" href="delete_lop.php?id=<?= $row["id"] ?>" onclick="return confirm('Xoa lop hoc nay?')">Xoa</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php mysqli_close($conn); ?>