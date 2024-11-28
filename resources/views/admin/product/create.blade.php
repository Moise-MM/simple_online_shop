<x-admin-layout>

    <div class="card p-4">
        <h2>Create product</h2>
        <hr>

        <div id="response"></div>

        <form method="POST" action="{{ route('admin.product.store') }}"
            enctype="multipart/form-data" 
            hx-post="{{ route('admin.product.store') }}"
            hx-target="#response"
            hx-select-oob="#row_form"
            >
            @csrf
            @include('admin.product.partials._form_product')
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>






</x-admin-layout>
