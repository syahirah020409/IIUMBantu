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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            
            body{
                background-color:#FDFCF7 !important;
                font-family: 'Poppins', sans-serif; /* Default font for the entire body */
            }

            .welcome_to{
                font-size:60pt !important;
                color:#166269 !important;
                font-weight:bold !important;
                line-height:1 !important;
            }

            .iium_bantu{
                font-family: "Nunito", sans-serif;
                font-size:50pt !important;
                font-weight:bold !important;
                border-bottom:5px solid #D5993F !important;
            }

            .go_homepage{
                font-family: "Nunito", sans-serif;
                text-decoration:none !important;
                color:#D5993F !important;
                font-size:18pt !important;
            }

            .go_homepage:hover{
                font-family: "Nunito", sans-serif;
                text-decoration:none !important;
                color:#D5993F !important;
                font-size:18pt !important;
                font-weight:bold !important;
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
            <div class="row justify-content-center" style="margin-top:250px !important;">
                <div class="col-md-10 col-10">
                    <div class="row">
                        <div class="col-md-9 col-9" style="min-height:400px !important;">
                            <span class="welcome_to">Welcome User<br>to</span><br>
                            <span class="iium_bantu"><span style="color:#166269 !important;">IIUM</span><span style="color:#D5993F !important;">Bantu</span></span>
                        </div>
                        <div class="col-md-3 col-3 d-flex align-items-end justify-content-center" style="min-height:400px !important;">
                            <a href="{{ route('user.dashboard') }}" class="go_homepage">Go to Homepage &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
