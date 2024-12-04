<x-guest-layout>


    <!-- Background row -->
    <div class="row" style="position: relative;">
        <div class="col-md-11 col-11 background-col-register">
            <!-- Background content -->
        </div>
    </div>

    <!-- Overlay row -->
    <div class="row overlay-row-register">
        <div class="col-md-10 col-10 overlay-content-register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mx-0 justify-content-center">
                    <div class="col-md-5 col-5">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <span style="font-size:40pt !important; font-weight:bold !important;">Create New<br>Account</span>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:30px !important;">
                            <div class="col-md-12 col-12">
                                <span style="font-size:18pt !important; color:grey;">Already registered? <a href="{{ route('login') }}" style="font-weight:bold !important;">Login</a></span>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="row" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <x-input-label for="name" :value="__('FULL NAME')" style="font-size: 14pt !important;" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="font-size: 14pt !important;" placeholder="Please fill full name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="row" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <x-input-label for="email" :value="__('LIVE EMAIL')" style="font-size: 14pt !important;" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="font-size: 14pt !important;" placeholder="example@live.iium.edu.my" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <x-input-label for="password" :value="__('PASSWORD')" style="font-size: 14pt !important;" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" style="font-size: 14pt !important;" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="row" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <x-input-label for="password_confirmation" :value="__('CONFIRM PASSWORD')" style="font-size: 14pt !important;" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" style="font-size: 14pt !important;" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-8 text-center">
                                <button type="submit" class="btn-orange">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-5 d-flex align-items-end">
                        <img src="{{ asset('web_image/register_icon.png') }}" alt="" style="height:100% !important; width:auto !important;">
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
