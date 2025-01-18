<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php require '../utils/navbar.php'; ?>

    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-900 mb-6">SneakerHub</h1>

        <!-- Filter Dropdown -->
        <div class="flex justify-start mb-6">
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md shadow">
                All ⌄
            </button>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <!-- Product 1 -->
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="../src/images/Nike.webp" alt="Air Jordan 1 Mid" class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Air Jordan 1 Mid</h3>
                <p class="text-gray-700 font-semibold">$103.97</p>
                <p class="text-gray-500 text-sm mb-4">Women's Shoes</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="../src/images/Nike Air3.png" alt="Nike Air Force 1 High" class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Nike Air Force 1 High</h3>
                <p class="text-gray-700 font-semibold">$103.97</p>
                <p class="text-gray-500 text-sm mb-4">Men's Shoes</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="../src/images/Cream Nike.webp" alt="Nike Free Metcon 6" class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Nike Free Metcon 6</h3>
                <p class="text-gray-700 font-semibold">$120</p>
                <p class="text-gray-500 text-sm mb-4">Men's Shoes</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="../src/images/Jordanized Nike.png" alt="KD17 'Aunt Pearl'" class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900">KD17 "Aunt Pearl"</h3>
                <p class="text-gray-700 font-semibold">$160</p>
                <p class="text-gray-500 text-sm mb-4">Men's Shoes</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>

            <!-- Product 5 -->
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="../src/images/Nike 2.png" alt="Nike Free Run 2018" class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Nike Free Run 2018</h3>
                <p class="text-gray-700 font-semibold">$70.97</p>
                <p class="text-gray-500 text-sm mb-4">Men's Shoes</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>

        </div>
    </div>

</body>

</html>