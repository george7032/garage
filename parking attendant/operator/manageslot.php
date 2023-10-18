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
    <table>
        <thead>
            <tr>
                <th>Remaining Slots</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connect to the database
               
                $servername = "sql109.epizy.com";
                $username = "epiz_33860754";
                $password = "KqTAP3lJsbip";
                $dbname = "epiz_33860754_final_project";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Query the database for the total number of slots
                $result = mysqli_query($conn, "SELECT COUNT(*) as total_slots FROM slots");
                $row = mysqli_fetch_array($result);
                $total_slots = $row['total_slots'];

                // Query the database for the number of parked vehicles
                $result = mysqli_query($conn, "SELECT COUNT(*) as parked_vehicles FROM parked_vehicles");
                $row = mysqli_fetch_array($result);
                $parked_vehicles = $row['parked_vehicles'];

                // Calculate the remaining number of slots
                $remaining_slots = $total_slots - $parked_vehicles;

                // Display the remaining number of slots in the table
                echo "<tr>";
                echo "<td>" . $remaining_slots . "</td>";
                echo "<a href=\"/opremove.php?slotno=" . $row['slotno'] . "\">Remove</a>";
                echo "</tr>";

                // Close the database connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <br>
    <h2>Add a new operator</h2>
    <form action="/opadd.php" method="POST">
        <label for="slotno">slotno:</label>
        <input type="text" name="slotno">
        <br>
        <input type="submit" value="Add slot">
    </form>
</body>
</html>