<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gallery Modal</title>
    <style>
        .item {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            background: white;
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php for ($i = 1; $i <= 6; $i++) { ?>
        <div class="item">
            <img src="images/<?php echo $i ?>.png" width="120"><br>
            <p>Hình ảnh <?php echo $i ?></p>
            <button onclick="view(<?php echo $i ?>)">View</button>
        </div>
    <?php } ?>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h3 id="modal-title"></h3>
            <img id="modal-img" src="" width="300"><br><br>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function view(id) {
            document.getElementById("modal").style.display = "block";
            document.getElementById("modal-img").src = "images/" + id + ".png";
            document.getElementById("modal-title").innerText = "Modal hình ảnh " + id;
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>

</body>

</html>