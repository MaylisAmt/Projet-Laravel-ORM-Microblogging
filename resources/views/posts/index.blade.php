
<x-app-layout>


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

	
		<tbody>
			<!-- On parcourt la collection de Post -->
			<div class="m-12 ">
			@foreach ($posts as $post)
		
				<div class="border border-black-100 rounded-sm pt-6 mt-4">
					<h1 class="font-bold text-xl capitalize">{{ $post->title }}</h1>
					

					<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

					<div>{{ $post->content }}</div>

					<div>
						@if (!$post->liked())
						<form action="{{ route('like.post', $post->id) }}" method="POST">
							@csrf
							<button class="block bg-green-600 rounded:ml px-2 py-4">I love it, picasso</button>
						</form>
						
						@else
						<form action="{{ route('unlike.post', $post->id) }}" method="post">
							@csrf
							<button class="{{ $post->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">Gosh please no !</button>
						</form>

						<p class="text-xl">Nombre de votes : {{ $post->likeCount }}</p>
						<p class="text-green-500">Vous avez déjà voté pour ce post.</p>
								<p class="text-xl">Nombre de votes : {{ $post->likeCount }}</p>
						@endif
						
						
					</div>
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
