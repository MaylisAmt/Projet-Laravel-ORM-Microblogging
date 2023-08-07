<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('COUCOU') }}
        </h2>
    </x-slot>

    <x-slot name="test">
        <h4>{{__("i'm trying ok")}}</h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Bonjour <span> {{ Auth::user()->name}}</span> , que publier aujourd'hui</p></br>


                    {{-- ajout du formulaire de creation de post --}}
                    <h1>Creer un post</h1>
                    <x-newpost />
                </div>
            </div>
        </div>
    </div>
    <div>
        <p>Comment tu fais maintenant ?</p>
    </div>
</x-app-layout>
