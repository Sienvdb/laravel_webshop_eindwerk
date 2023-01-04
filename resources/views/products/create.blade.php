<x-app-layout>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Add a product
                </h2>
                <p class="mb-4">Add a product to the shop.</p>
            </header>

            <form action="">
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                    />
                </div>

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Price</label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="price"
                    />
                </div>

                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">Quantity</label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="quantity"
                    />
                </div>

                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">Product Image</label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                    />
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">Product Information</label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="What the product is made of, what it is used for, etc."
                    ></textarea>
                </div>

                <div class="mb-6">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
                    <a href="/dashboard" class="text-black ml-4"> Back to dashboard </a>
                </div>
            </form>
        </div>

</x-app-layout>