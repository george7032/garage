<!DOCTYPE html>
<html>
<head>
	<title>Remove Operator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Remove Operator</h1>

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

		// Check if the form has been submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Get the slot number from the form
			$slotno = mysqli_real_escape_string($conn, $_POST['slotno']);

			// Delete the slot from the database
			$delete_query = "DELETE FROM slots WHERE slotno = '$slotno'";
			if (mysqli_query($conn, $delete_query)) {
				echo "<p>Slot removed successfully!</p>";
				echo "<script>setTimeout(function(){window.location.href='/parking-attendant/operator/home page.php';}, 2000);</script>";
			} else {
				echo "<p>Error removing slot: " . mysqli_error($conn) . "</p>";
			}
		} else {
			// Display the form to input the slot number
			echo "<form action=\"opremove.php\" method=\"POST\">";
			echo "<label for=\"slotno\">Enter Slot Number:</label>";
			echo "<input type=\"text\" name=\"slotno\" id=\"slotno\">";
			echo "<input type=\"submit\" value=\"Remove\">";
			echo "</form>";
		}

		// Close the database connection
		mysqli_close($conn);
	?>

</body>
</html>
