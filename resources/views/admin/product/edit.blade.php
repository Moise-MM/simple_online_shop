<x-admin-layout>

    <x-slot:title>{{ $viewData['title'] }}</x-slot:title>

    <div class="card p-4">
        <h2>Edit product</h2>
        <hr>

        <div id="response"></div>

        <form method="" action="{{ route('admin.product.update',['product' => $viewData['product']]) }}"
            enctype="multipart/form-data" 
            hx-post="{{ route('admin.product.update',['product' => $viewData['product']]) }}"
            hx-target="#response"
            hx-select-oob="#row_form"
            hx-swap="outerHTML"
            >
            @csrf
            @method('put')
            @include('admin.product.partials._form_product')
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>






</x-admin-layout>
