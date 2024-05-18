<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location: ./login.php");
    exit();
}

$user = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($email);
    $stmt->fetch();
    
    $to = $email;
    $subject = "Ticket Cancellation and Refund";
    $message = "Dear [User],\n\nWe're writing to inform you that your ticket has been successfully canceled.\n\nThe refund process is underway, and the refunded amount will be credited to your bank account within the next 2 to 4 days.\n\nBest regards,\n\nIRRS - Indian Railway Reservation System";
    $headers = "From: irrs.ticket@gmail.com" . "\r\n" .
               "Reply-To: irrs.ticket@gmail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        header("location: ./mybooking.php");
    } else {
        echo "Error: Unable to send mail.";
    }
} else {
    echo "Error: User not found.";
}

$stmt->close();
$conn->close();
?>
