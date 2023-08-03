
<form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" enctype="multipart/form-data">
    <!-- Ajouter la vérification pour isset($post) pour déterminer si c'est une création ou une édition -->
    @isset($post)
        @method('PUT')
    @endisset
    @csrf

    <p>
        <label for="title">Titre</label><br>
        <input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}" id="title" placeholder="Le titre du post">
        @error("title")
            <div>{{ $message }}</div>
        @enderror
    </p>

    {{-- <!-- Afficher la couverture actuelle si un post existe et a une image -->
    @if(isset($post) && isset($post->picture))
    <p>
        <span>Couverture actuelle</span><br>
        <img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;">
    </p>
    @endif --}}

    <p>
        <label for="picture">Couverture</label><br>
        <input type="file" name="picture" id="picture">
        @error("picture")
            <div>{{ $message }}</div>
        @enderror
    </p>

    <p>
        <label for="content">Contenu</label><br>
        <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
        @error("content")
            <div>{{ $message }}</div>
        @enderror
    </p>

    
    <input type="submit" name="valider" value="Valider">
</form>
