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
	width: 100%;
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
				<th>categories</th>
				
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
				$result = mysqli_query($con, "SELECT category FROM parked_vehicles");

				// Loop through the results and display them in the table
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['category'] . "</td>";
					echo "</tr>";
				}

				// Close the database connection
				mysqli_close($con);
			?>
		</tbody>
	</table>
</body>
</html>
