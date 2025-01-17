<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="container mx-auto px-4 py-10">
        <!-- Product Display -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <!-- Main Product Image -->
            <div class="mb-6">
                <img src="https://via.placeholder.com/600x400" alt="Nike Air Max Pulse"
                    class="w-full rounded-lg shadow-md">
            </div>

            <!-- Thumbnail Images -->
            <div class="flex justify-center space-x-4 mb-6">
                <img src="https://via.placeholder.com/100" alt="Nike Air Max Side"
                    class="w-20 h-20 rounded-lg shadow cursor-pointer">
                <img src="https://via.placeholder.com/100" alt="Nike Air Max Bottom"
                    class="w-20 h-20 rounded-lg shadow cursor-pointer">
                <img src="https://via.placeholder.com/100" alt="Nike Air Max Back"
                    class="w-20 h-20 rounded-lg shadow cursor-pointer">
            </div>

            <!-- Product Information -->
            <h2 class="text-2xl font-bold text-gray-900">Nike Air Max Pulse</h2>
            <p class="text-lg font-semibold text-gray-700 mt-2">$89.97</p>

            <!-- Buttons -->
            <div class="flex justify-center space-x-4 mt-6">
                <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800">Buy</button>
                <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800">Add to Cart</button>
            </div>

            <!-- Size Selection -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800">Select size</h3>
                <div class="flex justify-center space-x-4 mt-2">
                    <button class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">S</button>
                    <button class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">M</button>
                    <button class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">L</button>
                    <button class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">XL</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>