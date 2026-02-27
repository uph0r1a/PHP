<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="10" />
    <tr>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Tên</th>
    </tr>
    <?php for ($i = 1; $i < 7; $i++) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><img src="images/<?php echo $i; ?>.png" alt="" width="50"></td>
            <td>Hình ảnh <?php echo $i; ?></td>
        </tr>
    <?php } ?>
    </table>
</body>

</html>