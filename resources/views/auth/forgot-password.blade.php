
<x-app-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
          <div class="col-md-5">
            @include('shared._flash_message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center mb-4 text-uppercase">Email Password Reset Link</h5>
                <hr>
                <form method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="mb-3">
                    <x-input name="email" label="Email" type="email"/>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</x-app-layout>
