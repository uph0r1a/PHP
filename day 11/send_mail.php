<?php
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "connectDB.php";

$id = intval($_GET["id"]);

$result = mysqli_query(
    $conn,
    "SELECT customerEmail FROM Customers WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);
$to = $row["customerEmail"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = htmlspecialchars(trim($_POST["to"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        die("Dia chi email khong hop le");
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "tri.td.2777@aptechlearning.edu.vn";
        $mail->Password = "kzez sufv tiet fypf";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->setFrom("tri.td.2777@aptechlearning.edu.vn", "Thai Duc Tri");
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);
        $mail->AltBody = strip_tags($message);
        $mail->send();
        echo "<script>
                alert('Email đã được gửi đến $to');
                window.location.href = 'customerTable.php';
              </script>";
        exit;
    } catch (Exception $e) {
        echo "<script>
                alert('Gửi mail thất bại. Lỗi: {$mail->ErrorInfo}');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding-top: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Form gui mail</h2>
    <form method="post">
        <label for="to">Gui toi (Email):</label>
        <input type="text" name="to" id="to" value="<?= $to ?>">

        <label for="subject">Chu de:</label>
        <input type="text" name="subject" id="subject">

        <label for="attachment">File dinh kem</label>
        <input type="file" name="attachment" id="attachment">

        <label for="message">Noi dung</label>
        <textarea name="message" id="message"></textarea>

        <button type="submit">Gui Email</button>
    </form>
</body>

</html>