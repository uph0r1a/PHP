<?php include 'banner.php' ?>
<?php include 'search.php' ?>

<?php
$place = [
    [
        "name" => "Nha trang",
        "price" => "150000",
        "sale_price" => "100000"
    ],
    [
        "name" => "Sapa",
        "price" => "180000",
        "sale_price" => "0"
    ],
    [
        "name" => "Da lat",
        "price" => "100000",
        "sale_price" => "0"
    ],
    [
        "name" => "Mui ne",
        "price" => "120000",
        "sale_price" => "90000"
    ],
];
?>

<div class="place-list">
    <?php foreach ($place as $key => $value) { ?>
        <div class="place-card">
            <img src="image/image<?php echo $key + 1 ?>.png">
            <h3><?php echo $value["name"] ?></h3>

            <?php if ($value["sale_price"] != 0) { ?>
                <p class="old-price">Old: <?php echo number_format($value["price"]) ?> d/1 dem</p>
                <p class="price">Price: <?php echo number_format($value["sale_price"]) ?> d/1 dem</p>
            <?php } else { ?>
                <p class="price">Price: <?php echo number_format($value["price"]) ?> d/1 dem</p>
            <?php } ?>

            <button class="btn btn-view">View</button>
            <button class="btn btn-cart">Add cart</button>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php' ?>