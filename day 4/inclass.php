<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            margin-bottom: 25px;
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 10px;
        }

        input[type="text"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 250px;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.4);
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button[type="submit"] {
            background-color: #6c63ff;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #574fd6;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
        }

        button[type="reset"]:hover {
            background-color: #d73833;
        }

        table {
            width: 600px;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        thead {
            background-color: #6c63ff;
            color: white;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            font-size: 16px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0e7ff;
            transition: 0.2s;
        }

        td {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php
    $students = [
        "Nguyen Van A" => 85,
        "Tran Thi Bich" => 75,
        "Le Van Cuong" => 92,
        "Pham Thi Dung" => 68,
        "Doan Van Em" => 58,
    ];

    function searchStudent($students, $keyword)
    {
        $result = [];
        $keyword = strtolower(trim($keyword));

        if ($keyword === '') {
            return $students;
        }

        foreach ($students as $name => $score) {
            if (strpos(strtolower($name), $keyword) !== false) {
                $result[$name] = $score;
            }
        }

        return $result;
    }

    $search_result = $students;
    $keyword = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $keyword = trim($_POST['search']);
        $search_result = searchStudent($students, $keyword);
    }
    ?>

    <h1>Danh sach Sinh vien</h1>
    <form method="post">
        <input type="text" name="search" id="search" placeholder="Nhap ten sinh vien de tim kiem" value="<?php $keyword ?>">
        <button type="submit">Tim kiem</button>
        <button type="reset">Hien thi tat ca</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Ten sinh vien</th>
                <th>Diem so</th>
                <th>Xep loai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($search_result as $key => $value) { ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <td><?php echo $value ?></td>
                    <td><?php echo $value >= 80 ? "Gioi" : ($value >= 70 ? "Kha" : "Trung binh") ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>