<x-app-layout>

    <x-slot:title>{{ $viewData['title'] }}</x-slot:title>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $viewData ['subtitle'] }}</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead">{{ $viewData ['description'] }}</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead">{{ $viewData ['author'] }}</p>
            </div>
        </div>
    </div>

</x-app-layout>
