<?php
require_once "connectDB.php";

$valid = true;
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim(htmlspecialchars(ucwords($_POST["name"])));
    $tel = trim($_POST["tel"]);
    $date = date("Y-m-d", strtotime($_POST["date"]));
    $note = trim(htmlspecialchars($_POST["note"]));
    $sms = isset($_POST["sms"]) ? 1 : 0;

    if (strlen($name) < 5 || !preg_match('/^[\p{L} ]+$/u', $name)) {
        $valid = false;
        $message .=  "\nCustomer Name must contain at least 5 alphabetic characters and no special characters!";
    }

    $telDate = mysqli_query($conn, "SELECT phone FROM Appointment WHERE appointment_date = '$date'");
    $phones = [];
    while ($row = mysqli_fetch_assoc($telDate)) {
        $phones[] = $row['phone'];
    }

    if (strlen($tel) < 10 || $tel[0] !== '0' || in_array($tel, $phones)) {
        $valid = false;
        $message .= "\nThis phone number is invalid or has already booked an appointment on this date! Please choose another date.";
    }

    if (strtotime($date) <= strtotime(date("Y-m-d"))) {
        $valid = false;
        $message .= "\nAppointment date must be a future date!";
    }

    if (strlen($note) > 500) {
        $valid = false;
        $message .= "\nNotes must not exceed 500 characters!";
    }

    if ($valid) {
        $stmt = $conn->prepare("INSERT INTO Appointment (customer_name, phone, appointment_date, notes, send_sms) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $tel, $date, $note, $sms);

        if ($stmt->execute()) {
            echo "<script>alert('Your appointment has been successfully booked')</script>";
            exit;
        } else {
            echo "<script>alert('Error: " . $stmt->error . "')</script>";
        }
    } else {
        echo "<script>alert('$message')</script>";
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        margin: 0;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    textarea:focus {
        border-color: #007BFF;
        outline: none;
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    input[type="checkbox"] {
        margin-right: 8px;
    }

    label.checkbox-label {
        display: inline-block;
        font-weight: normal;
    }

    button {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 500px) {
        form {
            padding: 20px;
        }
    }
</style>

<h1>Appointment Booking Form</h1>

<form method="post">
    <label for="name">Customer Name: </label>
    <input type="text" name="name" id="name" minlength="5" required>

    <label for="tel">Phone Number: </label>
    <input type="text" name="tel" id="tel" minlength="10" required>

    <label for="date">Appointment Date: </label>
    <input type="date" name="date" id="date" required>

    <label for="note">Notes: </label>
    <textarea name="note" id="note" maxlength="500"></textarea>

    <div>
        <input type="checkbox" name="sms" id="sms">
        <label for="sms" class="checkbox-label">Send SMS Reminder</label>
    </div>

    <button type="submit">Book Appointment</button>
</form>