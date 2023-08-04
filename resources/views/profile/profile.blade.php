<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        This is the profile page x3
    </div>

    <div>
        Here we want posts where user_id = logged in user
    </div>

    <tbody>
        <!-- On parcourt la collection de Post -->
        @foreach ($posts as $post)
        
        <tr>
            <td>
                <h1>{{ $post->title }}</h1>

                <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

                <div>{{ $post->content }}</div>
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

    <div><p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('profile.edit') }}" title="Modif profil" >Modif profil</a>
	</p>
</div>
</x-app-layout>
