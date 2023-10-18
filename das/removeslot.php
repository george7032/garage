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
			// Get the operator's username from the form
			$slotno = mysqli_real_escape_string($con, $_POST['slotno']);

			// Delete the operator from the database
			$delete_query = "DELETE FROM slots WHERE slotno = '$slotno'";
			if (mysqli_query($con, $delete_query)) {
				echo "<p>Operator removed successfully!</p>";
				echo "<script>setTimeout(function(){window.location.href='das.php';}, 2000);</script>";
			} else {
				echo "<p>Error removing operator: " . mysqli_error($con) . "</p>";
			}
		} else {
			// Get the operator's username from the URL parameter
			$slotno = mysqli_real_escape_string($con, $_GET['slotno']);

			// Display a confirmation form before deleting the operator
			echo "<p>Are you sure you want to remove the operator with username \"$username\"?</p>";
			echo "<form action=\"remove.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
			echo "<input type=\"submit\" value=\"Yes\">";
			echo "<a href=\"index.php\">No, go back to Operator Information</a>";
			echo "</form>";
		}

		// Close the database connection
		mysqli_close($con);
	?>

</body>
</html>

