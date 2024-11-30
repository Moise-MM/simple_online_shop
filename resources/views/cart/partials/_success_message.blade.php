
<div id="response">
    <div class="alert alert-success">
        {{ $viewData['message'] }}
    </div>
</div>


<a href="{{ route('cart.index') }}" class="btn btn-outline-dark" id="btn-cart">
    <i class="bi-cart-fill me-1"></i>
    Cart
    <span class="badge bg-dark text-white ms-1 rounded-pill">
        @if(session()->has('products'))
            {{ count(session('products'))}}
        @else
            0
        @endif
    </span>
</a>