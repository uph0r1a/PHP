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

        <table border="1" cellpadding="10">

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