<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Choose One Plan To Subscribe</h1>
</div>
<div class="container">
    @if (!empty($status) || Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $status ?? Session::get('status')}}</strong>
        </div>
    @endif

    <button>terug naar webshop</button>