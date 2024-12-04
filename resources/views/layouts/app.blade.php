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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}" defer></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>

            body{
                background-color:#166269 !important;
                font-family: 'Poppins', sans-serif; /* Default font for the entire body */
            }

            .btn_menu{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                color:#4E4C4C !important;
                background-color:transparent !important;
                min-width:180px !important;
            }

            .btn_menu:hover{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                background-color:transparent !important;
                color:#4E4C4C !important;
                font-weight:bold !important;
            }

            .btn_menu.btn_active{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                font-weight:bold !important;
                background-color:transparent !important;
            }

            .btn_menu_white{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                color:#fff !important;
                background-color:transparent !important;
                min-width:180px !important;
            }

            .btn_menu_white:hover{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                background-color:transparent !important;
                color:#fff !important;
                font-weight:bold !important;
            }

            .btn_menu_white.btn_active{
                font-size:12pt !important;
                margin-left:5px !important;
                margin-right:5px !important;
                font-weight:bold !important;
                background-color:transparent !important;
            }
            
            /* Default icon color */
            .icon-default {
                color: #166269 !important;
            }

            /* White icon for want_help page */
            .icon-white {
                color: #fff !important;
            }

            /* White icon for want_help page */
            .btn-icon-active {
                color: #D5993F !important;
            }

            .background-col-dashboard {
                /* background-color: white; */
                background-image: url("{{ asset('web_image/homepage.png') }}");
                height: 1080px;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                top:0;
            }

            .overlay-row-dashboard {
                position: absolute; /* Overlay on top of the background */
                top: 0;
                left: 0;
                width: 100%; /* Full width of the container */
                z-index: 2; /* Higher z-index ensures it appears above the background */
                pointer-events: none; /* Optional: prevents interaction if the overlay is visual only */
            }

            .overlay-content-dashboard {
                pointer-events: auto; /* Allows interaction with overlay content */
            }

            .background-col-about {
                background-image: url("{{ asset('web_image/about_us_bg.png') }}");
                background-position: center;
                background-repeat: repeat-y;
                background-size: 100% auto;
                position: relative;
                top: 0;
                height: 2200px; /* Adjust to match the height of 3-4 image repetitions */
            }

            .background-col-map {
                background-image: url("{{ asset('web_image/map_header.png') }}");
                background-position-x: right;
                background-position-y: -20px;
                background-repeat: no-repeat;
                background-size: 120% 230%;
                height: 300px; /* Adjust to match the height of 3-4 image repetitions */
                display:flex;
                align-items:center !important;
                justify-content:center !important;
            }

            .background-col-browse {
                background-image: url("{{ asset('web_image/browse_header.png') }}");
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 550px; /* Adjust to match the height of 3-4 image repetitions */
                display:flex;
                align-items:center !important;
                justify-content:center !important;
            }

            .background-col-browse-2 {
                background-image: url("{{ asset('web_image/browse_request_1.png') }}");
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: auto; /* Adjust to match the height of 3-4 image repetitions */
                padding: 30px 0px 30px 0px !important;
            }

            .background-col-donation {
                background-image: url("{{ asset('web_image/donation_header.png') }}");
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 550px; /* Adjust to match the height of 3-4 image repetitions */
            }

            .overlay-row-about {
                position: absolute; /* Overlay on top of the background */
                top: 0;
                left: 0;
                width: 100%; /* Full width of the container */
                z-index: 2; /* Higher z-index ensures it appears above the background */
                pointer-events: none; /* Optional: prevents interaction if the overlay is visual only */
            }

            .overlay-content-about {
                pointer-events: auto; /* Allows interaction with overlay content */
            }

            .btn-orange{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:white;
            }

            .btn-orange:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:black;
            }

            .btn-nude{
                border-radius:30px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#FDFCF7 !important;
                color:#4E4C4C !important;
            }

            .btn-nude:hover{
                border-radius:30px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#4E4C4C !important;
                color:#FDFCF7 !important;
            }

            .btn-orange-1{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:white;
            }

            .btn-orange-1:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#bdbdbd !important;
                color:#D5993F;
            }

            .btn-green{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#166269 !important;
                color:white;
            }

            .btn-green:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#bdbdbd !important;
                color:#166269;
            }

            .btn-grey{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#4E4C4C !important;
                color:white;
            }

            .btn-grey:hover{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                background-color:#bdbdbd !important;
                color:#4E4C4C;
            }

            .lend_your_hand{
                font-size:80pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1 !important;
            }

            .about_us_1{
                font-size:80pt !important;
                color:#D5993F !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .about_us_2{
                font-size:16pt !important;
                color:white !important;
                font-weight: 500 !important;
                line-height:1.5 !important;
                text-align:end !important;
            }

            .about_us_3{
                font-size:30pt !important;
                color:#D5993F !important;
                font-weight: 500 !important;
                line-height:1.5 !important;
            }

            .about_us_4{
                font-size:18pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1.5 !important;
                text-align:center !important;
            }

            .request_help{
                font-size:18pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1 !important;
            }

            .welcome_to_2{
                font-size:24pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1 !important;
                border-bottom:3px solid white !important;
            }

            .footer_label{
                font-size:16pt !important;
                color:white !important;
                font-weight: 400 !important;
                line-height:1 !important;
            }

            .footer_label_1{
                font-size:16pt !important;
                color:white !important;
                font-weight: 400 !important;
                line-height:1 !important;
                border-bottom:3px solid white !important;
            }

            .goal{
                padding:5px 30px 5px 30px !important;
                background-color:#D5993F !important;
                color:white;
                font-size:20pt !important;
                font-weight:600 !important;
            }

            .goal_1{
                border-radius: 50%; /* Makes the element circular */
                width: 50px; /* Adjust size as needed */
                height: 50px; /* Equal to width for a circle */
                display: flex; /* Use flexbox for centering */
                align-items: center; /* Vertically center content */
                justify-content: center; /* Horizontally center content */
                background-color: #D5993F !important;
                color: white;
                font-size: 20pt !important;
                font-weight: 600 !important;
            }

            .goal_2{
                font-size:16pt !important;
                color:black !important;
                font-weight: 500 !important;
                line-height:1.5 !important;
                text-align:center !important;
            }

            .map_header{
                font-size:70pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .browse_header{
                font-size:70pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .browse_1{
                font-size:16pt !important;
                color:#4E4C4C !important;
                font-weight: 600 !important;
                line-height:1.5 !important;
            }

            .browse_card_title{
                font-size:16pt !important;
                color:#4E4C4C !important;
                font-weight: bold !important;
                line-height:1.5 !important;
            }

            .browse_card_number{
                font-size:12pt !important;
                font-weight: 600 !important;
                line-height:1.5 !important;
            }

            .browse_card_time{
                font-size:10pt !important;
                color:#747474 !important;
                font-weight: 500 !important;
                line-height:1.5 !important;
            }

            .browse_card_detail_1{
                font-size:14pt !important;
                color:#4E4C4C !important;
                font-weight: 600 !important;
                line-height:1.5 !important;
            }

            .browse_card_detail_2{
                font-size:14pt !important;
                color:#4E4C4C !important;
                font-weight: 500 !important;
                line-height:1.5 !important;
            }

            .donation_header{
                font-size:70pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .donation_header_1{
                font-size:30pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1 !important;
            }

            .donation_detail {
                /* background-image: url("{{ asset('web_image/donation_header.png') }}"); */
                height: 200px; /* Adjust to match the height of 3-4 image repetitions */
                border-radius:100px !important;
            }

            .donation_detail_title{
                font-size:24pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .collab_1{
                font-size:24pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1.2 !important;
            }

            .collab_label{
                font-size:18pt !important;
                color:white !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
            }

            .help_header{
                font-size:70pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
            }

            .help_header_1{
                font-size:30pt !important;
                color:white !important;
                font-weight: 600 !important;
                line-height:1.2 !important;
            }

            .btn_help_grey{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#4E4C4C !important;
                color:#FDFCF7 !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_help_grey:hover{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#4E4C4C !important;
                color:#D5993F !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_help_orange{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#D5993F !important;
                color:#FDFCF7 !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_help_orange:hover{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#D5993F !important;
                color:#4E4C4C !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .help_form_category{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#4E4C4C !important;
                color:#FDFCF7 !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .help_form_type{
                border-radius:60px !important;
                min-height:120px !important;
                background-color:#D5993F !important;
                color:#FDFCF7 !important;
                font-size:30pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:420px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_grey_mini{
                border-radius:30px !important;
                min-height:60px !important;
                background-color:#4E4C4C !important;
                color:#FDFCF7 !important;
                font-size:16pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:150px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_grey_mini:hover{
                border-radius:30px !important;
                min-height:60px !important;
                background-color:#4E4C4C !important;
                color:#D5993F !important;
                font-size:16pt !important;
                justify-content:center !important;
                text-align:center !important;
                font-weight: 600 !important;
                min-width:150px !important;
                line-height:1 !important;
                display:flex;
                align-items:center !important;
            }

            .btn_white_arrow {
                display: flex; /* Ensure content is centered */
                justify-content: center;
                align-items: center;
                width: 80px; /* Set equal width and height for a circle */
                height: 80px;
                border-radius: 50%; /* Make it a circle */
                background-color: #EDECEC !important;
                color: #166269 !important;
                font-size: 18pt !important;
                font-weight: 600 !important;
                text-align: center;
                line-height: 1 !important;
                padding: 0; /* Remove padding to ensure perfect circle */
            }

            .btn_white_arrow:hover {
                background-color: #4E4C4C !important;
                color: #D5993F !important;
            }

            .request_help_label{
                font-size:18pt !important;
                color:#666565 !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
                font-weight:600 !important;
            }

            .map_modal_category{
                border-radius:30px !important;
                padding:10px 20px 10px 20px !important;
                height:60px !important;
                max-width:150px !important;
                background-color:#D5993F !important;
                color:white;
                font-size:14pt !important;
                font-weight:bold !important;
                line-height:1 !important;
                text-align:center !important;
            }

            .map_modal_detail{
                border-radius:20px !important;
                padding:10px 20px 10px 20px !important;
                min-height:40px !important;
                max-height:100px !important;
                min-width:200px !important;
                max-width:400px !important;
                background-color:#666565 !important;
                color:white;
                font-size:11pt !important;
                font-weight:500 !important;
                line-height:1 !important;
                text-align:center !important;
            }

            .map_modal_address{
                padding:10px 20px 10px 20px !important;
                min-height:40px !important;
                max-height:100px !important;
                min-width:200px !important;
                max-width:400px !important;
                color:#4E4C4C !important;
                font-size:11pt !important;
                font-weight:500 !important;
                line-height:1 !important;
                text-align:center !important;
            }

            /* admin side */

            .background-col-admin-request {
                background-image: url("{{ asset('web_image/admin_bg.jpg') }}");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height: 550px; /* Adjust to match the height of 3-4 image repetitions */
                display:flex;
                align-items:center !important;
                justify-content:center !important;
            }

            .admin_request_title{
                font-size:70pt !important;
                color:white !important;
                font-weight: bold !important;
                line-height:1 !important;
                text-shadow: 2px 2px 5px #000;
            }

            .view_request_1{
                font-size:18pt !important;
                color:#000 !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
                font-weight:600 !important;
            }

            .view_request_info_1{
                font-size:18pt !important;
                color:#D5993F !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
                font-weight:600 !important;
            }

            .btn_white {
                display: flex; /* Ensure content is centered */
                justify-content: center;
                align-items: center;
                border-radius: 30px !important; /* Make it a circle */
                background-color: #FDFCF7 !important;
                color: #4E4C4C !important;
                font-size: 18pt !important;
                font-weight: 600 !important;
                text-align: center;
                line-height: 1 !important;
                padding:20px 30px 20px 30px; /* Remove padding to ensure perfect circle */
            }

            .btn_white:hover {
                background-color: #4E4C4C !important;
                color: #FDFCF7 !important;
            }

            .collab_detail_title{
                border-radius:40px !important;
                padding:10px 50px 10px 50px !important;
                background-color: rgba(22, 98, 105, 0.9) !important;
                color:#FDFCF7 !important;
                font-size: 24pt !important;
                font-weight: bold !important;
                box-shadow: 3px 3px 5px rgba(0,0,0,.5)!important
            }

            .collab_detail_description{
                border-radius:60px !important;
                padding:50px !important;
                background-color: rgba(243, 243, 243, 0.9) !important;
                color:#666565 !important;
                font-size: 18pt !important;
                font-weight: 500 !important;
                box-shadow: 3px 3px 5px rgba(0,0,0,.5)!important
            }

            .collab_detail_target{
                color:#FDFCF7 !important;
                font-size: 24pt !important;
                font-weight: bold !important;
                line-height:1.2 !important;
            }

            .collab_detail_for{
                color:#FDFCF7 !important;
                font-size: 20pt !important;
                font-weight: bold !important;
                line-height:1.2 !important;
            }

            .collab_detail_amount{
                padding:10px 20px 10px 20px !important;
                background-color:#D5993F !important;
                color:#FDFCF7 !important;
                font-size: 24pt !important;
                font-weight: bold !important;
            }

            .collab_detail_list{
                color:#FDFCF7 !important;
                font-size: 18pt !important;
                font-weight: 600 !important;
                line-height:1.2 !important;
            }

            .numbered-circle {
                display: inline-block;
                width: 30px; /* Adjust the size of the circle */
                height: 30px; /* Adjust the size of the circle */
                background-color: #D5993F;
                color: white;
                text-align: center;
                line-height: 30px; /* Center the number vertically */
                font-weight: 600 !important;
                border-radius: 50%;
                margin-right: 10px; /* Space between the circle and the text */
            }

            .btn-back-donate{
                border-radius:40px !important;
                padding:20px 40px 20px 40px !important;
                background-color:#4E4C4C !important;
                color:white;
            }

            .btn-back-donate:hover{
                background-color:#bdbdbd !important;
                color:#4E4C4C;
            }

            .user_profile_name{
                font-size:24pt !important;
                font-weight:600 !important;
                color:#3C3B3B !important;
            }

            .user_profile_label{
                font-size:18pt !important;
                color:#747474 !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
            }

            .user_profile_display{
                font-size:18pt !important;
                background-color:#FFFCFC !important;
                color:#8F8D8D !important;
                line-height:1.2 !important;
                margin-bottom:10px !important;
                padding:10px 20px 10px 20px !important;
                width:100% !important;
                border-radius:15px !important;
                display:flex !important;
                align-items:center !important;
            }

            .user_profile_camera {
                display: flex; /* Ensure content is centered */
                justify-content: center;
                align-items: center;
                width: 80px; /* Set equal width and height for a circle */
                height: 80px;
                border-radius: 50%; /* Make it a circle */
                background-color: #666565 !important;
                color: #FFFFFF !important;
                font-size: 20pt !important;
                font-weight: 600 !important;
                text-align: center;
                line-height: 1 !important;
                padding: 0; /* Remove padding to ensure perfect circle */
            }

            .admin_dashboard_card{
                padding:50px !important;
                background-color:#D5993F !important;
                border-radius:50px !important;
                margin-top:25px !important;
                margin-bottom:25px !important;
            }

            .dashboard_card_title{
                font-size:24pt !important;
                font-weight:bold !important;
                color:#FDFCF7 !important;
                line-height:1.2 !important;
            }

            .dashboard_card_number{
                font-size:30pt !important;
                font-weight:bold !important;
                color:#166269 !important;
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
            <div class="row m-0">
                <div class="col-md-12 col-12 p-0">
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>


        <!-- Bootstrap 5 JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    </body>
</html>
