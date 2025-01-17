<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Redirect to login page or home page if not an admin
    header("Location: Login.php?error=Access denied.");
    exit();
}

// Example data for the dashboard (replace with database queries as needed)
$totalUsers = 120; // Replace with a database query to count users
$totalProducts = 45; // Replace with a database query to count products
$recentOrders = [
    ['id' => 1, 'user' => 'John Doe', 'amount' => '$120.00', 'status' => 'Completed'],
    ['id' => 2, 'user' => 'Jane Smith', 'amount' => '$80.00', 'status' => 'Pending'],
    ['id' => 3, 'user' => 'Sam Wilson', 'amount' => '$50.00', 'status' => 'Cancelled'],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>
        <a href="logout.php" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</a>
    </div>

    <div class="container mx-auto py-8 px-6">
        <!-- Success/Error Messages -->
        <?php if (isset($success)): ?>
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Add Image Section -->
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h2 class="text-xl font-bold mb-4">Add Image</h2>
            <form action="AdminDashboard.php" method="POST" class="space-y-4">
                <div>
                    <label for="product_id" class="block font-semibold">Product ID</label>
                    <input type="number" name="product_id" id="product_id" class="w-full p-3 border rounded" required>
                </div>
                <div>
                    <label for="img_url" class="block font-semibold">Image URL</label>
                    <input type="text" name="img_url" id="img_url" class="w-full p-3 border rounded" required>
                </div>
                <div>
                    <label for="alt_text" class="block font-semibold">Alt Text</label>
                    <input type="text" name="alt_text" id="alt_text" class="w-full p-3 border rounded">
                </div>
                <button type="submit" name="upload_image"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload Image</button>
            </form>
        </div>

        <!-- Images Section -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Uploaded Images</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 p-2">ID</th>
                        <th class="border border-gray-400 p-2">Product ID</th>
                        <th class="border border-gray-400 p-2">Image</th>
                        <th class="border border-gray-400 p-2">Alt Text</th>
                        <th class="border border-gray-400 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($image = $images->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-400 p-2"><?php echo $image['ID']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $image['ProductID']; ?></td>
                        <td class="border border-gray-400 p-2">
                            <img src="<?php echo $image['IMG_URL']; ?>" alt="<?php echo $image['AltText']; ?>"
                                class="w-20 h-20 rounded">
                        </td>
                        <td class="border border-gray-400 p-2"><?php echo $image['AltText']; ?></td>
                        <td class="border border-gray-400 p-2">
                            <form action="delete_image.php" method="POST" class="inline">
                                <input type="hidden" name="image_id" value="<?php echo $image['ID']; ?>">
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>