<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .status-buttons button {
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".status-buttons button").click(function () {
                var serviceId = $(this).data("service-id");
                var statusCell = $(this).closest("tr").find(".status-cell");
                var newStatus = $(this).text();

                // Determine which PHP file to call based on the button clicked
                var phpFile = newStatus === "done" ? "update-done.php" : "update-undone.php";

                // Make an AJAX request to update the status in the database
                $.ajax({
                    url: phpFile,
                    method: "POST",
                    data: { serviceId: serviceId },
                    success: function (response) {
                        if (response === "success") {
                            // Update the status in the table cell
                            statusCell.text(newStatus);
                        } else {
                            alert("Failed to update status.");
                        }
                    },
                    error: function () {
                        alert("Error occurred while updating status.");
                    },
                });
            });
        });
    </script>
</head>
<body>
    <h1>Service Information</h1>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Status</th>
                <th>Change Status</th>
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

            // Query the database for the service information
            $query = "SELECT id, service, status FROM appointments";
            $result = mysqli_query($conn, $query);

            // Check if the query was successful
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Loop through the results and display them in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td class='service-cell'>" . $row['service'] . "</td>";
                echo "<td class='status-cell'>" . $row['status'] . "</td>";
                echo "<td class='status-buttons'>";
                echo "<form method='post' action='update_status.php'>";
                echo "<input type='hidden' name='serviceId' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='newStatus' value='done' class='status-button'>done</button>";
                echo "<button type='submit' name='newStatus' value='undone' class='status-button'>undone</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
