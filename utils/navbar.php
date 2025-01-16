<script src="https://cdn.tailwindcss.com"></script>




<nav class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo -->
        <a href="index.php" class="text-2xl font-bold hover:text-gray-400">SneakerHub</a>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-4">
            <a href="../pages/Home.php" class="hover:text-gray-400">Home</a>
            <a href="../pages/products.php" class="hover:text-gray-400">Products</a>
            <a href="../pages/About.php" class="hover:text-gray-400">About</a>
            <a href="contact.php" class="hover:text-gray-400">Contact</a>
        </div>

        <!-- User Actions -->
        <div class="hidden md:flex space-x-4">
            <a href="login.php" class="hover:text-gray-400">Login</a>
            <a href="register.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Sign Up</a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="block md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-700">
        <a href="index.php" class="block px-4 py-2 hover:bg-gray-600">Home</a>
        <a href="products.php" class="block px-4 py-2 hover:bg-gray-600">Products</a>
        <a href="about.php" class="block px-4 py-2 hover:bg-gray-600">About</a>
        <a href="contact.php" class="block px-4 py-2 hover:bg-gray-600">Contact</a>
        <a href="login.php" class="block px-4 py-2 hover:bg-gray-600">Login</a>
        <a href="register.php" class="block px-4 py-2 bg-blue-500 text-center text-white">Sign Up</a>
    </div>
</nav>

<script>
// Mobile Menu Toggle
const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
</script>