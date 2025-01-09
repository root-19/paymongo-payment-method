<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMongo Payment</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-500 min-h-screen flex justify-center items-center backdrop-blur-md">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Pay your Tuition fee 7,000 pesos</h2>

        <form action="payment.php" method="POST" class="space-y-4">
            <div>
                <label for="amount" class="block text-lg text-gray-700">Amount (PHP):</label>
                <input type="number" name="amount" required class="w-full px-4 py-2 text-lg border-b-2 border-gray-300 outline-none focus:border-teal-500 transition duration-300" placeholder="Enter amount">
            </div>
            <button type="submit" class="w-full py-3 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-500 transition duration-300">Pay Now</button>
        </form>
    </div>

</body>
</html>
