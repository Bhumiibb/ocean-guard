<?php
// Database connection details
$servername = "localhost";  // Host (default: localhost)
$username = "root";         // Database username (default: root)
$password = "";             // Database password (default: empty)
$dbname = "ocean_guard";    // Database name (the one you created earlier)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$location = $_POST['location'];
$pollution_type = $_POST['pollution_type'];
$description = $_POST['description'];

// Insert data into the database
$sql = "INSERT INTO pollution_reports (location, pollution_type, description) 
        VALUES ('$location', '$pollution_type', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Pollution report submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
