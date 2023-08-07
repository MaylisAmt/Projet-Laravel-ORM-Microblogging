<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                Hi {{Auth::user()->name}}!
            </div>
        </div>
    </x-slot>

    

    <div class="grid grid-cols-3 gap-8">
        <!-- On parcourt la collection de Post -->
        @foreach ($posts as $post)
        
        <div>
            <div>
                {{-- <h1>{{ $post->title }}</h1> --}}
                <a href="{{ route('posts.show', $post) }}" title="Voir post">
                <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 200px;">
                </a>
                {{-- <div>{{ $post->content }}</div> --}}
            </div>
        </div>
        @endforeach
    </div>

    <div><p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('profile.edit') }}" title="Modif profil" >Modif profil</a>
	</p>
</div>
</x-app-layout>
