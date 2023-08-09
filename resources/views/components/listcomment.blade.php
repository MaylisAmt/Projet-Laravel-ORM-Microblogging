@props(['comments'])
<div>
    
    @foreach ($comments as $comment)
        
        <div class="border border-black-300 p-2 my-2">
            <h3 class=" font-bold">{{ $comment->user->name}}</h3>
            <div>{{ $comment->content }}</div>
            @if(Auth::id() === $comment->user_id)
                <div>
                    <form action="{{ route('comment.delete', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <button type="submit" class="text-red-600">Supprimer le commentaire</button>
                    </form>
                </div>
            @endif
        </div>		
    @endforeach
</div>