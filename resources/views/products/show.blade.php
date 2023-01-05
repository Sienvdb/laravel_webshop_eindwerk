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
                {{$product->price}}
            </p>

        </div>

</x-app-layout>