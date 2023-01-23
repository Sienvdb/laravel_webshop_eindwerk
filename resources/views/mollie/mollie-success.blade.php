<x-app-layout>
    @if(Auth::check())
        <a href="/dashboard" class="inline-block font-bold text-red-600 ml-4 mb-4">&larr; Back</a>
    @endif

    @if(!Auth::check())
        <a href="/" class="inline-block font-bold text-red-600 ml-4 mb-4">&larr; Back</a>
    @endif
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">{{ $status ?? Session::get('status')}}</h1>
        </div>
        <div class="container">
        
            <a href="{{route('dashboard')}}"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Terug naar webshop</button></a>
            </div>
    </div>

</x-app-layout>