<body class="antialiased">
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($total_cost > 0)
            <a href="{{route('dashboard')}}" class="bg-rose-300 text-rose-700 font-bold py-2 px-4 my-5 rounded w-3/4"><button>Continue shopping</button></a>
                <div class="h-56 flex flex-row gap-4 content-center my-5">
                    <div class="bg-rose-300 overflow-hidden shadow-sm sm:rounded-lg p-5 ">
                        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 w-2/4">
        
                            @foreach($products as $product)
                            @foreach($orders as $order)
                                @if($order->product_id == $product->id)
                                @php
                                    $price = $product->price * $order->amount;
                                @endphp
                                <div class="flex">
                                    <img class="w-48 mr-6 md:block" src="{{$product->image}}" alt="Product image">
                                    <div class="text-2xl text-rose-700">
                                        <a href="/dashboard/products/{{$product->id}}" class="font-semibold text-xl text-red-600 leading-tight">{{$product->name}}</a>
                                        <p class="text-base">Amount: {{$order->amount}}</p>
                                        <p class="text-base">Price: {{$price}} </p>
                                        <form method="POST" action="/orders/{{$order->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-base bg-rose-700 hover:bg-red-700 text-rose-300 font-bold py-2 px-4 rounded text-rose-700">Delete</button>
                                        </form>
                                    </div> 
                                </div>      
                                @endif  
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-rose-300 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <a class="btn bg-rose-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded btn-primary" href="{{route('mollie.create.payment')}}">Pay</a>
                        <p class="text-rose-700">Total cost = {{$total_cost}}</p>
                    </div>

                </div>    
            @else
                <div class="bg-rose-300 overflow-hidden shadow-sm sm:rounded-lg mt-20 center">
                        <p>There are no products in your card</p>
                        <a href="{{route('dashboard')}}"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Go shopping</button></a>
                </div>           
            @endif

        </div>
    </div>
    </x-app-layout>
</body>