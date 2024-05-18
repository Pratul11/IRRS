<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location: ./login.php");
    exit();
}

if (!isset($_GET['pnr'])) {
    header("location: ./booking_data.php");
    exit();
}

$pnr = $_GET['pnr'];
$trainNo = $_GET['trainNo'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM booking WHERE pnr = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pnr);

if ($stmt->execute()) {
    $update_query = "UPDATE trains SET seats = seats + 1 WHERE train_no = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("s", $trainNo);
    if ($update_stmt->execute()) {
        header("location: ./cancel_mail.php");
    } else {
        echo "Error updating train seats: " . $conn->error;
    }
} else {
    echo "Error canceling ticket: " . $conn->error;
}

$stmt->close();
$update_stmt->close();
$conn->close();

?>
