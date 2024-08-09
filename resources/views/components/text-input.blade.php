@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full pl-5 font-bold tracking-widest
h-[50px] rounded-lg mt-6']) !!} placeholder={{$placeholder ?? ""}} >