<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ?? 'Online Shop' }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="{{ asset('front_end_assets/assets/favicon.ico') }}" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front_end_assets/css/styles.css') }}" rel="stylesheet" />
        <script src="https://unpkg.com/htmx.org@2.0.3"></script>
        <script>
          // Permet d'ajouter le token CSRF à chaque requête AJAX,
          // pour éviter les erreurs 419, spécifiques à Laravel.
          document.addEventListener('DOMContentLoaded', function() {
              document.body.addEventListener('htmx:configRequest', (event) => {
                  event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
              })
          });
      </script>
    </head>
    <body>
        <!-- Navigation-->
       @include('layouts.partials._navbar')


        <main>
            {{ $slot }}
        </main>

        
        <!-- Footer-->
        @include('layouts.partials._footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front_end_assets/js/scripts.js') }}"></script>
    </body>
</html>
