<?php
// Connect to database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data and sanitize it
  $opname = mysqli_real_escape_string($conn, $_POST["opname"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // Hash password for security (replace with your own hashing function)
  $hashed_password = hash("sha256", $password);

  // Insert user into database
  $sql = "INSERT INTO operator (opname, password) VALUES ('$opname', '$hashed_password')";
  if ($conn->query($sql) === TRUE) {
    // Redirect to home page on success
    header("Location: admin login.php");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close database connection
$conn->close();
?>

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
				<th>opname</th>
				<th>password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to the database
				
                $servername = "localhost";
				$opname = "root";
				$password = "";
				$dbname = "Garage";
				$conn = new mysqli($servername, $opname, $password, $dbname);
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					exit();
				}

				// Query the database for the vehicle information
				$result = mysqli_query($conn, "SELECT opname, password FROM operator");

				// Loop through the results and display them in the table
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['opname'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>";

                    echo "<a href=\"remove.php?opname=" . $row['opname'] . "\">Remove</a>";
                    echo "</td>";
					echo "</tr>";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
    <br>
    <h2>Add a new operator</h2>
    <form action="add.php" method="POST">
        <label for="opname">opname:</label>
        <input type="text" name="opname">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Add Operator">
    </form>
</body>
</html>
