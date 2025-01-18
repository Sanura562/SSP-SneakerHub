<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
        <h2 class="text-center text-xl font-semibold mb-6">Checkout</h2>

        <!-- Delivery Options -->
        <div>
            <h3 class="font-semibold mb-2">Delivery Options</h3>
            <div class="flex gap-4 mb-6">
                <button class="flex-1 p-3 border rounded-lg flex items-center justify-center gap-2">
                    <span>&#128666;</span> Cash On Delivery
                </button>
                <button class="flex-1 p-3 border rounded-lg flex items-center justify-center gap-2">
                    <span>&#127968;</span> Pick Up
                </button>
            </div>
        </div>
        <!-- Delivery Details -->
        <div class="space-y-4">
            <input type="email" placeholder="Email" class="w-full p-3 border rounded-lg">
            <div class="flex gap-4">
                <input type="text" placeholder="First Name" class="w-1/2 p-3 border rounded-lg">
                <input type="text" placeholder="Last Name" class="w-1/2 p-3 border rounded-lg">
            </div>
            <input type="text" placeholder="Address" class="w-full p-3 border rounded-lg">
            <input type="text" placeholder="Phone Number" class="w-full p-3 border rounded-lg">
        </div>

        <!-- Payment Section -->
        <div class="mt-6">
            <h3 class="font-semibold mb-2">Payment</h3>
            <input type="text" placeholder="Card Number" class="w-full p-3 border rounded-lg mb-4">
            <div class="flex gap-4">
                <input type="text" placeholder="MM/YY" class="w-1/2 p-3 border rounded-lg">
                <input type="text" placeholder="CVV" class="w-1/2 p-3 border rounded-lg">
            </div>
            <input type="text" placeholder="Full Name" class="w-full p-3 border rounded-lg mt-4">
            <button class="w-full bg-black text-white p-3 rounded-lg mt-4">Pay Now</button>
        </div>
    </div>
</body>

</html>