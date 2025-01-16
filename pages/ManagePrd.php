<?php
session_start();
include '../utils/db.php'; // Database connection

// Ensure only admins can access this page
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: Login.php?error=Access denied.");
    exit();
}

$conn = new mysqli("localhost", "root", "root", "sneaker_hub");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD Operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    // Add Product
    if ($action === 'add') {
        $name = htmlspecialchars($_POST['Name']);
        $description = htmlspecialchars($_POST['Description']);
        $price = floatval($_POST['Price']);
        $stockQuantity = intval($_POST['StockQuantity']);
        $brand = htmlspecialchars($_POST['Brand']);
        $category = htmlspecialchars($_POST['Category']);
        $discountPrice = floatval($_POST['Discount_Price']);

        $sql = "INSERT INTO Product (Name, Description, Price, StockQuantity, Brand, Category, Discount_Price) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdisds", $name, $description, $price, $stockQuantity, $brand, $category, $discountPrice);
        $stmt->execute();
        header("Location: ManageProducts.php?success=Product added successfully.");
        exit();
    }

    // Update Product
    if ($action === 'update') {
        $productID = intval($_POST['productID']);
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $price = floatval($_POST['price']);
        $stockQuantity = intval($_POST['stockQuantity']);
        $brand = htmlspecialchars($_POST['brand']);
        $category = htmlspecialchars($_POST['category']);
        $discountPrice = floatval($_POST['discountPrice']);

        $sql = "UPDATE Product 
                SET Name = ?, Description = ?, Price = ?, StockQuantity = ?, Brand = ?, Category = ?, Discount_Price = ? 
                WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdisdsi", $name, $description, $price, $stockQuantity, $brand, $category, $discountPrice, $productID);
        $stmt->execute();
        header("Location: ManageProducts.php?success=Product updated successfully.");
        exit();
    }

    // Delete Product
    if ($action === 'delete') {
        $productID = intval($_POST['productID']);
        $sql = "DELETE FROM Product WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        header("Location: ManageProducts.php?success=Product deleted successfully.");
        exit();
    }
}

// Fetch all products for display
$products = $conn->query("SELECT * FROM Product");
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Manage Products</h1>

        <!-- Success/Error Messages -->
        <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
        <?php endif; ?>

        <!-- Add Product Form -->
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-2xl font-bold mb-4">Add Product</h2>
            <form action="ManageProducts.php" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="add">
                <input type="text" name="name" placeholder="Product Name" class="w-full p-3 border rounded" required>
                <textarea name="description" placeholder="Product Description" class="w-full p-3 border rounded"
                    required></textarea>
                <input type="number" step="0.01" name="price" placeholder="Price" class="w-full p-3 border rounded"
                    required>
                <input type="number" name="stockQuantity" placeholder="Stock Quantity" class="w-full p-3 border rounded"
                    required>
                <input type="text" name="brand" placeholder="Brand" class="w-full p-3 border rounded" required>
                <input type="text" name="category" placeholder="Category" class="w-full p-3 border rounded" required>
                <input type="number" step="0.01" name="discountPrice" placeholder="Discount Price (Optional)"
                    class="w-full p-3 border rounded">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add
                    Product</button>
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-4">Product List</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Name</th>
                        <th class="border border-gray-300 p-2">Price</th>
                        <th class="border border-gray-300 p-2">Stock</th>
                        <th class="border border-gray-300 p-2">Brand</th>
                        <th class="border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = $products->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 p-2"><?php echo $product['ProductID']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $product['Name']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $product['Price']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $product['StockQuantity']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $product['Brand']; ?></td>
                        <td class="border border-gray-300 p-2">
                            <!-- Delete Button -->
                            <form action="ManageProducts.php" method="POST" class="inline">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="productID" value="<?php echo $product['ProductID']; ?>">
                                <button class="text-red-500 hover:underline">Delete</button>
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