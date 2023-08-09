{{-- @extends("layouts.app")
@section("title", "Créer un post")
@section("content") --}}
<x-app-layout>

	<x-slot name="header">
		<h1 class="font-semibold text-xl text-gray-800 leading-tight">
			{{("Créer un post")}}
		</h1>
	</x-slot>

	<div>
		<h1>test</h1>
	</div>

	<div>
	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

		<!-- Le token CSRF -->
		@csrf
		
		<p>
			<label for="title" >Titre</label><br/>
			<input type="text" name="title" value="{{ old('title') }}"  id="title" placeholder="Le titre du post" >

			<!-- Le message d'erreur pour "title" -->
			@error("title")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<p>
			<label for="picture" >Couverture</label><br/>
			<input type="file" name="picture" id="picture" >

			<!-- Le message d'erreur pour "picture" -->
			@error("picture")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<p>
			<label for="content" >Contenu</label><br/>
			<textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ old('content') }}</textarea>

			<!-- Le message d'erreur pour "content" -->
			@error("content")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<input type="submit" name="valider" value="Valider" >

	</form>
	</div>
</x-app-layout>


