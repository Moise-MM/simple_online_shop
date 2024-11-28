<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin Shop</title>

    <link href="{{ asset('back_end_assets/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />

    <script src="https://unpkg.com/htmx.org@2.0.3" differ></script>
    <script>
        // Permet d'ajouter le token CSRF à chaque requête AJAX,
        // pour éviter les erreurs 419, spécifiques à Laravel.
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('htmx:configRequest', (event) => {
                event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
            })
        });
    </script>


    <style>
        a:hover {
            text-decoration: none;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            /* Text color */
            background-color: #d4edda;
            /* Background color */
            border-color: #c3e6cb;
            /* Border color */
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Admin Panel</span>
                </a>

                <ul class="sidebar-nav nav-link">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.home.index') }}" hx-boost="true"
                            hx-target=".content" hx-select=".content" hx-swap="outerHTML">
                            <i class="align-middle" data-feather="sliders"></i><span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.product.index') }}" hx-boost="true"
                            hx-target=".content" hx-select=".content" hx-swap="outerHTML">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Products</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('img/no-image.avif') }}" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> <span class="text-dark">Moise MM</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @include('shared._script_admin')
</body>

</html>
