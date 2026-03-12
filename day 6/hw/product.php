<?php session_start();

if (!isset($_SESSION['username_login'])) {
    header("Location: login.php");
}
?>

<style>
    body {
        font-family: Arial;
        background: #f2f4f7;
        text-align: center;
    }

    .products {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-top: 30px;
    }

    .product {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 180px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product img {
        width: 120px;
    }
</style>

<h2>ALL PRODUCTS</h2>

<p>Welcome: <b><?php echo $_SESSION['username_login']; ?></b></p>

<div class="products">
    <div class="product">
        <img src="image.png">
        <h3>Product 101</h3>
        <p>300.5</p>
        <p>Category: Hard Disk</p>
    </div>

    <div class="product">
        <img src="image.png">
        <h3>wer</h3>
        <p>3400</p>
        <p>Category: Keyboard</p>
    </div>

    <div class="product">
        <img src="image.png">
        <h3>Product 202</h3>
        <p>100</p>
        <p>Category: Laptops</p>
    </div>
</div>