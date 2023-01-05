@if(session()->has('message'))
    <div class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-red-500 text-white px-48 py-3">
        <p>{{ session()->get('message') }}</p>
    </div>
@endif