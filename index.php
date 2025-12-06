<?php
// index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RoForgeIDE - Transliterate JavaScript or PHP to Lua for Roblox game development.">
    <title>RoForgeIDE - Build Roblox Games in Your Language</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts (Optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons (Optional) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="bg-gray-900 text-white font-roboto">
    <!-- Header Section -->
    <header class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="text-3xl font-bold text-blue-400">RoForgeIDE</a>
            <nav class="space-x-6">
                <a href="#features" class="hover:text-blue-400">Features</a>
                <a href="https://github.com/RoForgeIDE/Libraries" class="hover:text-blue-400">Libraries</a>
                <a href="#contact" class="hover:text-blue-400">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-900 text-center py-16">
        <div class="container mx-auto">
            <h1 class="text-4xl sm:text-6xl font-bold text-blue-400 leading-tight">
                Create Roblox Games with Languages You Know
            </h1>
            <p class="text-xl text-gray-300 mt-4 mb-8">
                RoForgeIDE lets you transliterates languages such as JavaScript or PHP code into Lua for Roblox game development.
            </p>
            <a href="https://github.com/RoForgeIDE/Libraries" class="bg-blue-500 text-white px-8 py-3 rounded-lg text-xl hover:bg-blue-600 transition">
                Explore Libraries
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-800">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-semibold text-white mb-12">
                Key Features of RoForgeIDE
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-400">Simple Language Transliteration</h3>
                    <p class="mt-4 text-gray-300">Write code in Popular Languages such as JavaScript or PHP, and RoForgeIDE will convert it into Roblox Lua for seamless game development.</p>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-400">Custom Libraries for Ease of Use</h3>
                    <p class="mt-4 text-gray-300">Access a range of custom libraries built specifically to ease the transition from popular languages to Roblox Lua.</p>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-400">Real-Time Preview</h3>
                    <p class="mt-4 text-gray-300">See your code transliterated in real-time as you code, with immediate feedback for debugging and optimization.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Libraries Section -->
    <section id="libraries" class="py-16 bg-gray-900">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-semibold text-white mb-12">
                Explore Our Custom Libraries
            </h2>
            <p class="text-lg text-gray-300 mb-8">
                RoForgeIDE provides a unique set of libraries that enable easy code translation between JavaScript/PHP and Lua.
            </p>
            <a href="https://github.com/RoForgeIDE/Libraries" class="bg-blue-500 text-white px-8 py-3 rounded-lg text-xl hover:bg-blue-600 transition">
                View Libraries on GitHub
            </a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer id="contact" class="bg-gray-800 py-8 text-center text-gray-400">
        <div class="container mx-auto">
            <p>&copy; 2025 RoForgeIDE. All Rights Reserved.</p>
            <p class="mt-2">
                <a href="https://github.com/RoForgeIDE" class="text-blue-400 hover:underline">GitHub</a> |
                <a href="mailto:support@roforgeide.com" class="text-blue-400 hover:underline">Contact Us</a>
            </p>
        </div>
    </footer>

</body>
</html>
