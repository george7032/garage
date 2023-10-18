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
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);


  // Check if user exists in database
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // Redirect to home page on success
    header("Location: userhome.php");
    exit;
  } else {
    // Display error message if login fails
    echo "Invalid input.";
  }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    
    <title>User's Login Page</title>
  </head>
  <body>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        background-image: url("https://cdn.pixabay.com/photo/2017/11/10/00/20/riga-2935035_960_720.jpg");
        background-size: cover;
      }

      h1 {
        text-align: center;
      }
          .logo {
        display: block;
        margin: 0 auto;
        width: 100px;
        height: 100px;
        border-radius: 50%;
      }
      .logo img {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  max-height: 100%;
  border-radius: 70%;
}

      form {
        background-color: rgba(119, 125, 151, 0.747);
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       
        color: #f7f7f7;
      }

      label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }

      input[type="text"],
      input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
      }

      input[type="submit"] {
    display: block;
    width: 100%;
    background-color: green;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: blue;
}
.register-button {
    width: 100%;
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.register-button:hover {
    background-color: blue;
}
    </style>
    
<body>
	<form action="userlogin.php" method="post">
    <div class="logo"> 
      <img src="images/images.jpg" alt="">
    </div>
		<label for="username">Username:</label>
		<input type="text" name="username" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br><br>

    
		<input type="submit" value="Login"><br><br>
  <p>Don't have an account? Register!!<p>
    <a href="usignup.php" class="register-button">Register</a>
	</form>
    
</body>
</html>

