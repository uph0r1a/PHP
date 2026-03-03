<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }

        .product-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            padding: 30px;
        }

        .card {
            background: #fff;
            width: 250px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card h2 {
            margin: 15px 0;
        }

        .old-price {
            color: gray;
            text-decoration: line-through;
            margin: 5px 0;
        }

        .price {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }

        .buttons {
            margin-top: 10px;
        }

        button {
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            color: white;
        }

        .btn-view {
            background: #1a2aff;
        }

        .btn-cart {
            background: #ff2a00;
        }

        button:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <?php
    $acc = [
        [
            "name" => "Nguyen Duc Binh",
            "email" => "nducbinh@gmail.com",
            "tel" => "09966771508",
            "gender" => "Nam"
        ],
        [
            "name" => "Nguyen Duc Tuan",
            "email" => "nductuan@gmail.com",
            "tel" => "09966772508",
            "gender" => "Nam"
        ],
        [
            "name" => "Nguyen Duc Dung",
            "email" => "nducdung@gmail.com",
            "tel" => "09966773508",
            "gender" => "Nam"
        ],
        [
            "name" => "Nguyen Thanh Long",
            "email" => "nducanh@gmail.com",
            "tel" => "09966774508",
            "gender" => "Nam"
        ],
        [
            "name" => "Ngo Viet Anh",
            "email" => "nducminh@gmail.com",
            "tel" => "09966775508",
            "gender" => "Nam"
        ],
        [
            "name" => "Dinh Thi Van Anh",
            "email" => "camcute6@gmail.com",
            "tel" => "09966776508",
            "gender" => "Nu"
        ],
    ];
    ?>

    <button onclick="table()" style="color: white; background-color:black;">table</button>
    <button onclick="modal()" style="color: white; background-color:black;">modal</button>

    <div id="table" style="display: none;">
        <form method="POST" id="form"
            <label for="name">Name</label>
            <input type="text" name="name" id="name">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="tel">Tel</label>
            <input type="tel" name="tel" id="tel">

            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender">

            <button type="submit" name="add" style="color: white; background-color:black;">Add</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {

            $new_acc = [
                'name'       => trim($_POST['name']),
                'email'      => trim($_POST['email']),
                'tel'      => trim($_POST['tel']),
                'gender' => trim($_POST['gender'])
            ];

            array_push($acc, $new_acc);
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($acc); $i++) { ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <?php foreach ($acc[$i] as $key => $value) {
                            echo "<td>$value</td>";
                        } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    $products = [
        [
            "imgSrc" => "a.jpg",
            "title" => "Rau cu sach",
            "oldprice" => "",
            "price" => "150,000 d",
        ],
        [
            "imgSrc" => "a.jpg",
            "title" => "Rau cu sach",
            "oldprice" => "",
            "price" => "180,000 d",
        ],
        [
            "imgSrc" => "a.jpg",
            "title" => "Rau cu sach",
            "oldprice" => "180,000 d",
            "price" => "100,000 d",
        ],
        [
            "imgSrc" => "a.jpg",
            "title" => "Rau cu sach",
            "oldprice" => "120,000 d",
            "price" => "120,000 d",
        ],

    ];
    ?>

    <div id="modal" style="display: none;">
        <div class="product-container">
            <?php foreach ($products as $value) { ?>
                <div class="card">
                    <img src="<?= $value["imgSrc"]; ?>" alt="<?= $value["title"]; ?>">

                    <h2><?= $value["title"]; ?></h2>

                    <?php if (!empty($value["oldprice"])) { ?>
                        <h3 class="old-price">Old: <?= $value["oldprice"]; ?></h3>
                    <?php } ?>

                    <h3 class="price">Price: <?= $value["price"]; ?></h3>

                    <div class="buttons">
                        <button class="btn-view">View</button>
                        <button class="btn-cart">Add cart</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function table() {
            document.getElementById("table").style.display = "inline"
            document.getElementById("modal").style.display = "none"
        }

        function modal() {
            document.getElementById("modal").style.display = "inline"
            document.getElementById("table").style.display = "none"
        }
    </script>

</body>

</html>