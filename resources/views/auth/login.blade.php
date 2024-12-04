<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Background row -->
    <div class="row justify-content-end" style="position: relative;">
        <div class="col-md-11 col-11 background-col-login">
            <!-- Background content -->
        </div>
    </div>

    <!-- Overlay row -->
    <div class="row overlay-row-login justify-content-center">
        <div class="col-md-8 col-8 overlay-content-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mx-0 justify-content-center">
                    <div class="col-md-10 col-10">
                        <div class="row">
                            <div class="col-md-12 col-12 text-center">
                                <span style="font-size:40pt !important; font-weight:bold !important;">Login</span>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:30px !important;">
                            <div class="col-md-12 col-12 text-center">
                                <span style="font-size:18pt !important; color:grey;">Don't have an account yet? <a href="{{ route('register') }}" style="font-weight:bold !important;">Register Here</a></span>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-4 col-4">
                                <x-input-label for="email" :value="__('LIVE EMAIL')" style="font-size: 14pt !important;" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="font-size: 14pt !important;" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row justify-content-center" style="margin-bottom:30px !important;">
                            <div class="col-md-4 col-4">
                                <x-input-label for="password" :value="__('PASSWORD')" style="font-size: 14pt !important;" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" style="font-size: 14pt !important;" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Forgot -->
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-4 col-4 text-center">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-4 col-4 text-center">
                                <button type="submit" class="btn-orange">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
