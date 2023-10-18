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
			// Get the operator's opname from the form
			$opname = mysqli_real_escape_string($conn, $_POST['opname']);

			// Delete the operator from the database
			$delete_query = "DELETE FROM operator WHERE opname = '$opname'";
			if (mysqli_query($conn, $delete_query)) {
				echo "<p>Operator removed successfully!</p>";
				echo "<script>setTimeout(function(){window.location.href='das.php';}, 2000);</script>";
			} else {
				echo "<p>Error removing operator: " . mysqli_error($con) . "</p>";
			}
		} else {
			// Get the operator's opname from the URL parameter
			$opname = mysqli_real_escape_string($conn, $_GET['opname']);

			// Display a confirmation form before deleting the operator
			echo "<p>Are you sure you want to remove the operator with opname \"$opname\"?</p>";
			echo "<form action=\"remove.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"opname\" value=\"$opname\">";
			echo "<input type=\"submit\" value=\"Yes\">";
			echo "<a href=\"index.php\">No, go back to Operator Information</a>";
			echo "</form>";
		}

		// Close the database connection
		mysqli_close($conn);
	?>

</body>
</html>

