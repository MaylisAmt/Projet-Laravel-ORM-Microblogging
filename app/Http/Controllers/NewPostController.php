<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class NewPostController extends Controller
{
    //création d'un post
    public function get() {
        //
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
            'image' => 'required|mimes: jpg, jpeg, png, gif,|max:4000',
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
    }

}
