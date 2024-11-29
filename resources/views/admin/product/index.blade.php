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
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td><a href="{{ route('admin.product.edit',['product' => $product]) }}" class="btn btn-success btn-sm"
                                hx-boost="true"
                                hx-target=".content" 
                                hx-select=".content"
                                hx-swap="outerHTML"><i class="bi bi-pencil-square"></i></a></td>
                            <td>
                                <form action="" method="post" 
                                    hx-delete="{{ route('admin.product.delete', ['product' => $product]) }}"
                                    hx-target="closest tr"
                                    hx-swap="outerHTML swap:1s"
                                    hx-confirm="Are you sure ?">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-admin-layout>
