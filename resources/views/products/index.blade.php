<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-20">
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                @foreach($products as $product)
                    <div class="flex">
                        <!--<img class="w-48 mr-6 md:block" src="{{$product->image ? asset('storage/' . $product->image) : asset($product->image)}}" alt="Product image">-->
                        <img class="w-48 mr-6 md:block" src="{{$product->image}}" alt="Product image">
                        <div class="text-2xl">
                            <a href="/dashboard/products/{{$product->id}}" class="font-semibold text-xl text-gray-800 leading-tight">{{$product->name}}</a>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>