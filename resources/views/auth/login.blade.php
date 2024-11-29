{{-- -

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

--}}

<x-app-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center mb-4 text-uppercase">Login</h5>
                <hr>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <x-input name="email" label="Email" type="email"/>
                  </div>
                  <div class="mb-3">
                    <x-input name="password" label="Password" type="password"/>
                  </div>
                  <div class="d-flex justify-content-between justify-items-center">
                    <button type="submit" class="btn btn-primary ">Login</button>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</x-app-layout>
