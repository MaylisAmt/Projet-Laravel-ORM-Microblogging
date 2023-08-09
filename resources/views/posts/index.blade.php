{{-- @extends("layouts.app") --}}
<x-app-layout>
{{-- @section("title", "Tous les articles") --}}
{{-- @section("content") --}}

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POSTS') }}
        </h2>
    </x-slot>
	
	<div>
		<p>Mot du jour :</p>
		
	</div>

	<div>
	<p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a>
	</p>

	<!-- Le tableau pour lister les articles/posts -->
	{{-- <table border="1" >
		<thead>
			<tr>
				<th>Titre</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead> --}}
		<tbody>
			<!-- On parcourt la collection de Post -->
			<div class="m-12 ">
			@foreach ($posts as $post)
		
				<div class="border border-black-100 rounded-sm pt-6 mt-4">
					<h1 class="font-bold text-xl capitalize">{{ $post->title }}</h1>

					<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

					<div>{{ $post->content }}</div>
					<x-listcomment :comments="$post->comments" />

					<x-newcom :postId="$post->id"/>
				</div>		
			@endforeach
			</div>
			{{-- <tr>
				<td>
					<!-- Lien pour afficher un Post : "posts.show" -->
					<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
				</td>
				{{-- <td> --}}
					<!-- Lien pour modifier un Post : "posts.edit" -->
					{{-- <a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
				</td> --}}
				{{-- <td> --}}
					<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
					{{-- <form method="POST" action="{{ route('posts.destroy', $post) }}" > --}}
						<!-- CSRF token -->
						{{-- @csrf --}}
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						{{-- @method("DELETE")
						<input type="submit" value="x Supprimer" > --}}
					{{-- </form>
				</td> --}}
			{{-- </tr> --}}
			
		</tbody>
	</table>
</div>
	
{{-- @endsection --}}
</x-app-layout>
