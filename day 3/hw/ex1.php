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
            background: #f5f5f5;
            padding: 30px;
        }

        .product-list {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .product-card {
            width: 250px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 6px;
        }

        .product-card h3 {
            margin: 15px 0 10px;
            font-size: 18px;
            color: #333;
        }

        .old-price {
            color: #888;
            text-decoration: line-through;
            font-size: 14px;
            margin: 5px 0;
        }

        .price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            margin: 3px;
            color: white;
        }

        .btn-view {
            background: #3498db;
        }

        .btn-cart {
            background: #e74c3c;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <?php
    $products = [
        [
            "name" => "Ray cu sach",
            "image" => "image.png",
            "price" => "150,000d",
            "sale_price" => "150,000d"
        ],
        [
            "name" => "Ray cu sach",
            "image" => "image.png",
            "price" => "180,000d",
            "sale_price" => "180,000d"
        ],
        [
            "name" => "Ray cu sach",
            "image" => "image.png",
            "price" => "100,000d",
            "sale_price" => "0"
        ],
        [
            "name" => "Ray cu sach",
            "image" => "image.png",
            "price" => "120,000d",
            "sale_price" => "120,000d"
        ],
    ];
    ?>

    <div class="product-list">
        <?php foreach ($products as $key => $value) { ?>
            <div class="product-card">
                <img src="image/<?php echo $value["image"] ?>">
                <h3><?php echo $value["name"] ?></h3>

                <?php if ($value["sale_price"] != 0) { ?>
                    <p class="old-price">Old: <?php echo $value["price"] ?></p>
                    <p class="price">Price: <?php echo $value["sale_price"] ?></p>
                <?php } else { ?>
                    <p class="price">Price: <?php echo $value["price"] ?></p>
                <?php } ?>

                <button class="btn btn-view">View</button>
                <button class="btn btn-cart">Add cart</button>
            </div>
        <?php } ?>
    </div>
</body>

</html>