<?php
session_start();
include '../utils/db.php'; // Ensure database connection


// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php?error=Please login first.");
    exit();
}

$userID = $_SESSION['user_id'];

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $productID = intval($_POST['product_id']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    if ($_POST['action'] === 'add') {
        // Check if product is already in the cart
        $checkQuery = "SELECT * FROM Cart WHERE UserID = ? AND ProductID = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("ii", $userID, $productID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update quantity if already in cart
            $updateQuery = "UPDATE Cart SET Quantity = Quantity + ? WHERE UserID = ? AND ProductID = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("iii", $quantity, $userID, $productID);
        } else {
            // Insert new cart item
            $insertQuery = "INSERT INTO Cart (UserID, ProductID, Quantity) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("iii", $userID, $productID, $quantity);
        }
        if ($stmt->execute()) {
            header("Location: cart.php?success=Product added to cart.");
        } else {
            header("Location: cart.php?error=Could not add product to cart.");
        }
        exit();
    }

    // Handle Quantity Update
    if ($_POST['action'] === 'update') {
        $updateQuery = "UPDATE Cart SET Quantity = ? WHERE UserID = ? AND ProductID = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("iii", $quantity, $userID, $productID);

        if ($stmt->execute()) {
            header("Location: cart.php?success=Cart updated.");
        } else {
            header("Location: cart.php?error=Could not update cart.");
        }
        exit();
    }

    // Handle Remove from Cart
    if ($_POST['action'] === 'remove') {
        $deleteQuery = "DELETE FROM Cart WHERE UserID = ? AND ProductID = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("ii", $userID, $productID);

        if ($stmt->execute()) {
            header("Location: cart.php?success=Product removed from cart.");
        } else {
            header("Location: cart.php?error=Could not remove product.");
        }
        exit();
    }
}

// Fetch Cart Items
$cartQuery = "
    SELECT c.CartID, p.ProductID, p.Name, p.Price, c.Quantity, p.Thumbnail_IMG 
    FROM Cart c 
    JOIN Product p ON c.ProductID = p.ProductID 
    WHERE c.UserID = ?";
$stmt = $conn->prepare($cartQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$cartItems = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Cart</h1>
        <?php if ($cartItems->num_rows > 0): ?>
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Cart Items -->
            <div class="w-full md:w-2/3 bg-white p-6 rounded-lg shadow">
                <?php $total = 0; while ($item = $cartItems->fetch_assoc()): ?>
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <div class="flex items-center space-x-4">
                        <img src="<?php echo $item['Thumbnail_IMG']; ?>" class="w-20 h-20 rounded-lg shadow">
                        <div>
                            <h2 class="text-lg font-bold"><?php echo $item['Name']; ?></h2>
                            <p class="text-gray-600">$<?php echo number_format($item['Price'], 2); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $item['ProductID']; ?>">
                            <input type="hidden" name="action" value="update">
                            <input type="number" name="quantity" value="<?php echo $item['Quantity']; ?>" min="1"
                                class="w-12 text-center">
                            <button type="submit" class="bg-gray-300 px-3 py-1 rounded">Update</button>
                        </form>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $item['ProductID']; ?>">
                            <input type="hidden" name="action" value="remove">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Remove</button>
                        </form>
                    </div>
                </div>
                <?php $total += $item['Price'] * $item['Quantity']; endwhile; ?>
            </div>

            <!-- Order Summary -->
            <div class="w-full md:w-1/3 bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-bold">Summary</h2>
                <div class="flex justify-between">
                    <p>Subtotal</p>
                    <p>$<?php echo number_format($total, 2); ?></p>
                </div>
                <div class="flex justify-between mt-2">
                    <p>Shipping</p>
                    <p>Free</p>
                </div>
                <div class="flex justify-between font-bold mt-4">
                    <p>Total</p>
                    <p>$<?php echo number_format($total, 2); ?></p>
                </div>
                <a href="checkout.php" class="block bg-black text-white text-center py-3 rounded mt-4">Checkout</a>
            </div>
        </div>
        <?php else: ?>
        <p class="text-center text-gray-600">Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>

</html>