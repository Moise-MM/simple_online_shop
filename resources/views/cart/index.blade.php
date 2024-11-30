<x-app-layout>

    <x-slot:title>{{ $viewData['title'] }}</x-slot:title>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $viewData['hero_title'] }}</h1>
            </div>
        </div>
    </header>


    <div class="container">

        <div class="card">
            <div class="card-header">
                Products in Cart
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['products'] as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ session('products')[$product->id] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData['total'] }}</a>
                        <a class="btn bg-primary text-white mb-2">Purchase</a>
                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Remove all products from Cart
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>
