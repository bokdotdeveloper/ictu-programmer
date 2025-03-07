<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="bg-gradient-to-r from-gray-900 to-gray-800 text-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-gray-900 p-6 rounded-lg shadow-lg">
        <!-- Back to Home -->
        <a href="{{ url('/') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
            ← Back
        </a>

        <h1 class="text-3xl font-bold text-center mt-4 mb-6">📦 Product List</h1>

        <!-- Display Products in Table -->
        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-md">
            <table class="w-full border-collapse text-gray-200">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                            <td class="py-3 px-4">{{ $product->name }}</td>
                            <td class="py-3 px-4">${{ $product->price }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Simple List of Product Names -->
        <h2 class="text-xl font-bold mt-6 mb-2">📝 Product Names</h2>
        <ul class="space-y-2">
            @foreach ($products as $product)
                <li class="bg-gray-700 p-3 rounded-lg flex justify-between items-center">
                    <span>{{ $product->name }}</span>
                    <span class="text-green-400 font-bold">${{ $product->price }}</span>
                </li>
            @endforeach
        </ul>

        <!-- Add New Product -->
        <h2 class="text-xl font-bold mt-8">➕ Add New Product</h2>
        <form id="productForm" action="{{ route('products.store') }}" method="POST" class="mt-4 space-y-4">
            @csrf
            <div>
                <label class="block text-gray-300 mb-1">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full border border-gray-600 bg-gray-800 text-white p-3 rounded-md focus:ring focus:ring-blue-500 outline-none">
                <p id="nameError" class="text-red-400 text-sm hidden">Product name is required.</p>
            </div>
            <div>
                <label class="block text-gray-300 mb-1">Price</label>
                <input type="number" name="price" id="price"
                    class="w-full border border-gray-600 bg-gray-800 text-white p-3 rounded-md focus:ring focus:ring-blue-500 outline-none">
                <p id="priceError" class="text-red-400 text-sm hidden">Price must be a positive number.</p>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                Add Product
            </button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productForm = document.getElementById("productForm");
            const nameInput = document.getElementById("name");
            const priceInput = document.getElementById("price");
            const nameError = document.getElementById("nameError");
            const priceError = document.getElementById("priceError");

            productForm.addEventListener("submit", function (event) {
                let isValid = true;

                if (nameInput.value.trim() === "") {
                    nameError.classList.remove("hidden");
                    isValid = false;
                } else {
                    nameError.classList.add("hidden");
                }

                if (priceInput.value.trim() === "" || parseFloat(priceInput.value) <= 0) {
                    priceError.classList.remove("hidden");
                    isValid = false;
                } else {
                    priceError.classList.add("hidden");
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission
                }
            });

            // Confirm delete action
            document.querySelectorAll(".delete-form").forEach(form => {
                form.addEventListener("submit", function (event) {
                    if (!confirm("Are you sure you want to delete this product?")) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>

</body>

</html>