<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    <div class="bg-black py-6 px-10 flex justify-between items-center">
        <h1 class="text-white text-2xl font-bold">SneakerHub</h1>
        <div class="flex items-center space-x-4">
            <button class="bg-gray-200 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-300">
                Logout
            </button>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="container mx-auto text-center py-10">
        <div class="flex justify-center">
            <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12a9 9 0 0118 0M3 12h18M3 12l9 9m0-18l9 9"></path>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold mt-4">Welcome <span class="text-black">User</span></h2>
    </div>

    <!-- User Profile Details -->
    <div class="container mx-auto bg-gray-200 p-8 rounded-lg shadow-lg w-3/4">
        <h3 class="text-xl font-semibold mb-4 text-center">User Profile</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-gray-700 font-semibold">Full Name</p>
                <div class="bg-gray-300 p-3 rounded mt-1"></div>
            </div>
            <div>
                <p class="text-gray-700 font-semibold">Email Address</p>
                <div class="bg-gray-300 p-3 rounded mt-1"></div>
            </div>
            <div>
                <p class="text-gray-700 font-semibold">Phone Number</p>
                <div class="bg-gray-300 p-3 rounded mt-1"></div>
            </div>
            <div>
                <p class="text-gray-700 font-semibold">Address</p>
                <div class="bg-gray-300 p-3 rounded mt-1"></div>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="container mx-auto mt-10 bg-gray-200 p-8 rounded-lg shadow-lg w-3/4">
        <h3 class="text-xl font-semibold mb-4 text-center">Last Five Orders</h3>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border border-gray-400 p-2">Shoe ID</th>
                    <th class="border border-gray-400 p-2">Product Name</th>
                    <th class="border border-gray-400 p-2">Status</th>
                    <th class="border border-gray-400 p-2">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-400 p-2">#8</td>
                    <td class="border border-gray-400 p-2">Nike Dunk</td>
                    <td class="border border-gray-400 p-2 text-green-600">✅ Confirmed</td>
                    <td class="border border-gray-400 p-2">2021/2/22</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">#8</td>
                    <td class="border border-gray-400 p-2">Nike Dunk</td>
                    <td class="border border-gray-400 p-2 text-green-600">✅ Confirmed</td>
                    <td class="border border-gray-400 p-2">2021/2/22</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">#8</td>
                    <td class="border border-gray-400 p-2">Nike Dunk</td>
                    <td class="border border-gray-400 p-2 text-green-600">✅ Confirmed</td>
                    <td class="border border-gray-400 p-2">2021/2/22</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">#8</td>
                    <td class="border border-gray-400 p-2">Nike Dunk</td>
                    <td class="border border-gray-400 p-2 text-green-600">✅ Confirmed</td>
                    <td class="border border-gray-400 p-2">2021/2/22</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">#8</td>
                    <td class="border border-gray-400 p-2">Nike Dunk</td>
                    <td class="border border-gray-400 p-2 text-green-600">✅ Confirmed</td>
                    <td class="border border-gray-400 p-2">2021/2/22</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>