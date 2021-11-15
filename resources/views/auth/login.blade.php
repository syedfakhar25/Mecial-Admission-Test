<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<x-jet-authentication-card-logo />--}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4" align="center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/AzadKashmirSeal.png" style="height: 50px !important;">
                <div class="py-2"><b>Government Medical & Dental Institutions of AJ&K</b></div>
                <div class="pb-4"><b>ADMISSION PORTAL</b></div>
                
                <hr>
            </div>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>

            </div>
            <div><br><hr width="100%"></div>
            <div class="mt-4" align="center">

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="" style="text-decoration: none"><b style="color: red"><em>Register if not Already Registered</em></b></a>
                        @endif
            </div>
            <div class="mt-4" align="center">

                    <a href="https://www.youtube.com/watch?v=H34EJq2_J8g" class="" style=""><b style="color: blue"><em>Click Here to Watch Video of Complete Procedure</em></b></a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
