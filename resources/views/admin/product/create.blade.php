<x-admin-layout>

    <div class="card p-4">
        <h2>Create product</h2>
        <hr>

        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-6">
                    <x-input name="name" label="Name" />
                </div>
                <div class="col">
                    <x-input name="price" label="Price" type="number" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-text-area name="description" label="Description"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    


</x-admin-layout>
