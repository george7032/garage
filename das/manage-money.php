<!DOCTYPE html>
<html>
<head>
	<title>Money Information</title>
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
	<h1>Money Information</h1>
	<table>
		<thead>
			<tr>
				<th>amount</th>
				
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
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					exit();
				}

				// Query the database for the vehicle information
				$result = mysqli_query($conn, "SELECT amount FROM appointments");

				// Loop through the results and display them in the table
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['amount'] . "</td>";
					echo "</tr>";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
