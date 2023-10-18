<?php
// Connect to database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data and sanitize it
  $slotno = mysqli_real_escape_string($conn, $_POST["slotno"]);
  // Insert data into database
  $sql = "INSERT INTO slots (slotno) VALUES ('$slotno')";
  if ($conn->query($sql) === TRUE) {
    // Redirect to home page on success
    header("Location: /parking-attendant/operator/home page.php");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close database connection
$conn->close();
?>