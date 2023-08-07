{{-- @extends("layouts.app")
@section("title", $post->title)
@section("content") --}}
<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

	<div class="flex align-center justify-center flex-col w-full">
		<h1>{{ $post->title }}</h1>

		<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

		<div>{{ $post->content }}</div>
		<div class="flex">
			<div>
				<!-- Lien pour modifier un Post : "posts.edit" -->
				<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" class="bg-yellow-100 p-2 border-4 border-yellow-300 rounded my-8">Modifier</a>
			</div>
			<div>
				<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
				<form method="POST" action="{{ route('posts.destroy', $post) }}" >
					<!-- CSRF token -->
					@csrf
					<!-- <input type="hidden" name="_method" value="DELETE"> -->
					@method("DELETE")
					<input type="submit" value="x Supprimer" class="cursor-pointer bg-pink-200 p-2 border-4 border-red-300 rounded">
				</form>
			</div>
		</div>
	</div>
	<p><a href="{{ route('profile') }}" title="Retourner aux articles" >Retourner à mon profil</a></p>
</x-app-layout>
{{-- @endsection --}}