@props(['post'])

<div class="border border-black">
    <p class="text-xl">Nombre de votes : {{ $post->likeCount }}</p>
        @if (!$post->liked())
            
        <a href="{{ route('like.post', $post->id) }}"><p>+1</p></a>
            
        @else
            <p class="text-green-500">Vous avez déjà voté pour ce post.</p>
        @endif
    
     
</div>
