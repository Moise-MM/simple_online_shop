<x-admin-layout>

    <div class="card">
        <div class="card-header">
            <p>Manage Products</p>
            <p>
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary"
                    hx-boost="true"
                    hx-target=".content" 
                    hx-select=".content"
                    hx-swap="outerHTML">Add new product</a>
            </p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-admin-layout>
