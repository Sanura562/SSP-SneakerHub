<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php require '../utils/navbar.php'; ?>

    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-900 mb-6">SneakerHub</h1>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            include '../utils/db.php';
            $query = "SELECT * FROM Product";
            $result = $conn->query($query);

            while ($product = $result->fetch_assoc()): ?>
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <img src="<?php echo $product['Thumbnail_IMG']; ?>" alt="<?php echo $product['Name']; ?>"
                    class="rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-900"><?php echo $product['Name']; ?></h3>
                <p class="text-gray-700 font-semibold">$<?php echo $product['Price']; ?></p>
                <p class="text-gray-500 text-sm mb-4"><?php echo $product['Category']; ?></p>
                <button onclick="addToCart(<?php echo $product['ProductID']; ?>)"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-600 mb-2">
                    Add to Cart
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full hover:bg-green-600">
                    Buy Now
                </button>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Notification Message -->
    <div id="notification" class="hidden fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
        Product added to cart!
    </div>

    <script>
    function addToCart(productID) {
        fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + productID
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('notification').classList.remove('hidden');
                    setTimeout(() => {
                        document.getElementById('notification').classList.add('hidden');
                    }, 2000);
                } else {
                    alert(data.error);
                }
            });
    }
    </script>
</body>

</html>