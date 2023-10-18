<?php
session_start();

$servername = "sql109.epizy.com";
$username = "epiz_33860754";
$password = "KqTAP3lJsbip";
$dbname = "epiz_33860754_final_project";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $plate_number = $_POST['plateNumber'];
    $exit_time = $_POST['exitTime'];
    $amount= $_POST['amount'];

    // Retrieve entry time from database
    $sql = "SELECT entryTime FROM parked_vehicles WHERE plateNumber='$plate_number'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $entry_time = $row['entryTime'];

        // Update database
        $sql = "UPDATE parked_vehicles SET exitTime='$exit_time', amount='$amount' WHERE plateNumber='$plate_number'";
        if (mysqli_query($conn, $sql)) {
            // Calculate time spent and amount
            $time_in = strtotime($entry_time);
            $time_out = strtotime($exit_time);
            $time_diff = $time_out - $time_in;
            $hours = floor($time_diff / (60 * 60));
            $minutes = floor(($time_diff - ($hours * 60 * 60)) / 60);
            $amount = $hours * 15 + $minutes;

            // Store amount in session variable
            $_SESSION['amount'] = $amount;

            // Redirect to payment page
            header('Location: Payment.php');
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Plate number not found in database
        echo "<script>alert('Plate number does not exist'); window.location.href = 'vehicle Exit.php';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exit.css">
    <title>Exit Form</title>
</head>
<body>
    <style>
       /* Set the font and margin for the page */
       body {
  font-family: Arial, sans-serif;
  margin: 0;
  background-image: url("https://cdn.pixabay.com/photo/2017/11/10/00/20/riga-2935035_960_720.jpg");
  background-size: cover;
}

/* Style the form container */
form {
  width: 80%;
  max-width: 500px;
  margin: 2em auto;
  padding: 1em;
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: lightgray;
  color: burlywood;
}

/* Style the form labels and input fields */
label {
  display: block;
  margin-bottom: 0.5em;
}

input[type="text"],
input[type="datetime-local"] {
  padding: 0.5em;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 1em;
  width: 100%;
  box-sizing: border-box;
}

/* Style the form button */
input[type="submit"] {
  padding: 0.5em 1em;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 1em;
  transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #0062cc;
}
.logo {
  width: 100px;
  height: 100px;
  background-color: #007bff;
  border-radius: 50%;
  margin: 0 auto;
}

form {
  color: lightseagreen;
  width: 80%;
  max-width: 500px;
  margin: 2em auto;
  padding: 1em;
  border: 1px solid #ccc;
  border-radius: 5px;
}

 
    </style>
    <div class="logo"></div>
    <h1>Exit Form</h1>
    <form  action="vehicle Exit.php" method="post" >
        <label for="plate-number">Plate Number:</label>
        <input type="text" id="plate-number" name="plateNumber" required>
        <br>
        <label for="exit-time">Time Out:</label>
        <input type="datetime-local" id="exit-time" name="exitTime" required>
        <br>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" value="<?php echo isset($_SESSION['amount']) ? $_SESSION['amount'] : ''; ?>" readonly>
        <br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
