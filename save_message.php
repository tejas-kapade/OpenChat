<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Create a database connection
    //$conn = new mysqli('localhost', 'tejaskapade', 'KRISHNA', 'localhost:3306');

    // Database configuration
$dbHost = 'localhost:3306';
$dbUsername = 'tejas';
$dbPassword = 'ILOVEKRISHNA';
$dbName = 'OPENCHAT';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert the message
    $sql = "INSERT INTO messages (username, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $message);

    if ($stmt->execute()) {
        // Message inserted successfully
        echo "Message saved!";
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
