<body class="antialiased">
    <x-app-layout>
        @include('partials._search')

        <div class="pb-12 pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(Auth::user()->name == 'admin')
                    <a href="/dashboard/products/create" class="bg-rose-300 hover:bg-red-700 text-white font-bold py-2 px-4 m-4 rounded">Add product</a>
                @else
                <div class="text-rose-100 justify justify-center w-full">
                    <h1 class="font-serif text-3xl ">Welcome to this Valentine webshop!</h1>
                    <p class="text-xl">For thanking that special person!</p>    
                </div>
                @endif

                    <div class="lg:grid lg:grid-cols-2 gap-6 space-y-6 md:space-y-0 mt-5">
                        @foreach($products as $product)
                            <a href="/products/{{$product->id}}">
                                <div class="flex bg-rose-300 rounded p-5">
                                    <a href="/products/{{$product->id}}"><img class="w-48 mr-6 md:block rounded" src="{{$product->image ? asset('storage/' . $product->image) : '/images/default.jpg'}}" alt="Product image"></a>
                                    <div class="text-2xl grid grid-column-4 grid-rows-3">
                                        <a href="/products/{{$product->id}}" class="col-start-1 col-end-4 text-3xl font-serif text-rose-700 leading-tight">{{$product->name}}</a>
                                        <p class="col-start-1 col-end-2 row-span1 text-base text-rose-100 mt-2 bg-rose-700 rounded block break-normal p-2 pb-0">&euro;{{$product->price}}</p>
                                    </div> 
                                </div>
                            </a>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="mt-6 p-4">
            {{ $products->links() }}
        </div>
    </x-app-layout>
</body>
