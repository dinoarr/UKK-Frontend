<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo_icon.png') }}" type="image/x-icon" />
    <title>Todolist App</title>

    {{-- SweetAlert CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">


    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Boostsrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

    {{-- sidebar --}}
    <div class="custom">
        <div class="overlay"></div>
        @include('layouts.sidebar')
        <main class="content">
            <div class="main">
                <div class="header mb-4">
                    <h2><span>Pages /</span> @yield('title')</h2>
                </div>
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Bootstrap JS --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}">

    {{-- SweetAlert JS --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if ("{{ session('success') }}") {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    iconColor: "#ffffff",
                    background: "#a5dc86",
                    color: "#ffffff",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'small-toast'
                    }
                });
            }

            if ("{{ session('error') }}") {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    iconColor: "#ffffff",
                    background: "#f27474",
                    color: "#ffffff",
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'small-toast'
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
