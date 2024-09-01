<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="border flex justify-end h-[100vh] ">
        <img src="./images/wave Group.png" class="h-full mt-[-80px]" draggable="false" alt="wave" />
        <div class="absolute w-full h-full top-0 flex justify-center items-center">
            <form class="bg-[#4567D6] w-[80%] rounded-xl px-10 py-10" method="POST"
                action="{{ route('company.login') }}">
                @csrf
                <div class="flex justify-center items-center text-white">
                    <i class="fa-solid fa-user text-xl p-3 bg-black rounded-full ml-[-50px] mr-[20px]"></i>
                    <h1 class="text-4xl font-bold tracking-wider">Login</h1>
                </div>

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                {{-- <div class="block mt-1">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm ">{{ __('Remember me') }}</span>
                    </label>
                </div>

                @if (Route::has('password.request'))
                <a class="underline text-sm  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif --}}
                <div class="flex justify-center">


                    <button type="submit" class="bg-[#22336A] h-[45px] text-white w-[200px] text-xl rounded-lg mt-6">
                        Masuk
                    </button>
                </div>
                <p class="text-center mt-1">
                    Belum Ada Akun? <a href="{{route('company.register')}}" class="text-white">Sign Up !</a>
                </p>
            </form>
        </div>
    </div>

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>