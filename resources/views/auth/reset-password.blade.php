

<x-app-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
          <div class="col-md-5">
            @include('shared._flash_message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center mb-4 text-uppercase">Reset Password</h5>
                <hr>
                <form method="POST" action="{{ route('password.store') }}">
                  @csrf
                  <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <div class="mb-3">
                    <x-input name="email" label="Email" type="email" value="{{ $request->email }}"/>
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

