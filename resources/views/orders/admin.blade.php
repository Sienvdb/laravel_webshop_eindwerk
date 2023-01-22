<body class="antialiased">
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-20">
                <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

                    @foreach($products as $product)
                    @foreach($orders as $order)
                        <div class="flex">
                            <!--<img class="w-48 mr-6 md:block" src="{{$product->image ? asset('storage/' . $product->image) : asset($product->image)}}" alt="Product image">-->
                            <img class="w-48 mr-6 md:block" src="{{$product->image}}" alt="Product image">
                            <div class="text-2xl">
                                <a href="/dashboard/products/{{$product->id}}" class="font-semibold text-xl text-red-600 leading-tight">{{$product->name}}</a>
                                <p>Amount: {{$order->amount}}</p>
                                <form method="POST" action="/admin/{{$order->id}}">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Send</button>
                                </form>
                            </div> 
                        </div>      
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
</body>