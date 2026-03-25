<?php
$vietnamRivers = ["Red River", "Mekong River", "Red River1", "Mekong River1", "Red River2", "Mekong River2"];
$i = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        ul {
            background: #ffffff;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
        }

        ul li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        ul li:last-child {
            border-bottom: none;
        }

        dl {
            margin-top: 30px;
            background: #ffffff;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        dt {
            font-weight: bold;
            color: #2c3e50;
            margin-top: 10px;
        }

        dd {
            margin-left: 0;
            margin-bottom: 10px;
            color: #27ae60;
        }
    </style>
</head>

<body>

    <ul>
        <?php while ($i < sizeof($vietnamRivers)): ?>
            <li><?= $vietnamRivers[$i] ?></li>
        <?php $i++;
        endwhile; ?>
    </ul>

    <?php
    $exchange2025 = [
        'USD' => 25200,
        'EUR' => 27200,
        'SGD' => 18800,
        'AUD' => 16800
    ];
    ?>

    <dl>
        <?php foreach ($exchange2025 as $key => $value): ?>
            <dt><?= $key ?></dt>
            <dd><?= $value + $value * 0.035 ?> VND</dd>
        <?php endforeach; ?>
    </dl>

</body>

</html>