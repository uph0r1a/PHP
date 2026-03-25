<?php
session_start();

class Product
{
    private $id, $name, $price, $quantity, $category;

    public function __construct($id, $name, $price, $quantity, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
    }

    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function getTotalValue()
    {
        return $this->price * $this->quantity;
    }

    public function getStatus()
    {
        if ($this->quantity >= 5) return "Available";
        elseif ($this->quantity == 0) return "Out of Stock";
        else return "Low Stock";
    }
}

if (!isset($_SESSION["productList"])) {
    $_SESSION["productList"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $id = $_POST["id"];
        $name = trim(htmlspecialchars($_POST["name"]));
        $price = intval($_POST["price"]);
        $quantity = intval($_POST["quantity"]);
        $category = htmlspecialchars($_POST["category"]);

        if (empty($id) || empty($name) || $price <= 0 || $quantity <= 0 || empty($category)) {
            throw new Exception("Invalid information");
        }

        $_SESSION["productList"][] = new Product($id, $name, $price, $quantity, $category);
        echo "<script>alert('Product added successfully!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: {$e->getMessage()}');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 400px;
            margin: 0 auto 30px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            background: #3498db;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #2980b9;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: #2c3e50;
            color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        tbody tr:hover {
            background: #eaf2f8;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .available {
            background: #27ae60;
        }

        .low {
            background: #f39c12;
        }

        .out {
            background: #e74c3c;
        }
    </style>
</head>

<body>

    <h2>Product Management</h2>

    <form method="post">
        <label>Product ID</label>
        <input type="text" name="id" required>

        <label>Product Name</label>
        <input type="text" name="name" required>

        <label>Price</label>
        <input type="number" name="price" min="0" required>

        <label>Quantity</label>
        <input type="number" name="quantity" min="0" required>

        <label>Category</label>
        <select name="category" required>
            <option value="Electronics">Electronics</option>
            <option value="Clothing">Clothing</option>
            <option value="Food">Food</option>
            <option value="Others">Others</option>
        </select>

        <button type="submit">Add Product</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Category</th>
                <th>Total Value</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION["productList"] as $product):
                $status = $product->getStatus();
                $class = ($status == "Available") ? "available" : (($status == "Low Stock") ? "low" : "out");
            ?>
                <tr>
                    <td><?= $product->getID() ?></td>
                    <td><?= $product->getName() ?></td>
                    <td><?= number_format($product->getPrice()) ?></td>
                    <td><?= $product->getQuantity() ?></td>
                    <td><?= $product->getCategory() ?></td>
                    <td><?= number_format($product->getTotalValue()) ?></td>
                    <td><span class="status <?= $class ?>"><?= $status ?></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>