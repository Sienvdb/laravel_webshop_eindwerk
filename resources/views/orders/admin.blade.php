<body class="antialiased">
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-rose-300 text-2x1">My adminpage</h1>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-20">
                <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                 

                    @foreach($products as $product)

                    @foreach($orders as $order)

                    @foreach($users as $user)
                    <div class="bg-rose-300 overflow-hidden shadow-sm sm:rounded-lg p-5 ">

                        <div class="grid grid-cols-2 m-2 m-2 text-rose-700">
                            <a href="/products/{{$product->id}}"><img class="w-48 mr-6 md:block" src="{{$product->image ? asset('storage/' . $product->image) : '/images/default.jpg'}}" alt="Product image"></a>
                            <div class="text-l">
                                <a href="/products/{{$product->id}}"><h1>{{$product->name}}</h1></a>
                                <p>Amount: {{$order->amount}}</p>
                                <?php $user = DB::table('users')->where('id', $order->user_id)->first(); ?>
                                <p>Order ID: {{$order->id}}</p>
                                <p>Order date: {{$order->updated_at}}</p>
                                <p>User: {{$user->name}}</p>
                                <form method="POST" action="/admin/{{$order->id}}">
                                    @csrf
                                    <button type="submit" class="bg-rose-700 hover:bg-red-700 text-rose-300 font-bold py-2 px-4 rounded">Send</button>
                                </form>
                            </div> 
                        </div>    
                    </div>
                    @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
</body>