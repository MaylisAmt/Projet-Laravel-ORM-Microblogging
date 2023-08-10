{{-- @extends("layouts.app") --}}
<x-app-layout>
{{-- @section("title", "Tous les articles") --}}
{{-- @section("content") --}}

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WOTD') }}
        </h2>
		<p>Mot du jour : {{$wotd}}</p>
    </x-slot>

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
			
		</tbody>
	</table>
</div>
	
{{-- @endsection --}}
</x-app-layout>
