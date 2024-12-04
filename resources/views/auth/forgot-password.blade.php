<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Background row -->
    <div class="row justify-content-center" style="position: relative;">
        <div class="col-md-10 col-10 background-col-forgot">
            <!-- Background content -->
        </div>
    </div>

    <!-- Overlay row -->
    <div class="row overlay-row-forgot justify-content-center">
        <div class="col-md-8 col-8 overlay-content-forgot">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row mx-0 justify-content-center">
                    <div class="col-md-10 col-10">
                        <div class="row" style="margin-bottom:20px !important;">
                            <div class="col-md-12 col-12 text-center">
                                <span style="font-size:40pt !important; font-weight:bold !important; line-height:1 !important;">Forgot<br>Password</span>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:30px !important;">
                            <div class="col-md-12 col-12 text-center">
                                <span style="font-size:18pt !important; color:grey;">Please enter your email address to<br>receive a verification code.</span>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-4 col-4">
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-4 col-4 text-center">
                                <button type="submit" class="btn-orange">Send</button>
                                <a href="{{ route('login') }}" class="btn-back">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</x-guest-layout>
