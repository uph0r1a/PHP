<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            margin-top: 30px;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 60%;
            background-color: #e9e9e9;
        }

        table,
        td {
            border: 2px solid #555;
        }

        td {
            padding: 10px;
            font-size: 22px;
        }

        td:first-child {
            width: 25%;
        }
    </style>
</head>

<body>
    <?php
    $name = "Nguyen Huy Hoang";
    $age = 25;
    $phone = "0986421127";
    $email = "luongitvnsorf@gmail.com";
    $address = "So 7 - My Dinh - Cau Giay - Ha Noi";
    ?>

    <table>
        <tr>
            <td>Name</td>
            <td><?php echo $name ?></td>
        </tr>

        <tr>
            <td>Age</td>
            <td><?php echo $age ?></td>
        </tr>

        <tr>
            <td>Phone</td>
            <td><?php echo $phone ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?php echo $email ?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><?php echo $address ?></td>
        </tr>
    </table>
</body>

</html>