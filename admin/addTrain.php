<?php
$user = 'root';
$password = '';
$database = 'registration';
$servername = 'localhost';
$port = 3306;
$mysqli = new mysqli($servername, $user, $password, $database, $port);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$train_number = $_POST['train_number'];
$train_name = $_POST['train_name'];
$source_station = $_POST['source_station'];
$destination_station = $_POST['destination_station'];
$source_code = $_POST['source_code'];
$departure_time = $_POST['departure_time'];
$destination_code = $_POST['destination_code'];
$arrival_time = $_POST['arrival_time'];
$runs_on = $_POST['runs_on'];
$total_time = $_POST['total_time'];
$fare = $_POST['fare'];
$seats = '90';

$trains_query = "INSERT INTO trains (train_no, train_name, source, destination, src, departure_time, dst, arrival_time, day, time, fare, seats) VALUES ('$train_number', '$train_name', '$source_station', '$destination_station', '$source_code', '$departure_time', '$destination_code', '$arrival_time', '$runs_on', '$total_time', '$fare', '$seats')";
if ($mysqli->query($trains_query) === TRUE) {
    header('location: addTrain.html?done=true');
} else {
    echo "Error inserting record into trains table: " . $mysqli->error . "<br>";
}

$mysqli->close();
?>
