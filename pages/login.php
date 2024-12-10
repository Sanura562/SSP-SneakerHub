<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-96 bg-gray-200 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">SneakerHub</h1>
        <h2 class="text-xl font-semibold mb-2">Login</h2>
        <p class="text-sm text-gray-600 mb-4">If you are already a member, easily log in now.</p>
        <form action="login.php" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                Login
            </button>
        </form>
        <div class="text-center my-4 text-gray-600">Or</div>
        <button onclick="window.location.href='signup.php';"
            class="w-full bg-gray-300 text-black py-3 rounded-lg hover:bg-gray-400 transition">
            Sign Up
        </button>
        <div class="text-right mt-4">
            <a onclick="forgetPassword.php" class="text-blue-500 hover:underline">Forgot Password?</a>
        </div>

    </div>
</body>

</html>