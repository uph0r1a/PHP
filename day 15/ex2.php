<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        li {
            background: #fff;
            margin: 5px 0;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: 0.2s;
        }

        li:hover {
            background: #e8f0fe;
            transform: translateX(5px);
        }

        .price {
            font-weight: bold;
            color: #2a7ae2;
        }
    </style>
</head>

<body>

    <?php
    $fruit = ["a", "b", "c", "d", "e"];
    ?>

    <h2>Fruits</h2>
    <ul>
        <?php foreach ($fruit as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    $prices = [
        'apple' => 1.00,
        'banana' => 0.50,
        'cherry' => 2.00
    ];
    ?>

    <h2>Prices</h2>
    <ul>
        <?php foreach ($prices as $key => $value): ?>
            <li><?= $key ?>: <span class="price">$<?= number_format($value, 2) ?></span></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>