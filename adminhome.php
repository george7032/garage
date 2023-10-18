<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="adminhome.js">
  </head>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .button-container {
            text-align: center;
            margin-top: 50px;
        }

        button {
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007BFF;
            color: #fff;
        }

        .login-button {
            background-color: #28A745;
        }

        .signup-button {
            background-color: #FFC107;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1> Garage Management System</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="button-container">
                <a href="signup.php"><button class="signup-button"><i class="fas fa-user-plus"></i> Sign up</button></a>
                <a href="admin login.php"><button class="login-button"><i class="fas fa-sign-in-alt"></i> Log in</button></a>
            </div>
        </div>
    </main>
</body>
</html>
