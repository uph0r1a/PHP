<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f2f2f2;
            padding: 30px;
        }

        table {
            width: 100%;
            max-width: 900px;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
        }

        thead {
            background: #e6e6e6;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            font-weight: bold;
            color: #333;
        }

        td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        tbody tr:nth-child(even) {
            background: #fafafa;
        }

        tbody tr:hover {
            background: #f1f1f1;
        }

        .total-row {
            background: #f5f5f5;
            font-weight: bold;
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $sumQuantity = 0;
    $sumPrice = 0;
    $products = [
        [
            "id" => "1",
            "name" => "Rau cu sach 1",
            "image" => "image.png",
            "price" => "150000",
            "quantity" => "2",
        ],
        [
            "id" => "2",
            "name" => "Rau cu sach 2",
            "image" => "image.png",
            "price" => "180000",
            "quantity" => "3",
        ],
        [
            "id" => "3",
            "name" => "Rau cu sach 3",
            "image" => "image.png",
            "price" => "100000",
            "quantity" => "5",
        ],
        [
            "id" => "4",
            "name" => "Rau cu sach 4",
            "image" => "image.png",
            "price" => "120000",
            "quantity" => "9",
        ]
    ]
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $value) { ?>
                <tr>
                    <td><?php echo $value["id"] ?></td>
                    <td><img src="image/<?php echo $value["image"] ?>" alt="" srcset=""></td>
                    <td><?php echo $value["name"] ?></td>
                    <td><?php echo number_format($value["price"]) ?> d</td>
                    <td><?php echo $value["quantity"] ?></td>
                    <td><?php echo number_format($value["price"] * $value["quantity"]) ?> d</td>
                    <?php
                    $sumQuantity += $value["quantity"];
                    $sumPrice += $value["price"] * $value["quantity"];
                    ?>
                </tr>
            <?php } ?>
            <tr class="total-row">
                <td colspan="4"></td>
                <td>Total quantity</td>
                <td><?php echo $sumQuantity ?></td>
            </tr>
            <tr class="total-row total-price">
                <td colspan="4"></td>
                <td>Total price</td>
                <td><?php echo number_format($sumPrice) ?> d</td>
            </tr>
        </tbody>
    </table>
</body>

</html>