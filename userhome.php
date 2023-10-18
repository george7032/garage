<?php
// Assuming you have a MySQL database set up with a table named 'appointments'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST["service"];
    $schedule = $_POST["schedule"];
    $numberplate = $_POST["numberplate"];
    $amount = $_POST["amount"];

    // Insert data into the 'appointments' table
    $sql = "INSERT INTO appointments (service, schedule, numberplate, amount) VALUES ('$service', '$schedule','$numberplate', '$amount')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to home page on success
        header("Location: projo/index.html");
        exit;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    
    // Close database connection
    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.js">
    <title>Service Scheduler</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    label {
        font-weight: bold;
    }

    select, input[type="datetime-local"], input[type="number"], input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    /* Styles for the notification modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #4caf50; /* Green background color */
  color: white;
  text-align: center;
  padding: 20px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Close button */
.close {
  color: #ffffff;
  float: right;
  font-size: 30px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
<body>
    <h1>Select a Service</h1>
    <form id="serviceForm" action='userhome.php' method='post' onsubmit="showNotification(event)">
        <select id="serviceSelect" name="service">
            <option value="Service 1" data-amount="5000">Engine Tune-Up</option>
            <option value="Service 2-Oil Change Service" data-amount="2000">Oil Change Service</option>
            <option value="Service 3-Brake Inspection and Repair" data-amount="4000">Brake Inspection and Repair</option>
            <option value="Service 4-Brake Inspection and Repair" data-amount="4000">Brake Rotor Resurfacing or Replacement</option>
            <option value="Service 5-Suspension Inspection and Repair" data-amount="9000">Suspension Inspection and Repair</option>
            <option value="Service 6-Steering Rack Replacement" data-amount="7000">Steering Rack Replacement</option>
            <option value="Service 7-Engine Diagnostics And Computerized Engine Scanning" data-amount="10000">Engine Diagnostics And Computerized Engine Scanning</option>
            <option value="Service 8-Electrical System Diagnostics" data-amount="5000">Electrical System Diagnostics</option>
            <option value="Service 9-Tire Rotation, Balancing And Replacement" data-amount="9000">Tire Rotation, Balancing And Replacement</option>
            <option value="Service 10-Headlight, Turn Signal Bulb Replacement" data-amount="3000">Headlight, Turn Signal Bulb Replacement</option>
            <option value="Service 11-Windshield Wiper Blade Replacement" data-amount="10000">Windshield Wiper Blade Replacement</option>
            <option value="Service 12-Fuel Injector Cleaning" data-amount="8000">Fuel Injector Cleaning</option>
            <option value="Service 13-Fuel Pump, Fuel Filter Replacement" data-amount="8000">Fuel Pump, Fuel Filter Replacement</option>
            <option value="Service 14-Transmission Fluid Change, Clutch Replacement" data-amount="8000">Transmission Fluid Change, Clutch Replacement</option>
            <option value="Service 15-Air Conditioning Service" data-amount="8000">Air Conditioning Service </option>

        </select>
        <br><br>
        <label for="amount">Service Amount:</label>
        <input type="number" id="amount" name="amount">
        <br><br>
        <label for="schedule">Select a Schedule:</label>
        <input type="datetime-local" id="schedule" name="schedule"required>
        <br><br>
        <label for="numberplate">Number Plate:</label>
        <input type="numberplate" id="numberplate" name="numberplate" required>
        <br><br>
        <label for="veh_make" class="form-label">Vehicle Model</label>
        <select class="form-select" name="veh_make" required>
        <option selected value="">Please choose Your Vehicle Model</option>
            <option value="Audi">Audi</option>
            <option value="BMW">BMW</option>
            <option value="Toyota">Toyota</option>
            <option value="Mercedes">Mercedes</option>
            <option value="Honda">Honda</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Nissan">Nissan</option>
            <option value="Mazda">Mazda</option>
            <option value="Mitsubishi">Mitsubishi</option>         
        </select>
        <input type="submit" value="Submit">
    </form>
    <div id="notificationModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>The booked service has been submitted successfully!</p>
  </div>
</div>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    // Function to display the notification modal
    function showNotificationModal() {
        $('#notificationModal').show();
        // Redirect to index.html after 3 seconds (3000 milliseconds)
        setTimeout(function(){
            window.location.href = 'projo/index.html';
        }, 3000);
    }

    // Function to close the notification modal
    $('.close').click(function(){
        $('#notificationModal').hide();
    });

    // Function to show notification and prevent form submission
    function showNotification(event) {
        event.preventDefault();
        showNotificationModal();
    }

    // Attach showNotification function to the form submission
    $('#serviceForm').submit(showNotification);
});
</script>

<script>
      document.getElementById("serviceSelect").addEventListener("change", function () {
    const selectedOption = this.options[this.selectedIndex];
    const amountField = document.getElementById("amount");
    amountField.value = selectedOption.getAttribute("data-amount");
});

    </script>
</body>
</html>
