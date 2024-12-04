<x-app-layout>
    <style>

    </style>

    <div class="row">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="height:800px !important;">
            <div class="row justify-content-center" style="margin-top: 300px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Thank you for helping!</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 30px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header_1">May Allah bless your kindness.</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <a href="{{ route('user.dashboard') }}" class="btn_white" style="font-size:18pt !important;">Home</a>
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
