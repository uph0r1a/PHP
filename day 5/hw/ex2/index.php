<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        .container {
            width: 1200px;
            margin: auto;
            padding-bottom: 30px;
        }

        .banner img {
            width: 100%;
            display: block;
        }

        .banner .logo {
            width: 20%;
            display: block;
            margin: 0 auto;
        }

        nav {
            background: #d91c1c;
            display: flex;
            justify-content: center;
            gap: 80px;
            padding: 12px 0;
        }

        nav h3 {
            color: white;
            margin: 0;
            cursor: pointer;
            font-weight: 500;
        }

        .main {
            display: flex;
            margin-top: 15px;
        }

        .products {
            flex: 3;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .product {
            background: white;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            height: 160px;
            object-fit: contain;
        }

        .product p {
            margin: 5px 0;
        }

        .old-price {
            color: gray;
            text-decoration: line-through;
        }

        .price {
            color: red;
            font-weight: bold;
        }

        .ads {
            flex: 1;
            margin-left: 15px;
        }

        .ads img {
            width: 100%;
            margin-bottom: 15px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php include 'banner.php'; ?>
        <?php include 'navbar.php'; ?>

        <div class="main">

            <div class="products">
                <?php
                $product = include 'data/product.php';

                foreach ($product as $key => $value) { ?>

                    <div class="product">
                        <img src="images/<?php echo $key + 1 ?>.png">
                        <p><?php echo $value["name"] ?></p>
                        <p class="old-price"><?php echo $value["old_price"] ?></p>
                        <p class="price"><?php echo $value["price"] ?></p>
                    </div>

                <?php } ?>
            </div>

            <div class="ads">
                <?php include 'ad.php'; ?>
            </div>

        </div>

    </div>

</body>

</html>