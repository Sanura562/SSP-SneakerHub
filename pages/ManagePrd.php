<?php
session_start();
require "../../SSP/utils/db.php"; // ✅ Ensure correct database connection
// $servername = "localhost";
// $username = "root"; // Update with your DB username if needed
// $password = "root"; // Update with your DB password if needed
// $dbname = "sneaker_hub";

// // Create a connection to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// Ensure only admins can access this page
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: Login.php?error=Access denied.");
    exit();
}

// Handle CRUD Operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // 🔹 Add Product
    if ($action === 'add') {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $price = floatval($_POST['price']); 
        $stockQuantity = intval($_POST['stockQuantity']); 
        $brand = htmlspecialchars($_POST['brand']);
        $category = htmlspecialchars($_POST['category']);
        $discountPrice = isset($_POST['discountPrice']) ? floatval($_POST['discountPrice']) : NULL; // ✅ FIXED

        $sql = "INSERT INTO Product (Name, Description, Price, StockQuantity, Brand, Category, Discount_Price) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
if (!$conn) {
            die("Database connection error: \$conn is not initialized.");
        }

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL Preparation Error: " . $conn->error);
        }

        $stmt->bind_param("ssdissd", $name, $description, $price, $stockQuantity, $brand, $category, $discountPrice);
        
        if ($stmt->execute()) {
            header("Location: ManagePrd.php?success=Product added successfully.");
            exit();
        } else {
            header("Location: ManagePrd.php?error=Error adding product.");
            exit();
        }
    }
}

// Fetch all products for display
// $query = "SELECT * FROM Product";
// $products = $conn->query($query);

// if (!$products) {
//     die("Query failed: " . $conn->error); // Debugging message
// }
// $conn->close();
// ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php require '../utils/navbar.php'; ?>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Manage Products</h1>

        <!-- Success/Error Messages -->
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

        <!-- Add Product Form -->
        <form action="ManagePrd.php" method="POST" class="space-y-4">
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
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Product
            </button>
        </form>


        <!-- Products Table -->
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
                    <!-- <?php while ($product = $products->fetch_assoc()): ?> -->
                    <tr>
                        <td class="border border-gray-400 p-2"><?php echo $product['ProductID']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['Name']; ?></td>
                        <td class="border border-gray-400 p-2">$<?php echo $product['Price']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['StockQuantity']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $product['Brand']; ?></td>
                        <td class="border border-gray-400 p-2 flex space-x-2">
                            <!-- Delete Button -->
                            <form action="ManageProducts.php" method="POST" class="inline">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="productID" value="<?php echo $product['ProductID']; ?>">
                                <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                            <!-- Update Button -->
                            <button
                                onclick="editProduct('<?php echo $product['ProductID']; ?>', '<?php echo $product['Name']; ?>', '<?php echo $product['Description']; ?>', '<?php echo $product['Price']; ?>', '<?php echo $product['StockQuantity']; ?>', '<?php echo $product['Brand']; ?>', '<?php echo $product['Category']; ?>', '<?php echo $product['Discount_Price']; ?>')"
                                class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600">Edit</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript for Editing Products -->
    <script>
    function editProduct(id, name, description, price, stock, brand, category, discount) {
        document.querySelector('input[name="action"]').value = "update";
        document.querySelector('input[name="productID"]').value = id;
        document.querySelector('input[name="name"]').value = name;
        document.querySelector('textarea[name="description"]').value = description;
        document.querySelector('input[name="price"]').value = price;
        document.querySelector('input[name="stockQuantity"]').value = stock;
        document.querySelector('input[name="brand"]').value = brand;
        document.querySelector('input[name="category"]').value = category;
        document.querySelector('input[name="discountPrice"]').value = discount;
    }
    </script>
</body>

</html>