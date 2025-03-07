<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 flex justify-center items-center min-h-screen p-6">

    <div class="max-w-lg w-full bg-gray-800 p-6 rounded-lg shadow-lg">

        <h1 class="text-2xl font-bold text-white text-center mb-4">Edit Product</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Edit Product Form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-300 font-bold mb-1">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}"
                    class="w-full border border-gray-600 bg-gray-700 text-white p-2 rounded focus:ring focus:ring-blue-400">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
<div class="mb-4">
                <label class="block text-gray-300 font-bold mb-1">Price</label>
                <input type="number" name="price" value="{{ $product->price }}"
                    class="w-full border border-gray-600 bg-gray-700 text-white p-2 rounded focus:ring focus:ring-blue-400">
                @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-all">
                    Update Product
                </button>
                <a href="{{ route('products.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition-all">
                    Cancel
                </a>
            </div>
            <p> change 1 </p>
        </form>
    </div>

</body>

</html>