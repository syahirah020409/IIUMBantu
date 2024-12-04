<x-app-layout>
    <style>

        ul {
            list-style-type: disc !important; /* Default bullet style */
            padding-left: 20px;    /* Ensure there's space for the bullets */
        }

    </style>

    <div class="row" style="background-color:#D5993F !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="background:#D5993F !important; height:800px !important;">
            <div class="row justify-content-center" style="margin-top: 300px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Your help has been sent!</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 30px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header_1">We’ll check you request and notify other user as soon as possible.</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <a href="{{ route('user.map') }}" class="btn-nude" style="font-size:18pt !important;">IIUMBantu Map &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center m-0">
        <div class="col-md-10 col-10 p-0">
            <div class="row m-0" style="padding:50px 0px 50px 0px !important;">
                <div class="col-md-2 col-2 d-flex justify-content-end">
                    <img src="{{ asset('web_image/logo_2.png') }}" alt="" style="height:150px !important; width:150px !important;">
                </div>
                <div class="col-md-10 col-10" style="padding:20px 0px 10px 0px !important;">
                    <span class="footer_label">
                        Kuliyyah of Information and
                    </span><br>
                    <span class="footer_label_1">
                        Communication Technology
                    </span><br><br>
                    <a href="" class="btn-orange-1"><i class="fa-solid fa-envelope"></i></a>
                    <a href="" class="btn-orange-1"><i class="fa-solid fa-phone"></i></a>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        
    </script>

</x-app-layout>
