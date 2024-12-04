<x-app-layout>
    
    <!-- Background row -->
    <div class="row" style="position: relative;">
        <div class="col-md-12 col-12 background-col-about">
            <!-- Background content -->
        </div>
    </div>

    <!-- Overlay row -->
    <div class="row overlay-row-about justify-content-center m-0">
        <div class="col-md-12 col-12 overlay-content-about p-0">
            <div class="row m-0">
                <div class="col-md-12 col-12">
                    @include('layouts.navigation')
                </div>
            </div>
            <div class="row justify-content-center m-0" style="margin-top:400px !important;">
                <div class="col-md-10 col-10" style="background-color:#166269 !important; border-radius:40px !important; padding:0px 50px 50px 50px !important;">
                    <div class="row m-0">
                        <div class="col-md-6 col-6 d-flex justify-content-center">
                            <img src="{{ asset('web_image/5.png') }}" alt="" style="height:400px !important; width:400px !important;">
                        </div>
                        <div class="col-md-6 col-6 d-flex align-items-center justify-content-end" style="padding-right:100px !important;">
                            <span class="about_us_2">
                                IIUMBantu centered around three main pillars: seeking<br>
                                help, providing help, and promoting donations for<br>
                                various club programs within the IIUM Community. We<br>
                                seeks to revolutionize how the IIUM community<br>
                                collaborates in times of need and makes sure that<br>
                                students an get critical help quickly and effectively.
                            </span>
                        </div>
                    </div>
                    <div class="row m-0" style="margin-top:20px !important;">
                        <div class="col-md-12 col-12" style="background-color:#FDFCF7 !important; border-radius:40px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-10">
                                    <div class="row justify-content-end">
                                        <div class="col-md-2 col-2 d-flex justify-content-end">
                                            <span class="goal">Goal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:30px !important;">
                                <div class="col-md-6 col-6 d-flex justify-content-center">
                                    <span class="goal_1">1</span>
                                </div>
                                <div class="col-md-6 col-6 d-flex justify-content-center">
                                    <span class="goal_1">2</span>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:100px !important;">
                                <div class="col-md-6 col-6 text-center">
                                    <span class="goal_2">
                                        Develop efficient processes to<br>
                                        promptly identify and respond to<br>
                                        student requests for any type of<br>
                                        need, whether financial, personal,<br>
                                        or otherwise.
                                    </span>
                                </div>
                                <div class="col-md-6 col-6 text-center">
                                    <span class="goal_2">
                                        Encourage a culture of giving<br>
                                        and support within the IIUM<br>
                                        community while also raising<br>
                                        awareness and participation in<br>
                                        charity activities.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top:90px !important;">
                        <div class="col-md-8 col-8" style="background-color:#FDFCF7 !important; border-radius:40px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-12 text-center" style="padding:20px 0px 20px 0px !important;">
                                    <span class="about_us_3">The Individuals We're Trying to Help</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top:-220px !important;">
                        <div class="col-md-7 col-7">
                            <div class="row justify-content-between">
                                <div class="col-auto" style="width:30px !important; height:140px !important; background-color:#D5993F !important;"></div>
                                <div class="col-auto" style="width:30px !important; height:140px !important; background-color:#D5993F !important;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top:150px !important; margin-bottom:50px !important;">
                        <div class="col-md-4 col-4">
                            <div class="row">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <img src="{{ asset('web_image/about_us_1.png') }}" alt="" style="height:300px !important; width:300px !important; border-radius:50%; border:10px solid white !important;">
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px !important;">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <span class="about_us_4">Student In Need</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-4">
                            <div class="row justify-content-between">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <img src="{{ asset('web_image/about_us_2.png') }}" alt="" style="height:300px !important; width:300px !important; border-radius:50%; border:10px solid white !important;">
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px !important;">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <span class="about_us_4">IIUM Community</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-4">
                            <div class="row justify-content-between">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <img src="{{ asset('web_image/about_us_3.png') }}" alt="" style="height:300px !important; width:300px !important; border-radius:50%; border:10px solid white !important;">
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px !important;">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <span class="about_us_4">Club and<br>Organization</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mx-0" style="margin-top:-2030px !important;">
                <div class="col-md-4 col-4" style="height:620px !important; padding:200px 0px 0px 50px !important;">
                    <span class="about_us_1">About<br>Us</span>
                </div>
                <div class="col-md-4 col-4" style="height:620px !important;">
                    <img src="{{ asset('web_image/4.png') }}" alt="" style="height:auto !important; width:100% !important;">
                </div>
            </div>
            <div class="row justify-content-center m-0" style="margin-top:1500px !important;">
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
