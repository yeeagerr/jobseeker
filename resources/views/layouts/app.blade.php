<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? "Jobseeker"}}</title>

    {{-- OTHERS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Fonts -->
    {{--
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="{{request()->is('/') ? "" : " bg-[#f2f7fd]"}}">
    {{-- MODAL IF NOT LOGIN OR VERIFIED --}}
    @if (Auth::user() or Auth::guard('company')->check() )
    @if (Auth::user() and !request()->user()->hasVerifiedEmail() or Auth::guard('company')->check() and
    !Auth::guard('company')->user()->hasVerifiedEmail()
    )
    @php
    $message = "Kamu harus verifikasi email kamu telebih dahulu, Silahkan cek gmail kamu yang telah di registrasi";
    $route = route('verification.notice');
    @endphp
    <x-modal-popup :message="$message" :link="$route" icon="x" title="Maaf" danger="true" />
    @endif
    @endif

    {{-- MODAL IF THERES FLASH MESSAGE --}}
    @if (session('success'))
    @php
    $messageFlash = session("success")
    @endphp
    <x-modal-popup part="flash" title="Success" icon="check" :message="$messageFlash" />
    @endif


    <div class="min-h-screen ">
        {{-- @auth
        @include('layouts.navigation')
        @endauth --}}


        @include('layouts.navbar')


        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @if (!request()->is('company/profile*') && !request()->is('user/profile*')&& !request()->is('company/job'))
    @include('layouts.footer')
    @endif
</body>
@if (request()->is('edit/profile'))
<script src="{{asset('resources/js/profileEdit.js')}}"></script>
@endif

@if (request()->is('company/profile*') AND Auth::guard('company')->check())
<script src="{{asset('resources/js/profileCompany.js')}}"></script>
@endif

</html>