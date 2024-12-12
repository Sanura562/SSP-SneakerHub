<script src="https://cdn.tailwindcss.com"></script>

<footer class="bg-gray-800 text-white">
    <div class="container mx-auto py-8 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- About Section -->
            <div>
                <h3 class="text-xl font-bold mb-2">About SneakerHub</h3>
                <p class="text-gray-400">
                    SneakerHub is your one-stop destination for buying and selling premium sneakers online.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-2">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="hover:text-gray-400">Home</a></li>
                    <li><a href="products.php" class="hover:text-gray-400">Products</a></li>
                    <li><a href="about.php" class="hover:text-gray-400">About</a></li>
                    <li><a href="contact.php" class="hover:text-gray-400">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div>
                <h3 class="text-xl font-bold mb-2">Contact Us</h3>
                <p class="text-gray-400">Email: support@sneakerhub.com</p>
                <p class="text-gray-400">Phone: +123 456 7890</p>
                <p class="text-gray-400">Address: 123 Sneaker Street, Fashion City</p>
            </div>
        </div>

        <div class="text-center mt-8 text-gray-400">
            © <?php echo date('Y'); ?> SneakerHub. All rights reserved.
        </div>
    </div>
</footer>