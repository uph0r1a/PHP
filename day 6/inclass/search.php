<?php
$result = null;

if (isset($_GET["keyword"])) {

    $keyword = trim($_GET["keyword"]);

    if (isset($_COOKIE["user"])) {

        $savedUser = json_decode($_COOKIE["user"], true);

        if (strtolower($savedUser["username"]) == strtolower($keyword)) {
            $result = $savedUser;
        }
    }
}
?>

<style>
    body {
        font-family: Arial;
        background: #f4f6f9;
    }

    .container {
        width: 500px;
        margin: 80px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input {
        padding: 8px;
        width: 60%;
    }

    button {
        padding: 8px 15px;
        background: #007bff;
        color: white;
        border: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table td {
        border: 1px solid #ddd;
        padding: 10px;
    }
</style>

<div class="container">
    <h2>Tim kiem tai khoan</h2>
    <form method="get">
        Nhap username:
        <input type="text" name="keyword" required>
        <button type="submit">Tim</button>
    </form>

    <br>

    <?php if (isset($_GET["keyword"])): ?>
        <?php if ($result): ?>
            <h3 style="color:green">Tim thay tai khoan</h3>
            <table>
                <tr>
                    <td>Username</td>
                    <td><?= htmlspecialchars($result["username"]) ?></td>
                </tr>

                <tr>
                    <td>Mat khau (hash)</td>
                    <td><?= htmlspecialchars($result["password"]) ?></td>
                </tr>
            </table>
        <?php else: ?>
            <p style="color:red">Khong tim thay user</p>
        <?php endif; ?>
    <?php endif; ?>

    <br>

    <a href="sessionInfo.php">Quay lai</a>
</div>