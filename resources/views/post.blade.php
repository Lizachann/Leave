<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if( Auth::user()->role == 'admin')
                {{ __('Admin Dashboard') }}
            @elseif(Auth::user()->role == 'hod')
                {{ __('Hod Dashboard') }}
            @elseif(Auth::user()->role == 'staff')
                {{ __('Staff Dashboard') }}
            @endif


        </h2>
    </x-slot>

</x-app-layout>
