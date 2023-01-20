<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-20">
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                <p>HALLLLLLLLLLLLLLOOOOO</p>

                @foreach($orders as $order)

                    <div class="flex">
                        <div class="text-2xl">
                            <a href="/dashboard/products/{{$order->id}}" class="font-semibold text-xl text-gray-800 leading-tight">{{$order->product_id}}</a>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>