<x-app-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center mb-4 text-uppercase">Register</h5>
                <hr>
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="mb-3">
                    <x-input name="name" label="Name"/>
                  </div>
                  <div class="mb-3">
                    <x-input name="email" label="Email" type="email"/>
                  </div>
                  <div class="mb-3">
                    <x-input name="password" label="Password" type="password"/>
                  </div>
                  <div class="mb-3">
                    <x-input name="password_confirmation" label="Confirm password" type="password"/>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</x-app-layout>