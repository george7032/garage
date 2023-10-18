<!DOCTYPE html>
<html>
<head>
    <title>View Booked Services Page</title>
</head>
<body> 
<!-- Display booked services to the user -->
<h1>Booked Services</h1>
<?php
// Establish a database connection
$servername = "localhost";
$username = "username";
$password = "";
$database = "Garage";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve booked services
$sql = "SELECT service_id, service, amount FROM appointments";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Store booked services data in an array
    $bookedServices = array();
    while($row = $result->fetch_assoc()) {
        $bookedServices[] = $row;
    }
} else {
    // No booked services found
    $bookedServices = array();
}

// Close the database connection
$conn->close();
?>

<!-- Display booked services in the HTML table -->
<h1>Booked Services</h1>
<table border="1">
    <tr>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Price</th>
    </tr>
    <?php
    // Iterate through booked services and display them in the table
    foreach ($bookedServices as $service) {
        echo '<tr>';
        echo '<td>' . $service['service_id'] . '</td>';
        echo '<td>' . $service['service'] . '</td>';
        echo '<td>$' . $service['amount'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>


    <!-- Form to allow users to change services -->
    <h2>Change Booked Services</h2>
    <form id="serviceForm" action="update_services.php" method="post">
        <label for="service">Select a new service:</label>
        <select id="serviceSelect" name="service">
            <option value="Service 1-Engine Tune-Up" data-amount="5000">Engine Tune-Up</option>
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
        <input type="text" id="displayAmount" readonly>
        <input type="hidden" id="amount" name="amount">
        <br><br>
        <label for="schedule">Select a Schedule:</label>
        <input type="datetime-local" id="schedule" name="schedule" required>
        <br><br>
        <label for="numberplate">Number Plate:</label>
        <input type="text" id="numberplate" name="numberplate" required>
        <br><br>
        <input type="submit" value="Change Service">
    </form>

    <!-- JavaScript to update the displayed amount based on service selection -->
    <script>
        var serviceSelect = document.getElementById("serviceSelect");
        var displayAmount = document.getElementById("displayAmount");

        serviceSelect.addEventListener("change", function() {
            var selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            var amount = parseInt(selectedOption.getAttribute("data-amount"));
            displayAmount.value = "$" + amount;
            document.getElementById("amount").value = amount;
        });
    </script>