<?php
// Connect to database 
$servername = "localhost";
$opname = "root";
$password = "";
$dbname = "Garage";
$conn = new mysqli($servername, $opname, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data and sanitize it
  $opname = mysqli_real_escape_string($conn, $_POST["opname"]);
  
  // Retrieve and hash the password
  $password = $_POST["password"]; // Assuming you have a form field named "password"
  $hashed_password = hash("sha256", $password);
  
  // Insert data into database
  $sql = "INSERT INTO operator (opname, password) VALUES ('$opname', '$hashed_password')";
  if ($conn->query($sql) === TRUE) {
    // Redirect to home page on success
    header("Location: das.php");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close database connection
$conn->close();
?>
