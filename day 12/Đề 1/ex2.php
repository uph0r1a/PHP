<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>City and Student Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        ul {
            list-style-type: square;
            padding-left: 20px;
            margin-bottom: 30px;
        }

        ul li {
            padding: 5px 0;
            color: #333;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1e7ff;
        }
    </style>
</head>

<body>

    <?php
    $city = ["Hanoi", "Ho Chi Minh City", "Da Nang", "Hai Duong", "Ca Mau"];
    ?>

    <h2>City List</h2>
    <ul>
        <?php foreach ($city as $key => $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    $scores = [
        'Math'     => 8.5,
        'Physics'  => 7.0,
        'English'  => 9.2,
        'History'  => 6.8
    ];
    ?>

    <h2>Updated Scores</h2>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>New Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($scores as $key => $value): ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value > 9.5 ? 10 : $value + 0.5 ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    $students = [
        [
            'id' => 'SV001',
            'name' => 'Nguyen Van A',
            'age' => 20,
            'grade' => 8.5
        ],
        [
            'id' => 'SV002',
            'name' => 'Nguyen Van B',
            'age' => 21,
            'grade' => 9.5
        ],
        [
            'id' => 'SV003',
            'name' => 'Nguyen Van C',
            'age' => 22,
            'grade' => 10
        ],
        [
            'id' => 'SV004',
            'name' => 'Nguyen Van D',
            'age' => 23,
            'grade' => 7.5
        ],
    ];
    ?>

    <h2>Student List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($students as $key => $value): ?>
                <tr>
                    <td><?= $value["id"] ?></td>
                    <td><?= $value["name"] ?></td>
                    <td><?= $value["age"] ?></td>
                    <td><?= $value["grade"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>