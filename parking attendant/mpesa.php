<?php

require_once 'vendor/autoload.php'; // include the Daraja SDK

use Carbon\Carbon;
use Safaricom\Mpesa\Mpesa;

// initialize Daraja SDK with your API key and secret
$mpesa = new Mpesa([
    'api_key' => 'YOUR_API_KEY',
    'api_secret' => 'YOUR_API_SECRET',
]);

// retrieve the necessary parameters from the client-side JavaScript request
$phoneNumber = $_POST['phone_number'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$time = Carbon::now()->format('YmdHis');

// initiate STK push request using the Daraja SDK
$response = $mpesa->STKPush([
    'BusinessShortCode' => 'YOUR_BUSINESS_SHORTCODE',
    'Amount' => $amount,
    'PhoneNumber' => $phoneNumber,
    'CallBackURL' => 'https://example.com/callback', // replace with your callback URL
    'AccountReference' => $description,
    'TransactionDesc' => $description,
    'Timestamp' => $time,
    'TransactionType' => 'CustomerPayBillOnline',
    'PassKey' => 'YOUR_PASSKEY',
]);

// check the response and display success or error message
if ($response['ResponseCode'] == '0') {
    echo json_encode(['status' => 'success', 'message' => 'STK push request sent']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'STK push request failed']);
}
?>