<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('web_image/logo_2.png') }}" type="image/png">

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <title>{{ config('app.name', 'IIUMBantu') }}</title>

        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


        <!-- jQuery (required for Toastr) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Add SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <!-- Add SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>

            body{
                background-color:#166269 !important;
                font-family: 'Poppins', sans-serif; /* Default font for the entire body */
            }

            .background-col-login {
                height: calc(100vh - 150px);
                background-color: white; /* Background for the first row */
                border-top-left-radius: 30px;
                margin-top: 150px !important;
                top:0;
            }

            .overlay-row-login {
                position: absolute; /* Overlay on top of the background */
                top: 0;
                left: 0;
                width: 100%; /* Full width of the container */
                z-index: 2; /* Higher z-index ensures it appears above the background */
                pointer-events: none; /* Optional: prevents interaction if the overlay is visual only */
            }

            .overlay-content-login {
                pointer-events: auto; /* Allows interaction with overlay content */
                margin-top:250px !important;
            }

            .background-col-register {
                height: calc(100vh - 150px);
                background-color: white; /* Background for the first row */
                border-top-right-radius: 30px;
                margin-top: 150px !important;
                top:0;
            }

            .overlay-row-register {
                position: absolute; /* Overlay on top of the background */
                top: 0;
                left: 0;
                width: 100%; /* Full width of the container */
                z-index: 2; /* Higher z-index ensures it appears above the background */
                pointer-events: none; /* Optional: prevents interaction if the overlay is visual only */
            }

            .overlay-content-register {
                pointer-events: auto; /* Allows interaction with overlay content */
                margin-top:200px !important;
            }

            .background-col-forgot {
                height: calc(100vh - 150px);
                background-color: white; /* Background for the first row */
                border-top-right-radius: 30px;
                border-top-left-radius: 30px;
                margin-top: 150px !important;
                top:0;
            }

            .overlay-row-forgot {
                position: absolute; /* Overlay on top of the background */
                top: 0;
                left: 0;
                width: 100%; /* Full width of the container */
                z-index: 2; /* Higher z-index ensures it appears above the background */
                pointer-events: none; /* Optional: prevents interaction if the overlay is visual only */
            }

            .overlay-content-forgot {
                pointer-events: auto; /* Allows interaction with overlay content */
                margin-top:200px !important;
            }

            .btn-orange{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:white;
                font-size:12pt !important;
            }

            .btn-orange:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:black;
                font-size:12pt !important;
            }

            .btn-back{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:black !important;
                color:white;
                font-size:12pt !important;
            }

            .btn-back:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#d1d0d0 !important;
                color:black;
                font-size:12pt !important;
            }

        </style>

    </head>
    <body>
        <!-- Toastr Success Message -->
        @if(session('success'))
            <script>
                toastr.success('{{ session('success') }}', 'Success', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });
            </script>
        @endif
        <!-- Toastr Error Message -->
        @if(session('error'))
            <script>
                toastr.error('{{ session('error') }}', 'Failed', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });
            </script>
        @endif
        <div class="container-fluid">
            {{ $slot }}
        </div>
    </body>

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Check for Swal Warning -->
    @if(session('swal_warning'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Reminder',
                text: '{{ session('swal_warning') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

</html>
