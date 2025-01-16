<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php require '../utils/navbar.php'; ?>

    <!-- Main Container -->
    <div class="container mx-auto py-10 px-6">
        <h1 class="text-4xl font-bold text-center text-gray-900 mb-6">About SneakerHub</h1>

        <!-- About Section -->
        <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Story</h2>
                <p class="text-gray-600 leading-relaxed">
                    SneakerHub was founded with a passion for sneakers and a vision to bring the best footwear to
                    sneaker enthusiasts worldwide.
                    Our mission is to provide high-quality, stylish, and comfortable sneakers for every lifestyle.
                    Whether you're an athlete, a streetwear fan, or just someone who loves good shoes, we've got
                    something for you.
                </p>
            </div>
            <div class="md:w-1/2 mt-6 md:mt-0 flex justify-center">
                <img src="https://via.placeholder.com/400" alt="SneakerHub Store" class="rounded-lg shadow-md">
            </div>
        </div>

        <!-- Our Mission Section -->
        <div class="mt-10 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Our Mission</h2>
            <p class="text-gray-600 text-center leading-relaxed">
                At SneakerHub, we are dedicated to delivering a seamless shopping experience.
                Our goal is to ensure that every customer finds the perfect pair of sneakers that suits their style and
                needs.
                We strive to offer top brands, exclusive releases, and outstanding customer service.
            </p>
        </div>

        <!-- Team Section -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Team Member 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150" alt="Founder" class="rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">John Doe</h3>
                    <p class="text-gray-600">Founder & CEO</p>
                </div>


            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-10 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Get in Touch</h2>
            <p class="text-gray-600 text-center">
                Have any questions or feedback? Reach out to us anytime!
            </p>
            <div class="mt-4 flex justify-center">
                <a href="contact.html"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition">
                    Contact Us
                </a>
            </div>
        </div>

    </div>
    <footer><?php require '../utils/footer.php'; ?></footer>

</body>

</html>