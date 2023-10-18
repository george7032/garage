<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_SESSION['amount'];
    $phone_number = $_POST['partyA'];

    // You can use $amount and $phone_number variables as needed in the code

    // Clear session variable
    unset($_SESSION['amount']);

    // Generate STK push request
    
 
    
      $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Authorization: Bearer NbsriwCLWOfadzipSE4odYB9tKqL',
          'Content-Type: application/json'
      ]);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
          "BusinessShortCode" => 174379,
          "Password" => "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMwMzI4MTAwOTI0",
          "Timestamp" => "20230328100924",
          "TransactionType" => "CustomerPayBillOnline",
          "Amount" => $amount,
          "PartyA" => $phone_number,
          "PartyB" => 174379,
          "PhoneNumber" => $phone_number,
          "CallBackURL" => "https://enw7413qvjebd.x.pipedream.net/",
          "AccountReference" => "VicDon parking",
          "TransactionDesc" => "Payment of X" 
      ]));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($ch);
      curl_close($ch);
      echo $response;
      

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
      <a class="active" href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
    <title>Payment</title>
</head>
<body>
    <style>
        /* Set the font and margin for the page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
  }
  
  /* Style the form container */
  form {
    width: 80%;
    max-width: 500px;
    margin: 2em auto;
    padding: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  /* Style the form labels and input fields */
  label {
    display: block;
    margin-bottom: 0.5em;
  }
  
  input[type="text"] {
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 1em;
    width: 100%;
    box-sizing: border-box;
  }
  
  /* Style the form button */
  input[type="submit"] {
    padding: 0.5em 1em;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 1em;
    transition: all 0.3s ease-in-out;
  }
  
  input[type="submit"]:hover {
    background-color: #0062cc;
  }
  
    </style>
    <h1>Payment</h1>
    <form method="post" action="Payment_page.php">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" value="<?php echo isset($_SESSION['amount']) ? $_SESSION['amount'] : ''; ?>" readonly>
        <br>
        <label for="partyA">Phone Number:</label>
        <input type="text" id="partyA" name="partyA" pattern="^254\d{9}$" required>
        <br>
        <input type="submit" value="Pay">
    </form>

</body>
</html>