<?php require 'connectDB.php';

$query = "SELECT SINH_VIEN.*, LOP_HOC.name AS ten_lop
          FROM SINH_VIEN
          JOIN LOP_HOC ON SINH_VIEN.lop_hoc_id = LOP_HOC.id";
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

    table {
        width: 90%;
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

    a {
        text-decoration: none;
        padding: 6px 10px;
        background: #3498db;
        color: white;
        border-radius: 4px;
        font-size: 14px;
    }

    a:hover {
        background: #2980b9;
    }

    .delete {
        background: #e74c3c;
    }

    .delete:hover {
        background: #c0392b;
    }

    .add-btn {
        display: block;
        width: 150px;
        margin: 20px auto;
        text-align: center;
    }
</style>

<h2>Danh sach sinh vien</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Ho ten</th>
        <th>Email</th>
        <th>So dien thoai</th>
        <th>Lop</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["phone"] ?></td>
            <td><?= $row["ten_lop"] ?></td>

            <td>
                <a href="edit_sv.php?id=<?= $row["id"] ?>">Sua</a>
                <a class="delete" href="delete_sv.php?id=<?= $row["id"] ?>" onclick="return confirm('Xoa sinh vien nay?')">Xoa</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<a class="add-btn" href="add_sv.php">Them sinh vien</a>