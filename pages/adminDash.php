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
    <?php require '../utils/navbar.php'; ?>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white min-h-screen">
            <div class="p-4 text-center font-bold text-2xl">
                Admin Dashboard
            </div>
            <nav class="mt-6">
                <ul>
                    <li><a href="AdminDashboard.php" class="block p-4 hover:bg-blue-700">Dashboard</a></li>
                    <li><a href="ManagePrd.php" class="block p-4 hover:bg-blue-700">Manage Products</a></li>
                    <li><a href="ViewOrders.php" class="block p-4 hover:bg-blue-700">View Orders</a></li>
                    <li><a href="Logout.php" class="block p-4 hover:bg-blue-700">Logout</a></li>
                    <li><a href="../pages/delete.php" class="block p-4 hover:bg-blue-700">Delete Products</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Welcome, Admin</h1>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                    <p class="text-2xl font-bold"><?php echo $totalUsers; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2">Total Products</h2>
                    <p class="text-2xl font-bold"><?php echo $totalProducts; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2">Recent Orders</h2>
                    <ul class="space-y-2">
                        <?php foreach ($recentOrders as $order): ?>
                        <li>
                            <span class="font-semibold">Order #<?php echo $order['id']; ?>:</span>
                            <?php echo $order['user']; ?> -
                            <?php echo $order['amount']; ?> -
                            <span
                                class="<?php echo $order['status'] === 'Completed' ? 'text-green-500' : ($order['status'] === 'Pending' ? 'text-yellow-500' : 'text-red-500'); ?>">
                                <?php echo $order['status']; ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>

</html>