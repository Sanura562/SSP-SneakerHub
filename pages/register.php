<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

            <!-- Display Error or Success Message -->
            <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <?php echo $error; ?>
            </div>
            <?php elseif (!empty($success)): ?>
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                <?php echo $success; ?>
            </div>
            <?php endif; ?>

            <form action="register.php" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                    Register
                </button>
            </form>
        </div>
    </div>
</body>
<?php
// Include database connection file
include '../utils/db.php';
 // Replace with your DB connection file

// Initialize variables for errors
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        try {
            $conn = dbConnect(); // Assuming dbConnect() returns the connection object
            $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $name, $email, $hashed_password);

            if ($stmt->execute()) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>


</html>