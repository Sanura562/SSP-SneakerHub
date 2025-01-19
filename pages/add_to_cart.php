<?php
session_start();
require '../utils/db.php'; // Database connection

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Please login first."]);
    exit();
}

$userID = $_SESSION['user_id'];
$productID = intval($_POST['product_id']);
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// Check if the user has a cart
$cartQuery = "SELECT CartID FROM Cart WHERE User_ID = ?";
$stmt = $conn->prepare($cartQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Create a new cart for the user
    $createCartQuery = "INSERT INTO Cart (User_ID, CreatedAt, UpdatedAt) VALUES (?, NOW(), NOW())";
    $stmt = $conn->prepare($createCartQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    $cartID = $conn->insert_id; // Get the new CartID
} else {
    $cartRow = $result->fetch_assoc();
    $cartID = $cartRow['CartID'];
}

// Check if the product is already in the cart
$checkItemQuery = "SELECT * FROM Cart_Item WHERE CartID = ? AND ProductID = ?";
$stmt = $conn->prepare($checkItemQuery);
$stmt->bind_param("ii", $cartID, $productID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update quantity if already exists
    $updateItemQuery = "UPDATE Cart_Item SET Quantity = Quantity + ?, Total_Price = (Quantity + ?) * Price WHERE CartID = ? AND ProductID = ?";
    $stmt = $conn->prepare($updateItemQuery);
    $stmt->bind_param("iiii", $quantity, $quantity, $cartID, $productID);
} else {
    // Get product price
    $productQuery = "SELECT Price FROM Product WHERE ProductID = ?";
    $stmt = $conn->prepare($productQuery);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $productResult = $stmt->get_result();
    $productRow = $productResult->fetch_assoc();
    $price = $productRow['Price'];
    $totalPrice = $price * $quantity;

    // Insert new cart item
    $insertItemQuery = "INSERT INTO Cart_Item (CartID, ProductID, Quantity, Price, Total_Price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertItemQuery);
    $stmt->bind_param("iiidd", $cartID, $productID, $quantity, $price, $totalPrice);
}

if ($stmt->execute()) {
    echo json_encode(["success" => "Product added to cart!"]);
} else {
    echo json_encode(["error" => "Could not add product to cart."]);
}
exit();
?>