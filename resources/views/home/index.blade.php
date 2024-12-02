<x-app-layout>

    <x-slot:title>{{ $viewData['title'] }}</x-slot:title>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $viewData['hero_title'] }}</h1>
                <p class="lead fw-normal text-white-50 mb-0">{{ $viewData['hero_description'] }}</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($viewData['products'] as $product)
                <div class="col-md-4 col-lg-3 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('img/no-image.avif') }}" class="card-img-top img-card" width="450px" height="300px">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                ${{ $product->price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto"
                                    href="{{ route('product.show',['product' => $product]) }}">View options</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            {{ $viewData['products']->links() }}
        </div>
        
    </section>

</x-app-layout>
