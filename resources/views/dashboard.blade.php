<body class="antialiased">
    <x-app-layout>
        <!--
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }} {{ Auth::user()->name }}
            </h2>
        </x-slot>
        -->
        @include('partials._search')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="/dashboard/products/create" class="bg-rose-300 hover:bg-red-700 text-white font-bold py-2 px-4 m-4 rounded">Add product</a>


                    <div class="lg:grid lg:grid-cols-2 gap-6 space-y-6 md:space-y-0 mt-5">
                        @foreach($products as $product)
                            <div class="flex bg-rose-300 rounded p-5">
                                <a href="/products/{{$product->id}}"><img class="w-48 mr-6 md:block" src="{{$product->image ? asset('storage/' . $product->image) : '/images/default.jpg'}}" alt="Product image"></a>
                                <div class="text-2xl">
                                    <a href="/products/{{$product->id}}" class="font-semibold text-xl text-rose-700 leading-tight">{{$product->name}}</a>
                                    <p class="text-base text-rose-700 mt-2">&euro;{{$product->price}}</p>
                                </div> 
                            </div>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="mt-6 p-4">
            {{ $products->links() }}
        </div>
    </x-app-layout>
</body>
