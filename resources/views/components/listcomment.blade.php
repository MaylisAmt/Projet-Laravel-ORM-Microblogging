@props(['comments'])
<div>
    
    @foreach ($comments as $comment)
        
        <div class="border border-black-300 p-2 my-2">
            <h3 class=" font-bold">{{ $comment->user->name}}</h3>
            <div>{{ $comment->content }}</div>
        </div>		
    @endforeach
</div>