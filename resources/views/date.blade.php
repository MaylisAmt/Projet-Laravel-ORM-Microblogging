<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('API') }}
        </h2>
    </x-slot>

<div>{{$currentDate}}</div>
<div>{{$dateLastWotd}}</div>

</x-app-layout>