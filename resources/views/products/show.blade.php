<x-app-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{$product->name}}
            </h2>
            <img class="w-48 mr-6 mb-6" src="{{$product->image}}" alt="Product image">
            <p class="text-gray-600 mb-4">
                {{$product->description}}
            </p>
            <p class="text-gray-600 mb-4">
                &euro;{{$product->price}}
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
            @endif

            @if(!Auth::check())
            <div class="mt-4 p-2 flex space-x-6">

                <form method="POST" action="#">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Buy product</button>
                </form>
            </div>
        @endif
        </div>

</x-app-layout>