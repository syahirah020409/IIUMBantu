<x-app-layout>
    <style>

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    @if($user->photo != NULL && $user->photo != '')
                        <img src="{{asset('user_profile_photo/'.$user->photo)}}" alt="" style="width:200px !important; height:200px !important; border:5px dashed #166269 !important; border-radius:50% !important;">
                    @else
                        <img src="{{asset('web_image/default.png')}}" alt="" style="width:200px !important; height:200px !important; border:5px dashed #166269 !important; border-radius:50% !important;">
                    @endif
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="user_profile_name">{{ $user->name }}</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px !important;">
                <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#ECECEC !important; padding:50px !important;">
                    <div class="row justify-content-center" style="margin-bottom:20px !important;">
                        <div class="col-md-8 col-8">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label class="user_profile_label">EMAIL</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <span class="user_profile_display">{{ $user->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-bottom:20px !important;">
                        <div class="col-md-8 col-8">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label class="user_profile_label">PHONE NO.</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <span class="user_profile_display">{{ $user->phone_number ? $user->phone_number : '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <a href="{{ route('profile.edit') }}" class="btn-orange" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Edit Profile</a>
                    <a href="{{ route('profile.user_change_password') }}" class="btn-orange" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Change Password</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#FDFCF7 !important; padding:20px 0px 100px 0px !important;">
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
