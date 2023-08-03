<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        This is the profile page x3
    </div>
    <div><p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('profile.edit') }}" title="Modif profil" >Modif profil</a>
	</p>
</div>
</x-app-layout>
