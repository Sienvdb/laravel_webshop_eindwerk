<x-app-layout>
    @if(Auth::check())
        <a href="/dashboard" class="inline-block font-bold text-red-600 ml-4 mb-4">&larr; Back</a>
    @endif

    @if(!Auth::check())
        <a href="/" class="inline-block font-bold text-red-600 ml-4 mb-4">&larr; Back</a>
    @endif
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <h2 class="text-2xl font-bold uppercase mb-6 text-red-600 flex justify-center">
                {{$product->name}} 
            </h2>
            <img class="w-48 mr-6 mb-6 flex items-center justify-center" src="{{$product->image ? asset('storage/' . $product->image) : '/images/default.jpg'}}" alt="Product image">
            <p class="text-black mb-4">
                &euro;{{$product->price}}
            </p>
            <p class="text-black mb-4">
                {{$product->description}}
            </p>
            
            <div class="mb-3">
                <h4 class="text-sm">Posted by:</h4>
                <p class="text-sm text-red-600">{{$product->user}}</p>
            </div>

            @if($product->user_id == Auth::id())
                <div class="mt-4 p-2 flex space-x-6">
                    <a href="/dashboard/products/{{$product->id}}/edit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit product</a>

                    <form method="POST" action="/dashboard/products/{{$product->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete product</button>
                    </form>
                </div>    
            @endif

            <div class="mt-4 flex space-x-6">

                <form method="POST" action="/orders" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Buy me</button>
                    <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}">
                </form>
            </div>
        </div>

</x-app-layout>