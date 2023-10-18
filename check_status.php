<!DOCTYPE html>
<html>
<head>
    <title>Check Status Page</title>
    <style>
        /* Styles for the notification modal */
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #ffffff;
    color: #333333;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.modal-button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.modal-button.cancel-button {
    background-color: #0000FF;
}

.modal-button:hover {
    background-color: #0000FF;
}

.modal-button.cancel-button:hover {
    background-color:  #45a049;
}

        .modal1 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #ff4444; /* Red background color */
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Close button */
        .close {
            color: #ffffff;
            float: right;
            font-size: 30px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .ok-button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .ok-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

 
 <?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numberplate = $_POST['numberplate'];

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

    // Query the database to check the status for the entered number plate
    $query = "SELECT status, amount FROM appointments WHERE numberplate = '$numberplate'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status === "done") {
            // Retrieve the amount from the query result
            $amount = $row['amount'];
        
            // Store the amount in a session variable
            $_SESSION['amount'] = $amount;
        
            // JavaScript code to create the custom notification modal
            echo '<script>
                    var modal = document.createElement("div");
                    modal.className = "modal";
                    var modalContent = document.createElement("div");
                    modalContent.className = "modal-content";
                    var message = document.createElement("p");
                    message.innerText = "The service is done. Do you want to proceed to payment?";
                    var okButton = document.createElement("button");
                    okButton.innerText = "OK";
                    okButton.className = "modal-button";
                    okButton.onclick = function() {
                        window.location.href = "payment_page.php";
                    };
                    var cancelButton = document.createElement("button");
                    cancelButton.innerText = "Cancel";
                    cancelButton.className = "modal-button cancel-button";
                    cancelButton.onclick = function() {
                        window.location.href = "projo/index.html";
                    };
                    modalContent.appendChild(message);
                    modalContent.appendChild(okButton);
                    modalContent.appendChild(cancelButton);
                    modal.appendChild(modalContent);
                    document.body.appendChild(modal);
                  </script>';
            exit;
        }
         elseif ($status === "undone") {
            echo '<div id="notificationModal" class="modal1" style="display: block;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>The work is incomplete. Please contact the service center for more information.</p>
                <button class="ok-button" onclick="redirectToIndex()">OK</button>
            </div>
          </div>';
        } else {
            // Handle other status values if needed
            echo "The work is incomplete. Please contact the service center for more information.";
        }
    } else {
        echo "No record found for the entered number plate.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<script>
    function redirectToIndex() {
        window.location.href = 'projo/index.html';
    }
</script>
  