<?php
session_start();

if (!isset($_SESSION['username_login'])) {
    header("Location: login.php");
}
?>

<h2>ALL PRODUCTS</h2>

<p>Welcome: <?php echo $_SESSION['username_login']; ?></p>

<div style="display:flex;gap:40px">

    <div>
        <img src="image.png" width="120">
        <h3>Product 101</h3>
        <p>300.5</p>
        <p>Category: Hard Disk</p>
    </div>

    <div>
        <img src="image.png" width="120">
        <h3>wer</h3>
        <p>3400</p>
        <p>Category: Keyboard</p>
    </div>

    <div>
        <img src="image.png" width="120">
        <h3>Product 202</h3>
        <p>100</p>
        <p>Category: Laptops</p>
    </div>

</div>