<x-app-layout>

    <x-slot:title>{{ $viewData['title'] }}</x-slot:title>


     <!-- Product section-->
     <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div id="response"></div>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $viewData['product']->image ? asset('storage/'.$viewData['product']->image) : asset('img/no-image.avif') }}" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $viewData['product']->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span>${{ $viewData['product']->price }}</span>
                    </div>
                    <p class="lead">{{ $viewData['product']->description }}</p>
                    <form action="{{ route('cart.add', ['id' => $viewData['product']->id]) }}" method="POST" class="d-flex"
                        hx-post="{{ route('cart.add', ['id' => $viewData['product']->id]) }}"
                        hx-target="#response"
                        hx-select-oob="#btn-cart">
                        @csrf
                        <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>



</x-app-layout>