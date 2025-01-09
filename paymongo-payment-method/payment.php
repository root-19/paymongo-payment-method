<?php
// Include the PaymentProcessor class
require_once 'PaymentProcessor.php';

// Replace with your PayMongo Secret Key
$secretKey = "sk...";

// Create a PaymentProcessor instance
$paymentProcessor = new PaymentProcessor($secretKey);

// Collect form data
$amount = $_POST['amount']; // Amount in PHP

// Create payment link
$checkoutUrl = $paymentProcessor->createPaymentLink($amount);

// Redirect to the checkout URL if successful
if (filter_var($checkoutUrl, FILTER_VALIDATE_URL)) {
    header("Location: " . $checkoutUrl);
    exit();
} else {
    // Display error if payment link creation failed
    echo $checkoutUrl;
}
?>
