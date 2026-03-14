<?php
require_once "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $status = $_POST["status"];

    $sql = "INSERT INTO LOP_HOC (name,status)
            VALUES ('$name','$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: lopHoc.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background: #1e874b;
    }
</style>

<h2>Them lop hoc</h2>

<form method="post">
    Ten lop:
    <input type="text" name="name" required>

    Trang thai:
    <select name="status">
        <option value="1">Hoat dong</option>
        <option value="0">Khong hoat dong</option>
    </select>

    <button type="submit">Them</button>
</form>

<?php mysqli_close($conn); ?>