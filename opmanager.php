<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Information</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        table {
	border-collapse: collapse;
	width: 80%;
}

thead {
	background-color: #ccc;
}

th, td {
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #f2f2f2;
}

    </style>
	<h1>Vehicle Information</h1>
	<table>
		<thead>
			<tr>
				<th>plate Number</th>
				<th>service</th>
                <th>scheduled time</th>
				<th>amount</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
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

// Query the database for the vehicle information
$query = "SELECT numberplate, service, schedule,status, amount FROM appointments";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Loop through the results and display them in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['numberplate'] . "</td>";
    echo "<td>" . $row['service'] . "</td>";
    echo "<td>" . $row['schedule'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";
	echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}

// Close the database connection
mysqli_close($conn);
?>

		</tbody>
	</table>
</body>
</html>
