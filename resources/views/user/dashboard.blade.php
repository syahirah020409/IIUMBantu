<x-app-layout>
    
    <!-- Background row -->
    <div class="row" style="position: relative;">
        <div class="col-md-12 col-12 background-col-dashboard">
            <!-- Background content -->
        </div>
    </div>

    <!-- Overlay row -->
    <div class="row overlay-row-dashboard justify-content-center m-0">
        <div class="col-md-12 col-12 overlay-content-dashboard p-0">
            <div class="row m-0">
                <div class="col-md-12 col-12">
                    @include('layouts.navigation')
                </div>
            </div>

            <div class="row justify-content-center mx-0" style="margin-top:150px !important;">
                <div class="col-md-10 col-10" style="height:780px !important;">
                    <span class="lend_your_hand">Lend your<br>hand.</span><br><br><br>
                    <span class="request_help">Request Help, Offer Support, and Donate - All in One<br>Click</span><br><br><br>
                    <a href="{{ route('user.map') }}" class="btn-orange" style="font-size:18pt !important;">IIUMBantu Map &rarr;</a>
                </div>
            </div>
            <div class="row justify-content-center m-0">
                <div class="col-md-6 col-6">
                    <div class="row m-0" style="margin-top:100px !important;">
                        <div class="col-md-12 col-12 d-flex justify-content-center">
                            <img src="{{ asset('web_image/homepage_3.png') }}" alt="" style="height:300px !important; width:300px !important;">
                        </div>
                    </div>
                    <div class="row m-0" style="margin-top:-80px !important;">
                        <div class="col-md-12 col-12 text-center">
                            <span class="welcome_to_2">Welcome to IIUMBantu</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 d-flex justify-content-center p-0">
                    <img src="{{ asset('web_image/homepage_2.png') }}" alt="" style="height:auto !important; width:100% !important;">
                </div>
            </div>
            <div class="row justify-content-center m-0" style="margin-top:-700px !important;">
                <div class="col-md-4 col-4 d-flex justify-content-center">
                    <img src="{{ asset('web_image/logo_2.png') }}" alt="" style="height:300px !important; width:300px !important;">
                </div>
            </div>
            <div class="row m-0" style="margin-top:400px !important; background-color:#FDFCF7 !important;">
                <div class="col-md-4 col-4" style="padding:50px !important; margin-bottom:80px !important;">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <img src="{{ asset('web_image/1.png') }}" alt="" style="height:300px !important; width:300px !important;">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('user.map') }}" class="btn-orange-1" style="font-size:16pt !important;">I need help</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-4" style="padding:50px !important; margin-bottom:80px !important;">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <img src="{{ asset('web_image/2.png') }}" alt="" style="height:300px !important; width:300px !important;">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('user.map') }}" class="btn-green" style="font-size:16pt !important;">I want to help</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-4" style="padding:50px !important; margin-bottom:80px !important;">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <img src="{{ asset('web_image/3.png') }}" alt="" style="height:300px !important; width:300px !important;">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('user.donation') }}" class="btn-grey" style="font-size:16pt !important;">I want to donate</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center m-0">
                <div class="col-md-12 col-12 p-0">
                    <img src="{{ asset('web_image/homepage_4.png') }}" alt="" style="height:auto !important; width:100% !important;">
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
        </div>
    </div>

</x-app-layout>
