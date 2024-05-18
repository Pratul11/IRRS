<?php
// Include or define the function getTrainDetailsFromDatabase here

// Check if the trainNumber parameter is set in the request
if (isset($_GET['trainNumber'])) {
    // Get the train number from the request
    $trainNumber = $_GET['trainNumber'];

    // Call the function to get train details from the database
    $trainDetails = getTrainDetailsFromDatabase($trainNumber);

    // Check if train details were found
    if ($trainDetails) {
        // If train details were found, encode them as JSON and echo the response
        echo json_encode($trainDetails);
    } else {
        // If no train details were found, return an error response
        echo json_encode(array('error' => 'Train details not found'));
    }
} else {
    // If the trainNumber parameter is not set, return an error response
    echo json_encode(array('error' => 'Train number not provided'));
}


// Function to query the database and fetch train details
// Function to query the database and fetch train details
function getTrainDetailsFromDatabase($trainNumber) {
    // Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";

    try {
        // Create connection using PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT train_name, source_station, destination_station, 
                                source_code, departure_time, destination_code, 
                                arrival_time, runs_on, total_time, fare
                                FROM trains WHERE train_number = :trainNumber");
        $stmt->bindParam(':trainNumber', $trainNumber);
        $stmt->execute();

        // Fetch train details
        $trainDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close cursor
        $stmt->closeCursor();

        // Close connection
        $conn = null;

        // Return fetched train details
        return $trainDetails;
    } catch(PDOException $e) {
        // Throw exception
        throw new Exception("Connection failed: " . $e->getMessage());
    }
}


?>
