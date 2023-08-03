@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")
<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POSTS') }}
        </h2>
    </x-slot>
	
	<x-slot name="posts_slot_title">
		<h1>{{ __('Tous les articles')}}</h1>
	</x-slot>

	<p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a>
	</p>

	<!-- Le tableau pour lister les articles/posts -->
	<table border="1" >
		<thead>
			<tr>
				<th>Titre</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($posts as $post)
			<tr>
				<td>
					<!-- Lien pour afficher un Post : "posts.show" -->
					<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
				</td>
				<td>
					<!-- Lien pour modifier un Post : "posts.edit" -->
					<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
					<form method="POST" action="{{ route('posts.destroy', $post) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value="x Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</x-app-layout>
@endsection
