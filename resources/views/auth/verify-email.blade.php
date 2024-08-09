<x-guest-layout>
    <div class="h-[100vh] flex justify-center items-center">
        <div class="h-[90%] w-[90%] flex justify-center items-center flex-col">
            <i class="fa-solid fa-envelope text-[150px] text-[#4A3AFF]"></i>
            <h1 class="text-3xl font-bold tracking-wide text-center">Verify Your Email Addres</h1>
            <p class="text-[gray] text-center w-[70%] mb-3 mt-2">
                {{ __('We have sent Verification email link to your gmail, could you verify your email address by
                clicking on
                the link
                we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>
            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif

            <div class="flex gap-3 flex-wrap justify-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button class="bg-[#4A3AFF] py-3 px-5 rounded-2xl text-white  font-bold tracking-wide"
                            type="submit">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="shadow-xl py-3 px-5 rounded-2xl  font-bold text-[#4A3AFF] tracking-wide"
                        type="submit">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>