<x-app-layout>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit product
                </h2>
                <p class="mb-4">Edit: {{$product->name}}</p>
            </header>

            <form method="POST" action="/dashboard/products/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ $product->name }}"
                    />

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="price" class="inline-block text-lg mb-2">Price</label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="price"
                        value="{{ $product->price }}"
                    />

                    @error('price')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">Product Image</label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                    />
                    <img class="w-48 mr-6 mb-6" src="{{$product->image}}" alt="Product image">

                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">Product Information</label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="What the product is made of, what it is used for, etc."

                    >{{ $product->description }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit Product</button>
                    <a href="/dashboard" class="text-black ml-4"> Back to dashboard </a>
                </div>
            </form>
        </div>

</x-app-layout>