<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4" align="center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/AzadKashmirSeal.png" style="height: 50px !important;">
                <div class="py-2"><b>Government Medical & Dental Institutions of AJ&K</b></div>
                <div class="pb-4"><b>ADMISSION PORTAL</b></div>
                
                <hr>
            </div>


            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label  for="cnic" value="{{ __('CNIC') }}" />
                <x-jet-input id="cnic" class="block mt-1 w-full cnic_mask" type="text" name="cnic" :value="old('cnic')" required placeholder=" e.g; 8220312345678"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Test Type') }}" />
                <select class="block mt-1 w-full" name="test_type">
                    <option value="mcat" selected>
                        MCAT
                    </option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="roll_no" value="{{ __('Roll Number') }}" />
                <x-jet-input id="roll_no" class="block mt-1 w-full" type="number" name="roll_no" :value="old('roll_no')" required />
            </div>

            <div class="mt-4">
                <label>Entry Test Marks</label> <span style="color:red;"> <em>(must not be less than 65%)</em></span>
              {{--  <h6 style="font-weight: bold; color: blue">(if your test type is SAT leave this option empty)</h6>--}}
                <x-jet-input id="entry_marks" class="block mt-1 w-full" type="text" name="entry_marks" :value="old('entry_marks')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.cnic_mask').mask('00000-0000000-0');
    });
</script>
