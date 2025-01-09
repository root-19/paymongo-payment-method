<?php
class PaymentProcessor
{
    private $secretKey;
    private $apiUrl = "https://api.paymongo.com/v1/links";

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function createPaymentLink($amount, $description = "Sample Description", $remarks = "Sample Remarks", $checkoutUrl = "")
    {
        // Convert amount to centavos
        $amountInCentavos = $amount * 100;

        // Data for creating the payment link
        $data = [
            "data" => [
                "attributes" => [
                    "amount" => $amountInCentavos,
                    "currency" => "PHP",
                    "description" => $description,
                    "remarks" => $remarks,
                    "checkout_url" => $checkoutUrl
                ]
            ]
        ];

        // Initialize cURL for API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Basic " . base64_encode($this->secretKey . ":")
        ]);

        // Execute the cURL request and get the response
        $result = curl_exec($ch);
        curl_close($ch);

        // Decode the response
        $response = json_decode($result, true);

        if (isset($response['data']['attributes']['checkout_url'])) {
            // Return the checkout URL for redirect
            return $response['data']['attributes']['checkout_url'];
        } else {
            // Return the error response if the link wasn't created
            return "Error creating payment link: " . print_r($response, true);
        }
    }
}
?>
