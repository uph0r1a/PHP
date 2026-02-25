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
    define("Name", "Nguyen Duc Binh");
    define("Age", 2006);
    define("Phone", "0379252006");
    define("Email", "nducbinhov06@gmail.com");
    define("Address", "Hanoi");
    ?>
    <h1>Personal Info</h1>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo Name ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo Age ?></td>
        </tr>

        <tr>
            <td>Phone</td>
            <td><?php echo Phone ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?php echo Email ?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><?php echo Address ?></td>
        </tr>

    </table>
</body>

</html>