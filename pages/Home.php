<?php require '../utils/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Main Container -->
    <div class="container mx-auto px-6">

        <!-- Header Section -->
        <header class="flex items-center justify-between py-4">
            <h1 class="text-3xl font-bold">SneakerHub</h1>
            <div class="flex items-center gap-4">
                <button class="text-gray-500 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A3 3 0 007 21h10a3 3 0 001.879-.804m2.121-12.65A9 9 0 1112 3v0a9 9 0 0111 8.5c0 1.174-.236 2.296-.68 3.317m-1.884-2.86A3 3 0 0019 9V7a3 3 0 00-5.86-1.27M15 10v6m-4-6v6m1-12h2m0 0h.01">
                        </path>
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h11m0 0l-4 4m4-4l-4-4M21 14H3M3 14l4 4M3 14l4-4"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Banner Section -->
        <div class="mt-6">
            <img src="../src/images/adidas-banner.jpg" alt="Adidas Banner" class="w-full rounded-lg shadow-md">
        </div>

        <!-- Latest Arrivals -->
        <section class="mt-10">
            <h2 class="text-2xl font-bold mb-4">Latest Arrivals</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/Nike Air white.webp" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Men's Shoes</p>
                    </div>
                </div>
                <!-- Repeat cards as needed -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/Cream Nike.webp" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/Jordanized Nike.png" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/rednike.png" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/NOIKE.webp" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="../src/images/JORDAN.jpg" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="https://via.placeholder.com/150" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="https://via.placeholder.com/150" alt="Shoe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Nike Air Max</h3>
                        <p class="text-gray-600">$103.97</p>
                        <p class="text-gray-500 text-sm mt-1">Women's Shoes</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
<footer><?php require '../utils/footer.php'; ?></footer>

</html>