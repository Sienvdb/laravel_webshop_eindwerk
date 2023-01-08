<x-app-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <h2 class="text-2xl font-bold uppercase mb-6 text-red-600 flex justify-center">
                {{$product->name}}
            </h2>
            <img class="w-48 mr-6 mb-6 flex items-center justify-center" src="{{$product->image}}" alt="Product image">
            <p class="text-black mb-4">
                &euro;{{$product->price}}
            </p>
            <p class="text-black mb-4">
                {{$product->description}}
            </p>


            @if(Auth::check())
                <div class="mt-4 p-2 flex space-x-6">
                    <a href="/dashboard/products/{{$product->id}}/edit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit product</a>

                    <form method="POST" action="/dashboard/products/{{$product->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete product</button>
                    </form>
                </div>
                <div class="mt-4 flex space-x-6">

                    <form method="POST" action="/orders">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Buy me</button>
                        <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}">
                    </form>
                </div>
    
            @endif

            @if(!Auth::check())
            <div class="mt-4 flex space-x-6">

                    <a href="/login"><button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Buy product</button></a>
            </div>
        @endif
        </div>

</x-app-layout>