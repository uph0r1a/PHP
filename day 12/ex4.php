<?php
session_start();

class Product
{
    private $code, $name, $price, $stock;

    public function __construct($code, $name, $price, $stock)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function isInStock()
    {
        return $this->stock > 0;
    }
    public function getInfo()
    {
        return "Code: {$this->code} - Name: {$this->name} - Price: {$this->price} VND - Stock: {$this->stock}";
    }
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $code = $_POST["code"];
        $name = trim(htmlspecialchars($_POST["name"]));
        $price = intval($_POST["price"]);
        $stock = intval($_POST["stock"]);
        if (empty($code) || empty($name) || $price <= 0 || $stock < 0) {
            throw new Exception("Invalid information");
        }
        $_SESSION['products'][] = new Product($code, $name, $price, $stock);
        echo "<script>alert('Product added successfully!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: {$e->getMessage()}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input {
            width: 95%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ccc;
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

        td.status-in {
            color: green;
            font-weight: bold;
        }

        td.status-out {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Add New Product</h1>
    <form method="post">
        <label for="code">Product Code</label>
        <input type="text" name="code" id="code" required>

        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" min="0" required>

        <label for="stock">Stock Quantity</label>
        <input type="number" name="stock" id="stock" min="0" required>

        <button type="submit">Add Product</button>
    </form>

    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price (VND)</th>
                <th>Stock</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['products'] as $product): ?>
                <tr>
                    <td><?= $product->getCode() ?></td>
                    <td><?= $product->getName() ?></td>
                    <td><?= number_format($product->getPrice()) ?></td>
                    <td><?= $product->getStock() ?></td>
                    <td class="<?= $product->isInStock() ? 'status-in' : 'status-out' ?>">
                        <?= $product->isInStock() ? 'In Stock' : 'Out of Stock' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>