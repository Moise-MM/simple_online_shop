<x-app-layout>

    <x-slot:title>All products</x-slot:title>

    <div class="container py-5">
        <div class="row">
            @foreach ($viewData['products'] as $product)
                <div class="col-md-4 col-lg-3 mb-2">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('img/no-image.avif') }}" class="card-img-top img-card">
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
    </div>


</x-app-layout>
