<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto 30px auto;
            border-collapse: collapse;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table td:first-child {
            font-weight: bold;
            width: 30%;
            background-color: #f9fafc;
        }

        img {
            width: 100px;
            height: 100px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        input[type="file"] {
            padding: 8px;
        }

        input:focus {
            outline: none;
            border-color: #4a90e2;
        }

        .gender-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        button {
            padding: 10px 15px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357abd;
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
            <input type="file" name="avatar" id="avatar" value="<?php echo $avatar ?>">
        </div>

        <button>Update</button>

    </form>

</body>

</html>