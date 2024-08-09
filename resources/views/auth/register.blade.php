<x-guest-layout>
    <div class="border flex justify-end h-[100vh] ">
        <img src="./images/wave Group.png" class="h-full mt-[-80px]" draggable="false" alt="wave" />
        <div class="absolute w-full h-full top-0 flex justify-center items-center">
            <form class="bg-[#4567D6] w-[80%] rounded-xl px-10 py-10" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex justify-center items-center text-white">
                    <i class="fa-solid fa-user text-xl p-3 bg-black rounded-full ml-[-50px] mr-[20px]"></i>
                    <h1 class="text-4xl font-bold tracking-wider">Sign Up</h1>
                </div>

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />


                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />


                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Password" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password"
                    placeholder="Password Confirmation" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />


                <div class="flex justify-center">
                    <button type="submit" class="bg-[#22336A] h-[45px] text-white w-[200px] text-xl rounded-lg mt-6">
                        Buat
                    </button>
                </div>
                <p class="text-center mt-1">
                    Sudah Ada Akun? <a href="{{route('login')}}" class="text-white">Login !</a>
                </p>
            </form>
        </div>
    </div>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>