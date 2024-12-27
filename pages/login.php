<?php
session_start();

// Database credentials (replace with your actual database credentials)
$servername = "localhost";
$username = "root";  // Change this to your DB username
$password = "root";      // Change this to your DB password
$dbname = "sneaker_hub";  // Replace with your DB name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // SQL query to check if the user exists with the entered email
    $sql = "SELECT * FROM users WHERE email = ?";  // Adjust 'users' table name as necessary
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, verify password
            $user = $result->fetch_assoc();

            // Use password_verify if the password is hashed (recommended)
            if (password_verify($password, $user['password'])) {
                // Set session variables on successful login
                $_SESSION['user'] = $user['email'];  // Store email in session or any other user data
                header("Location: Home.php");  // Redirect to home page
                exit();
            } else {
                // Invalid password
                header("Location: Login.php?error=Invalid email or password.");
                exit();
            }
        } else {
            // No user found with the entered email
            header("Location: Login.php?error=Invalid email or password.");
            exit();
        }
    } else {
        // Handle SQL prepare error
        die("SQL preparation failed: " . $conn->error);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-600">SneakerHub</h1>
        <h2 class="text-xl font-semibold mb-2 text-gray-800">Login</h2>
        <p class="text-sm text-gray-600 mb-4">If you are already a member, log in to access your account.</p>

        <!-- Display success message -->
        <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
        <?php endif; ?>

        <!-- Display error message if login fails -->
        <?php if (isset($_GET['error'])): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="Login.php" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                Login
            </button>
        </form>

        <!-- Or Divider -->
        <div class="flex items-center my-6">
            <div class="border-t border-gray-300 flex-grow"></div>
            <span class="mx-4 text-gray-500">Or</span>
            <div class="border-t border-gray-300 flex-grow"></div>
        </div>

        <!-- Sign Up Button -->
        <button onclick="window.location.href='register.php';"
            class="w-full bg-gray-300 text-black py-3 rounded-lg hover:bg-gray-400 transition">
            Sign Up
        </button>

        <!-- Forgot Password -->
        <div class="text-right mt-4">
            <a href="forgotPassword.php" class="text-red-500 hover:underline">Forgot Password?</a>
        </div>
    </div>
</body>

</html>