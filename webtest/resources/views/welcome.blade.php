<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="bg-gradient-to-r from-gray-900 to-gray-800 text-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="text-center bg-gray-900 p-8 rounded-lg shadow-lg max-w-md">
        <h1 class="text-4xl font-bold mb-4">👋 Welcome!</h1>
        <p class="text-lg text-gray-300">Click below to view our products.</p>
        <a href="{{ route('products.index') }}"
            class="mt-6 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-600 transition">
            View Products →
        </a>
    </div>
</body>

</html>