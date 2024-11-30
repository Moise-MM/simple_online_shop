<x-app-layout>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $viewData['hero_title'] }}</h1>
            </div>
        </div>
    </header>

    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                Purchase Completed
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    Congratulations, purchase completed. Order number is <b>#{{ $viewData['order']->id }}</b>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
