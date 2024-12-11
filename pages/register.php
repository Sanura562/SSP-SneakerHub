<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-96 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">SneakerHub</h1>
        <h2 class="text-xl font-semibold mb-4">Register</h2>
        <form action="register-handler.php" method="POST" class="space-y-4">
            <input type="text" name="name" placeholder="Name"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <button type="submit" class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                Register
            </button>
        </form>
    </div>
</body>

</html>