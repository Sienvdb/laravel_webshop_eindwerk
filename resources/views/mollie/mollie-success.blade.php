<x-app-layout>
    @if(Auth::check())
        <a href="/dashboard" class="inline-block font-bold text-rose-300 ml-4 mb-4">&larr; Back</a>
    @endif

    @if(!Auth::check())
        <a href="/" class="inline-block font-bold text-rose-300 ml-4 mb-4">&larr; Back</a>
    @endif
    <div class="mx-4">
        <div class="bg-rose-300 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">

        <div class="pricing-header text-rose-700 px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">{{ $status ?? Session::get('status')}}</h1>
        </div>
        <div class="container justify-center">
            <a href="{{route('dashboard')}}"><button class="bg-rose-700 hover:bg-red-700 text-rose-300 font-bold py-2 px-4 rounded">Back to webshop</button></a>
        </div>
    </div>

</x-app-layout>