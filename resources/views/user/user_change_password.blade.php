<x-app-layout>
    <style>

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('put')
            <div class="col-md-12 col-12">
                <div class="row justify-content-center" style="margin-top: 50px !important;">
                    <div class="col-md-10 col-10 d-flex justify-content-center">
                        <span class="user_profile_name">Change Password</span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 20px !important;">
                    <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#ECECEC !important; padding:50px !important;">
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label class="user_profile_label">CURRENT PASSWORD</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="password" name="current_password" class="user_profile_display" required>
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex justify-content-between align-items-center">
                                        <label class="user_profile_label">NEW PASSWORD</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="password" name="password" class="user_profile_display" required>
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label class="user_profile_label">CONFIRM NEW PASSWORD</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="password" name="password_confirmation" class="user_profile_display" required>
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 50px !important;">
                    <div class="col-md-10 col-10 d-flex justify-content-center">
                        <button type="submit" class="btn-orange" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Save</button>
                        <a href="{{ route('profile.view') }}" class="btn-grey" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
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
