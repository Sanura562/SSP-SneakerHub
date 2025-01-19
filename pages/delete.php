<?php
session_start();
require '../utils/db.php'; // Include database connection

// ✅ Ensure only admins can access this page
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: Login.php?error=Access denied.");
    exit();
}

// ✅ Fetch all products from the database
$query = "SELECT * FROM Product";
$products = $conn->query($query);

if (!$products) {
    die("Query failed: " . $conn->error);
}

// ✅ Handle product deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productID'])) {
    $productID = intval($_POST['productID']);

    // Delete product images first (if you have an image table)
    $conn->query("DELETE FROM Product_IMGs WHERE ProductID = $productID");

    // Delete product from the database
    $sql = "DELETE FROM Product WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);

    if ($stmt->execute()) {
        header("Location: delete.php?success=Product deleted successfully.");
        exit();
    } else {
        header("Location: delete.php?error=Error deleting product.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center text-red-600 mb-6">Delete Products</h1>

        <!-- ✅ Success/Error Messages -->
        <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
        <?php endif; ?>

        <!-- ✅ Products Table -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-4">Product List</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 p-2">ID</th>
                        <th class="border border-gray-400 p-2">Name</th>
                        <th class="border border-gray-400 p-2">Price</th>
                        <th class="border border-gray-400 p-2">Stock</th>
                        <th class="border border-gray-400 p-2">Brand</th>
                        <th class="border border-gray-400 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = $products->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-400 p-2"><?php echo $product['ProductID']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['Name']; ?></td>
                        <td class="border border-gray-400 p-2">$<?php echo $product['Price']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['StockQuantity']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['Brand']; ?></td>
                        <td class="border border-gray-400 p-2">
                            <!-- ✅ Delete Button -->
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="productID" value="<?php echo $product['ProductID']; ?>">
                                <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
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