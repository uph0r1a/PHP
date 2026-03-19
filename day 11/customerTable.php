<?php
require "connectDB.php";

$query = "SELECT * FROM Customers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <style>
        /* General page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        thead {
            background-color: #007BFF;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0f0ff;
        }

        th {
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Customer List</h1>
    <table>
        <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row["customerName"] ?></td>
                    <td><?= $row["customerAddress"] ?></td>
                    <td><?= $row["customerTel"] ?></td>
                    <td><?= $row["customerEmail"] ?></td>
                    <td><?= $row["customerGender"] == "M" ? "Male" : "Female" ?></td>
                    <td><a href="send_mail.php?id=<?= $row["id"] ?>">Gửi mail</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>