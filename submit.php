<?php

// Get form data
$fullname = $_POST['fullname'];
$platenumber = $_POST['platenumber'];
$slotNumber=$_POST['slotid'];
$ltime=$_POST['start_time'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('connection failed :'.$conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into users (fullname, platenumber,slotid,start_time) values (?,?,?,?)");
  $stmt->bind_param("ssis", $fullname, $platenumber,$slotNumber, $ltime );
  $stmt->execute();
  echo "user data saved successfully...";
  if (mysqli_affected_rows($conn) > 0) {
    // Redirect to the success page
    header("Location: index.html");
    exit;
  } else {
    // Redirect to the error page
    header("Location: error.php");
    exit;
  }
  $stmt->close();
  $conn->close();
}
?>