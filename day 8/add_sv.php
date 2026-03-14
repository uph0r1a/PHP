<?php require_once "connectDB.php";

$lop = mysqli_query($conn, "SELECT * FROM LOP_HOC");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $lop_hoc_id = $_POST["lop_hoc_id"];

    $sql = "INSERT INTO SINH_VIEN (name,email,phone,lop_hoc_id,status)
            VALUES ('$name','$email','$phone','$lop_hoc_id',1)";

    if (mysqli_query($conn, $sql)) {
        header("Location: sinhVien.php");
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

    label {
        font-weight: bold;
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
        background: #2980b9;
    }
</style>

<h2>Them sinh vien</h2>

<form method="post">
    <label>Ho ten:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>So dien thoai:</label>
    <input type="text" name="phone" required>

    <label>Lop hoc:</label>
    <select name="lop_hoc_id">
        <?php while ($row = mysqli_fetch_assoc($lop)): ?>
            <option value="<?= $row["id"] ?>">
                <?= $row["name"] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Them sinh vien</button>
</form>

<?php mysqli_close($conn); ?>