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
        <div class="col-md-12 col-12" style="background:#D5993F !important; height:300px !important;">
            <div class="row justify-content-center" style="margin-top: 100px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Get Help</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header_1">What do you need?</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#D5993F !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-10 col-10" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:100px !important;">
                    <div class="row justify-content-center" style="margin-top:150px !important;">
                        <div class="col-md-8 col-8 d-flex justify-content-between">
                            <a href="{{ route('user.request_help_category', 'food') }}" class="btn_help_grey">Food</a>
                            <a href="{{ route('user.request_help_category', 'medical') }}" class="btn_help_grey">Medical Aid</a>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top:150px !important; margin-bottom:150px !important;">
                        <div class="col-md-8 col-8 d-flex justify-content-between">
                            <a href="{{ route('user.request_help_category', 'academic') }}" class="btn_help_grey">Academic<br>Resources</a>
                            <a href="{{ route('user.request_help_category', 'financial') }}" class="btn_help_grey">Financial<br>Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important;">
            <div class="row m-0 justify-content-center" style="margin-top:-1090px !important;">
                <div class="col-md-6 col-6 d-flex justify-content-end">
                    <img src="{{ asset('web_image/want_help.png') }}" alt="" style="height:480px !important; width:auto !important;">
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
