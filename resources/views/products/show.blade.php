<x-app-layout>
    @if(Auth::check())
        <a href="/dashboard" class="inline-block font-bold text-red-600 ml-4 mb-4 text-rose-300">&larr; Back</a>
    @endif

    @if(!Auth::check())
        <a href="/" class="inline-block font-bold text-red-600 ml-4 mb-4 text-rose-300">&larr; Back</a>
    @endif
    <div class="mx-4">
        <div class=" border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24 bg-rose-300  text-rose-700">
            <div class="grid grid-cols-5">
                <h2 class="text-2xl font-bold col-start-1 col-end-3 font-serif mr-6 uppercase mb-6 text-red-600 flex justify-center">
                    {{$product->name}} 
                </h2>
                <p class="text-rose-100 col-start-4 mb-4 bg-rose-700 rounded p-1">
                    &euro;{{$product->price}}
                </p>    
            </div>
            <div class="mt-4 flex space-x-6 justify-center">
                <img class="w-48  flex items-center justify-self-center" src="{{$product->image ? asset('storage/' . $product->image) : '/images/default.jpg'}}" alt="Product image">
            </div>
            <p class="text-rose-700 mb-4">
                {{$product->description}}
            </p>
            
            <!--
                <div class="mb-3">
                    <h4 class="text-sm">Posted by:</h4>
                    <p class="text-sm text-red-600">{{$product->user}}</p>
                </div>
            -->

            @if(Auth::user())
                @if(Auth::user()->name == 'admin')
                <div class="mt-4 p-2 flex space-x-6">
                    <a href="/dashboard/products/{{$product->id}}/edit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit product</a>

                    <form method="POST" action="/dashboard/products/{{$product->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete product</button>
                    </form>
                </div>    
                @endif
            @endif

            <div class="mt-4 flex space-x-6 justify-center">

                <form method="POST" action="/orders" enctype="multipart/form-data">
                    @csrf
                    <input type="number" name="amount" id="amount" class="border border-gray-200 p-2 rounded" value="1" min="1" max="10">
                    <button type="submit" class="bg-rose-700 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded">Add to card</button>
                    <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}">
                </form>
            </div>
        </div>

</x-app-layout>