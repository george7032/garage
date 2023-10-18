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

  // Hash password for security (replace with your own hashing function)
  //$hashed_password = hash("sha256", $password);

  // Insert user into database
  $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
  if ($conn->query($sql) === TRUE) {
    // Redirect to home page on success
    header("Location: userlogin.php");
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
    <title>Admin Sign Up</title>
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

      form {
        background-color: rgba(119, 125, 151, 0.747);
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

      .signup-button {
    display: block;
    width: 100%;
    background-color: green;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.signup-button:hover {
    background-color: blue;
}
    </style>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<form action="usignup.php" method="post">
    <div class="logo">
      <img src="images/images.jpg" alt="">
    </div>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="confirm-password">Confirm Password:</label>
  <input type="password" id="confirm-password" name="confirm-password" required>
  <p class="form-text text-muted mb-3">
   By registering you agree with our terms and condition!!!
  </p>
  <input type="submit" value="Sign Up" class="signup-button">
  <br><br>
  
</form>
</body>

</html>
