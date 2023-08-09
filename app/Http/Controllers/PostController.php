<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //On récupère tous les Post
    $posts = Post::latest()->get();
    $arrayLastWotd = DB::table('wotds')->orderBy('id', 'desc')->limit(1)->get('word');
    $splitWord = explode(" ", $arrayLastWotd[0]->word);
    $wotd = $splitWord[0];

    // On transmet les Post à la vue
    return view("posts.index", compact("posts", "wotd"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. La validation
    $this->validate($request, [
        'title' => 'bail|required|string|max:255',
        "picture" => 'bail|required|image|mimes:jpeg,jpg,png,gif|max:5000',
        "content" => 'bail|required',
    ]);

    // 2. On upload l'image dans "/storage/app/public/posts"

    $chemin_image = $request->file('picture')->store('public');

    // récupération de l'userId
        $user_id = Auth::id();
    // Enregistrement dans base de donnée

    Post::create([
        "title" => $request->title,
        "picture" => $chemin_image,
        "content" => $request->content,
        "user_id" => $user_id,

    ]);

    

    // 4. On retourne vers tous les posts : route("posts.index")
    return redirect(route("posts.index"));

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // 1. La validation

    // Les règles de validation pour "title" et "content"
    $rules = [
        'title' => 'bail|required|string|max:255',
        "content" => 'bail|required',
    ];

    // Si une nouvelle image est envoyée
    if ($request->has("picture")) {
        // On ajoute la règle de validation pour "picture"
        $rules["picture"] = 'bail|required|image|max:1024';
    }

    $this->validate($request, $rules);

    // 2. On upload l'image dans "/storage/app/public/posts"
    if ($request->has("picture")) {

        //On supprime l'ancienne image
        Storage::delete($post->picture);

        $chemin_image = $request->picture->store("posts");
    }

    // 3. On met à jour les informations du Post
    $post->update([
        "title" => $request->title,
        "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
        "content" => $request->content
    ]);

    // 4. On affiche le Post modifié : route("posts.show")
    return redirect(route("posts.show", $post));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // On supprime l'image existant
    Storage::delete($post->picture);

    // On les informations du $post de la table "posts"
    $post->delete();

    // Redirection route "posts.index"
    return redirect(route("profile"));

    }

    //On affiche tous les posts du user logged in du plus récent au plus ancien.
    public function allMyPosts()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->latest()->get();

        return view("profile.profile", compact("posts"));
    }
}
