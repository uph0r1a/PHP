<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button onclick="pizza()">Pizza</button>
    <button onclick="bcc()">BCC</button>

    <div id="pizzaDiv" style="display:none;">
        <form method="post">
            <label for="pizza">Enter the number of pizza</label>
            <input type="number" name="pizza" id="pizza" required>

            <label for="time">Enter the time</label>
            <input type="number" name="time" id="time" required>

            <button type="submit">Price</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pizza = is_numeric($_POST["pizza"]) ? $_POST["pizza"] : "Invalid";
            $time = is_numeric($_POST["time"]) ? $_POST["time"] : "Invalid";
            $price;

            $price = ($time <= 10) ? 5.5 : (($time <= 20 && $time > 10) ? 4 : (($time <= 30 && $time > 20) ? 2.5 : 0));

            echo $pizza * $price;
        }  ?>
    </div>

    <div id="bccDiv" style="display:none;">
        <br/>
        <?php
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                echo $i . " * " . $j . " = " . $i * $j . "<br/>";
            }
            echo "<br/>";
        }
        ?>
    </div>

    <script>
        function pizza() {
            document.getElementById("pizzaDiv").style.display = "inline"
            document.getElementById("bccDiv").style.display = "none"
        }

        function bcc() {
            document.getElementById("bccDiv").style.display = "inline"
            document.getElementById("pizzaDiv").style.display = "none"
        }
    </script>
</body>

</html>