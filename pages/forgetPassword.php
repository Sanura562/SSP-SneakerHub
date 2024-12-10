<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-80 bg-gray-200 p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-xl font-bold mb-4">Forget Password</h1>
        <form action="password-reset-handler.php" method="POST" class="space-y-4">
            <label for="email" class="block text-left font-semibold">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Enter your email"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <button type="submit" class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                Reset Password
            </button>
        </form>
    </div>
</body>

</html>