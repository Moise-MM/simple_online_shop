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
        @forelse ($viewData["orders"] as $order)
        <div class="card mb-4">
            <div class="card-header">
                Order #{{ $order->id }}
            </div>
            <div class="card-body">
                <b>Date:</b> {{ $order->created_at }}<br /><b>Total:</b> ${{ $order->total }}<br />
                <table class="table table-bordered table-striped text-center mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a class="link-success"
                                        href="{{route('product.show',['product' => $item->product])}}">
                                        {{ $item->product->name }}
                                    </a>
                                </td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
            Seems to be that you have not purchased anything in our store =(.
        </div>
    @endforelse
    </div>


</x-app-layout>
