<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 60%;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table,
        td {
            border: 1px solid #ccc;
        }

        td {
            padding: 12px;
            font-size: 20px;
        }

        td:first-child {
            width: 30%;
            font-weight: bold;
            background-color: #f7f7f7;
        }

        table img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        form {
            width: 60%;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .form-group label {
            width: 150px;
            font-size: 18px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group input[type="tel"] {
            flex: 1;
            padding: 8px 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="radio"] {
            margin-left: 10px;
            margin-right: 5px;
            transform: scale(1.1);
        }

        .gender-group {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <?php
    $name = "Nguyen Huy Hoang";
    $age = 25;
    $phone = "0986421127";
    $gender = 1;
    $email = "luongitvnsorf@gmail.com";
    $address = "So 7 - My Dinh - Cau Giay - Ha Noi";
    $avatar = "avatar.jpg";
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
            <td>Gender</td>
            <td><?php echo ($gender == 1) ? "Nam" : "Nu"; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $address ?></td>
        </tr>
        <tr>
            <td>Avatar</td>
            <td><img src="<?php echo $avatar ?>" alt="Avatar"></td>
        </tr>
    </table>

    <form method="post">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name ?>">
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" value="<?php echo $age ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $phone ?>">
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <div class="gender-group">
                <input type="radio" name="gender" id="male" value="1" <?php if ($gender == 1) echo "checked"; ?>>
                <label for="male">Nam</label>

                <input type="radio" name="gender" id="female" value="0" <?php if ($gender == 0) echo "checked"; ?>>
                <label for="female">Nu</label>
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $address ?>">
        </div>

        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="text" name="avatar" id="avatar" value="<?php echo $avatar ?>">
        </div>

    </form>

</body>

</html>