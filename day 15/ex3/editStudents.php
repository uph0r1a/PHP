<?php require_once "connectDB.php";

$id = intval($_GET["id"]);
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $grade = $_POST["grade"];

    mysqli_query($conn, "UPDATE students 
        SET name='$name', email='$email', grade='$grade'
        WHERE id=$id");

    header("Location: student.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM students");
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
        display: block;
        margin-bottom: 10px;
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

<h2>Sua sinh vien</h2>

<form method="post">
    <label>Ten:
        <input type="text" name="name" value="<?= $student["name"] ?>" required>
    </label>

    <label>Email:
        <input type="email" name="email" value="<?= $student["email"] ?>" required>
    </label>

    <label>Diem:
        <input type="number" name="grade" value="<?= $student["grade"] ?>" required>
    </label>

    <button type="submit">Cap nhat</button>
</form>

<?php mysqli_close($conn) ?>