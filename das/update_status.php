<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceId = $_POST['serviceId'];
    $newStatus = $_POST['newStatus'];

    // Update the status in the database for the specified serviceId
    $sql = "UPDATE appointments SET status = '$newStatus' WHERE id = $serviceId";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page after the update
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
