<?php
// Connect to the database (using localhost)
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Garage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

if (isset($_POST['serviceId'])) {
    $serviceId = $_POST['serviceId'];

    // Update the status in the database for the specified serviceId to "undone"
    $newStatus = "undone"; // The new status to set
    $sql = "UPDATE appointments SET status = '$newStatus' WHERE id = $serviceId";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Return success message
    } else {
        echo "error: " . $conn->error; // Return error message if the query fails
    }
} else {
    echo "error: Service ID not set"; // Return error message if serviceId is not set
}

// Close the database connection
$conn->close();
?>
