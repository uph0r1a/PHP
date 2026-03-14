<?php require_once "connectDB.php";

$id = intval($_GET["id"]);

$result = mysqli_query(
    $conn,
    "SELECT * FROM LOP_HOC WHERE id=$id"
);

$lop = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $status = $_POST["status"];

    mysqli_query(
        $conn,
        "UPDATE LOP_HOC
         SET name='$name', status='$status'
         WHERE id=$id"
    );

    header("Location: lopHoc.php");
    exit;
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        padding: 40px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        width: 350px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background: #2c80b4;
    }
</style>

<h2>Sua lop hoc</h2>

<form method="post">
    Ten lop:
    <input type="text" name="name" value="<?= $lop["name"] ?>" required>

    Trang thai:
    <select name="status">
        <option value="1" <?= $lop["status"] ? "selected" : "" ?>>
            Hoat dong
        </option>

        <option value="0" <?= !$lop["status"] ? "selected" : "" ?>>
            Khong hoat dong
        </option>
    </select>

    <button type="submit">Cap nhat</button>
</form>

<?php mysqli_close($conn); ?>